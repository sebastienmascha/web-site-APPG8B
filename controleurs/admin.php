<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur de l'utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.utilisateurs.php');
include('./modele/requetes.admin.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])){
    $function = "gestion";
} else {
    $function = $_GET['fonction'];
}

$alerte = '';


switch ($function) {

    case 'gestion':
        //affichage de l'accueil
        $vue = "gestion";
        $title = "Support technique";
        $maisons = recupereMachines($bdd);      
        break;

    case 'gestion-user':
    $alerte='';
     $alertemdp='';
        //affichage de l'accueil
        $vue = "gestion-user";
        $title = "Gestion des utilisateurs";
        $utilisateurs = recupereUsers($bdd);     

        if(!empty($_POST['email']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['boisson']) && !empty($_POST['heure']))
        {
            $sql = "UPDATE users_user SET email=?, nom=?, prenom=?, preference=?, heure=? WHERE id =?";
            $bdd->prepare($sql)->execute(
                [secure($_POST['email']),
                 secure($_POST['nom']),
                 secure($_POST['prenom']),
                  secure($_POST['boisson']),
                   secure($_POST['heure']),
                    secure($_POST['id'])
                ]);
             $alerte = succes("<center>Informations modifiées pour ".$_POST["prenom"]." ".$_POST["nom"].".</center>");
    
        }

        if(!empty($_POST['mdp1']) && !empty($_POST['mdp2']))
            {
                if($_POST['mdp1'] == $_POST['mdp2']) {

                    $sql = "UPDATE users_user SET mdp=? WHERE id =?";
                    $bdd->prepare($sql)->execute([secure(crypterMdp($_POST['mdp1'])), $_POST['id']]);

                    $alertemdp = succes("<center>Mot de passe changé pour ".$_POST["prenom"]." ".$_POST["nom"].".</center>");
                }
                else {
                    $alertemdp = alerte("<center>Les deux mot de passe ne correspondent pas.</center>");
                }
            }


        if( !empty($_POST['emailadd']) &&
            !empty($_POST['prenomadd']) && 
            !empty($_POST['mdp1add']) && 
            !empty($_POST['mdp2add']) &&
            !empty($_POST['idfoyeradd']) && 
            !empty($_POST['nomadd']) && 
            !empty($_POST['boissonadd']) && 
            !empty($_POST['accesadd']) && 
            !empty($_POST['idmaisonadd']) && 
            !empty($_POST['heureadd']))

                {


            if($_POST['mdp1add'] == $_POST['mdp2add']) {

                $query = 'INSERT INTO users_user (idFoyer, prenom, nom, email, mdp, heure, preference, acces, invite, datecre, valide, typeUser) 
                VALUES (:idFoyer, :prenom, :nom, :email, :mdp, :heure, :preference, :acces, :invite, :datecre, :valide, :typeUser)';

                $idfoyer = secure($_POST['idfoyeradd']);
                $prenom = secure($_POST['prenomadd']);
                $nom = secure($_POST['nomadd']);
                $email = secure($_POST['emailadd']);
                $mdp = crypterMdp(secure($_POST['mdp1add']));
                $heure = secure($_POST['heureadd']);
                $boisson = secure($_POST['boissonadd']);
                $acces = secure($_POST['accesadd']);
                $invite=0;
                $temps = time();
                $valide = 1;
                $type = "";
                $idmaison = secure($_POST['idmaisonadd']);

                $donnees = $bdd->prepare($query);
                $donnees->bindParam(":idFoyer", $idfoyer, PDO::PARAM_STR);
                $donnees->bindParam(":prenom", $prenom, PDO::PARAM_STR);
                $donnees->bindParam(":nom", $nom, PDO::PARAM_STR);
                $donnees->bindParam(":email", $email, PDO::PARAM_STR);
                $donnees->bindParam(":mdp", $mdp, PDO::PARAM_STR);
                $donnees->bindParam(":heure", $heure, PDO::PARAM_STR);
                $donnees->bindParam(":preference", $boisson, PDO::PARAM_STR);
                $donnees->bindParam(":acces", $acces, PDO::PARAM_STR);
                $donnees->bindParam(":invite", $invite, PDO::PARAM_STR);
                $donnees->bindParam(":datecre", $temps, PDO::PARAM_STR);
                $donnees->bindParam(":valide", $valide, PDO::PARAM_STR);
                $donnees->bindParam(":typeUser", $type, PDO::PARAM_STR);

                $donnees->execute();

                $idNewUser = $bdd->lastInsertId();

                $query2 = 'INSERT INTO users_homes (idMaison, idUser) 
                VALUES (:idMaison, :idUser)';
                $donnees2 = $bdd->prepare($query2);
                $donnees2->bindParam(":idMaison", $idmaison, PDO::PARAM_STR);
                $donnees2->bindParam(":idUser", $idNewUser, PDO::PARAM_STR);
                $donnees2->execute();


                    $alerte = succes("<center>Utilisateur ".$_POST["prenomadd"]." ".$_POST["nomadd"]." ajouté!.</center>");
                }
                else {
                    $alerte = alerte("<center>Les deux mot de passe ne correspondent pas.</center>");
                }


         
    
        }


        break;

    case 'gestion-foyer':
        //affichage de l'accueil
        $vue = "gestion-foyer";
        $title = "Gestion des foyers";
        $foyers = recupereFoyers($bdd);    
        

        if(!empty($_POST['nom']))
        {

        $nom = secure($_POST['nom']);

        $query = 'INSERT INTO structure_foyer (nom) VALUES (:nom)';
                $donnees = $bdd->prepare($query);
                $donnees->bindParam(":nom", $nom, PDO::PARAM_STR);
                $donnees->execute();

                $alerte = succes("<center>Foyer <b>".$nom."</b> ajouté.</center>");
        }
  

        break;

    case 'supprimerUtilisateur':
        if(isset($_GET['id']) && isset($_GET['token']) && ($_GET['token'] == $_SESSION['token'])) {
            //TODO: Vérifier si la personne à le droit de supprimer la maison (si non tu redirige vers une page d'erreur de méchant)
            //TODO: Gérer si il y a une erreur: exemple: la maison n'existait déjà plus => try/catch
            
            deleteUsers($bdd,$_GET['id']);
            

        }
        header("Location: index.php?cible=admin&fonction=gestion-user");
        break;

    
    case 'ajouterUtilisateur':
        if(isset($_GET['id']) && isset($_GET['token']) && ($_GET['token'] == $_SESSION['token'])) {
            //TODO: Vérifier si la personne à le droit de supprimer la maison (si non tu redirige vers une page d'erreur de méchant)
            //TODO: Gérer si il y a une erreur: exemple: la maison n'existait déjà plus => try/catch
            
            addUsers($bdd,$_GET['id']);

        }
        header("Location: index.php?cible=admin&fonction=gestion-user");
        break;


     case 'gestion-maison':
        $vue = "gestion-maison";
        $title = "Maisons";
       
        if(isset($_GET['idFoyer'])) {
            
            $maisons = recupereMaisonsFromFoyerid($bdd,$_GET['idFoyer']);

              if(!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['lieu']))

                {

                $query = 'INSERT INTO structure_maison (idFoyer, nom, location) 
                VALUES (:idFoyer, :nom, :location)';

                $id=secure($_POST['id']);
                $nom = secure($_POST['nom']);
                $lieu = secure($_POST['lieu']);

                $donnees = $bdd->prepare($query);
                $donnees->bindParam(":idFoyer", $id, PDO::PARAM_STR);
                $donnees->bindParam(":location", $lieu, PDO::PARAM_STR);
                $donnees->bindParam(":nom", $nom, PDO::PARAM_STR);

                $donnees->execute();

                    $alerte = succes("<center>Maison <b>".$nom."</b> ajoutée!.</center>");
                }
              
        }

        break;

    case 'gestion-machine':
        //liste des capteurs enregistrés
        $vue = "gestion-machine";
        $title = "Machine(s)";
       
        if(isset($_GET['idMaison'])) {
            
            $machines = recupereMachinefromMaisonidGest($bdd,$_GET['idMaison']);

                if(!empty($_POST['idMaison']) && !empty($_POST['nom']))

                {

                $query = 'INSERT INTO structure_machine (idMaison, name) 
                VALUES (:idMaison, :nom)';

                $id=secure($_POST['idMaison']);
                $nom = secure($_POST['nom']);

                $donnees = $bdd->prepare($query);
                $donnees->bindParam(":idMaison", $id, PDO::PARAM_STR);
                $donnees->bindParam(":nom", $nom, PDO::PARAM_STR);

                $donnees->execute();

                $idMach = $bdd->lastInsertId();

                for($i=1;$i<5;$i++){
                
                $query = 'INSERT INTO structure_capteur (idMachine, type) 
                VALUES (:idMachine, :type)';

                $donnees = $bdd->prepare($query);
                $donnees->bindParam(":idMachine", $idMach, PDO::PARAM_STR);
                $donnees->bindParam(":type", $i, PDO::PARAM_STR);

                $donnees->execute();
                }
              

                    $alerte = succes("<center>Machine <b>".$nom."</b> ajoutée!.</center>");
                }

        }
        break;



    case 'gestion-capteur':
        //liste des capteurs enregistrés
        $vue = "gestion-capteur";
        $title = "Capteurs";
       
        if(isset($_GET['idMachine'])) {
            
            $capteurs = recupereCapteursfromMachineidGest($bdd,$_GET['idMachine']);
        }
        break;


    case 'supprimerMaison':
        // && isset($_GET['token']) && ($_GET['token'] == $_SESSION['token'])
          if(isset($_GET['id']) ) {
            
            




            //////    RECUPERER IDFOYER DEPUIS GET ID ET REDIRIGER VERS GESTION MAISON DU FOYER CORRESPONDANT AVANT LE BREAK
            // header("Location: index.php?cible=admin&fonction=gestion-maison&idFoyer=".$idfofo);




            $query3 = "DELETE FROM structure_machine WHERE idMaison=".$_GET['id'];
            $statement3 = $bdd->prepare($query3);
            $statement3->execute();

            $query4 = "DELETE FROM structure_maison WHERE id=".$_GET['id'];
            $statement4 = $bdd->prepare($query4);
            $statement4->execute();

            header('location:index.php?cible=admin&fonction=gestion-foyer');

        }
        
        break;

        case 'supprimerMachine':
        // && isset($_GET['token']) && ($_GET['token'] == $_SESSION['token'])
          if(isset($_GET['id']) ) {
            
            


            //////    RECUPERER IDMAISON DEPUIS GET ID ET REDIRIGER VERS GESTION MACHINE DU MAISON CORRESPONDANT AVANT LE BREAK
            // header("Location: index.php?cible=admin&fonction=gestion-machine&idMaison=".$idmaison);





            $query2 = "DELETE FROM structure_capteur WHERE idMachine=".$_GET['id'];
            $statement2 = $bdd->prepare($query2);
            $statement2->execute();

            $query3 = "DELETE FROM structure_machine WHERE id=".$_GET['id'];
            $statement3 = $bdd->prepare($query3);
            $statement3->execute();

            header('location:index.php?cible=admin&fonction=gestion-foyer');

        }
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "/components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header-footer/headerAdmin.php');
include('vues/admin/' . $vue . '.php');
