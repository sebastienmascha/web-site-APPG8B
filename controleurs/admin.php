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


        if(!empty($_POST['emailadd']) && !empty($_POST['prenomadd']) && !empty($_POST['typeUseradd']) && !empty($_POST['idfoyeradd']) && !empty($_POST['nomadd']) && !empty($_POST['boissonadd']) && !empty($_POST['accesadd']) && !empty($_POST['heureadd']))

                {


            if($_POST['mdp1'] == $_POST['mdp2']) {

                $query = 'INSERT INTO users_user (idFoyer, prenom, nom, email, mdp, heure, preference, acces, invite, datecre, valide, typeUser) 
                VALUES (:idFoyer, :prenom, :nom, :email, :mdp, :heure, :preference, :acces, :invite, :datecre, :valide, :typeUser)';


                $donnees = $bdd->prepare($query);
                $donnees->bindParam(":idFoyer", secure($_POST['idfoyeradd']), PDO::PARAM_STR);
                $donnees->bindParam(":prenom", secure($_POST['prenomadd']), PDO::PARAM_STR);
                $donnees->bindParam(":nom", secure($_POST['nomadd']), PDO::PARAM_STR);
                $donnees->bindParam(":email", secure($_POST['emailadd']), PDO::PARAM_STR);
                $donnees->bindParam(":mdp", secure($_POST['mdp1add']), PDO::PARAM_STR);
                $donnees->bindParam(":heure", secure($_POST['heureadd']), PDO::PARAM_STR);
                $donnees->bindParam(":preference", secure($_POST['preferenceadd']), PDO::PARAM_STR);
                $donnees->bindParam(":acces", secure($_POST['accesadd']), PDO::PARAM_STR);
                $donnees->bindParam(":invite", 0, PDO::PARAM_STR);
                $donnees->bindParam(":datecre", time(), PDO::PARAM_STR);
                $donnees->bindParam(":valide", 1, PDO::PARAM_STR);
                $donnees->bindParam(":typeUser", secure($_POST['typeUseradd']), PDO::PARAM_STR);

                return $donnees->execute();

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

              if(!empty($_POST['id']) && !empty($_POST['maison']))

                {

                $query = 'INSERT INTO users_home (idMaison, idUser) 
                VALUES (:idMaison, :idUser)';


                $donnees = $bdd->prepare($query);
                $donnees->bindParam(":idUser", secure($_POST['id']), PDO::PARAM_STR);
                $donnees->bindParam(":idMaison", secure($_POST['maison']), PDO::PARAM_STR);

                return $donnees->execute();

                    $alerte = succes("<center>Utilisateur ajouté!.</center>");
                }
              
        }

        break;

    case 'gestion-machine':
        //liste des capteurs enregistrés
        $vue = "gestion-machine";
        $title = "Machine(s)";
       
        if(isset($_GET['idMaison'])) {
            
            $machines = recupereMachinefromMaisonidGest($bdd,$_GET['idMaison']);
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

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "/components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header-footer/headerAdmin.php');
include('vues/admin/' . $vue . '.php');
