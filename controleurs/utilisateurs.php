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
include('./modele/requetes.capteurs.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

//mettre en anglais ou francais le site 
if ( !empty($_GET['language']) ) {
    $_COOKIE['language'] = $_GET['language'] === 'en' ? 'en' : 'fr';
    setcookie('language', $_COOKIE['language']);
}


switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        $vue = "accueil";
        if ( $_COOKIE['language'] == "en") {
            $title = "Home";
        } else {
            $title = "Accueil";
        }
        $maisons = recupereMachines($bdd);    

        break;


    case 'referent':
        $vue = "referent";
        if ( $_COOKIE['language'] == "en") {
            $title = "Account Officer";
        } else {
            $title = "Espace référent";
        }
        break;

    case 'stock':
        $vue = "stock";
        if ( $_COOKIE['language'] == "en") {
            $title = "Stock Gestion";
        } else {
            $title = "Gestion du stock";
        }
        $maisons = recupereMaisons($bdd);
        break;

    case 'compte':
        $vue = "compte";
        if ( $_COOKIE['language'] == "en") {
            $title = "My Account";
        } else {
            $title = "Mon compte";
        }
        $alerte = '';
        $maisons = recupereMaisons($bdd);

        if(!empty($_POST['email']) && !empty($_POST['prenom']) && !empty($_POST['boisson']) && !empty($_POST['heure']) )
        {
            $sql = "UPDATE users_user SET email=?, prenom=?, preference=?, heure=? WHERE id =?";
            $bdd->prepare($sql)->execute([secure($_POST['email']), secure($_POST['prenom']), secure($_POST['boisson']), secure($_POST['heure']), $_SESSION['id']]);


            if(!empty($_POST['mdp1']) && !empty($_POST['mdp2']))
            {
                if($_POST['mdp1'] == $_POST['mdp2']) {

                    $sql = "UPDATE users_user SET mdp=? WHERE id =?";
                    $bdd->prepare($sql)->execute([secure(crypterMdp($_POST['mdp1'])), $_SESSION['id']]);

                    $alerte = succes("<center>Mot de passe changé.</center>");
                }
                else {
                    $alerte = succes("<center>Les deux mot de passe ne correspondent pas.</center>");
                }
            }
    
        }

        //$maisons = deleteMaisonUser($bdd,$idSupprimer);
        break;

    case 'supprimerMaison':
        if(isset($_GET['id'])) {
            //TODO: Vérifier si la personne à le droit de supprimer la maison (si non tu redirige vers une page d'erreur )
            //TODO: Gérer si il y a une erreur: exemple: la maison n'existait déjà plus => try/catch
            deleteMaisonUser($bdd,$_GET['id']);
        }
        header("Location: index.php?cible=utilisateurs&fonction=compte");
        break;
        

    case 'referent-residence':
        //liste des capteurs enregistrés
        $vue = "referent-residence";
        if ( $_COOKIE['language'] == "en") {
            $title = "House(s)";
        } else {
            $title = "Maison(s)";
        }
        $maisons = recupereMachines($bdd);
    break;

    case 'referent-machine':
        //liste des capteurs enregistrés
        $vue = "referent-machine";
        $title = "Machine(s)";
       
        if(isset($_GET['idMaison'])) {
            
            $machines = recupereMachinefromMaisonid($bdd,$_GET['idMaison']);
        }
        
    break;

    case 'referent-capteur':
        //liste des capteurs enregistrés
        $vue = "referent-capteur";
        if ( $_COOKIE['language'] == "en") {
            $title = "Sensors";
        } else {
            $title = "Capteurs";
        }
        if(isset($_GET['idMachine'])) {
                
            $capteurs = recupereCapteurfromMachineid($bdd,$_GET['idMachine']);
        }
    
    break;



    case 'referent-profil':
        $alerte="";
        $vue = "referent-profil";
        if ( $_COOKIE['language'] == "en") {
            $title = "Home profils";
        } else {
            $title = "Profils du foyer";
        }
        $users = recupereTous($bdd, 'users_user WHERE idFoyer=' . secure($_SESSION['idFoyer']));


        //MODIFIER UTILISATEUR
        if(!empty($_POST['email']) && !empty($_POST['prenom'])&& !empty($_POST['nom']) && !empty($_POST['boisson']) && !empty($_POST['heure']) && !empty($_POST['idUser']) )
        {
            $sql = "UPDATE users_user SET email=?, prenom=?, nom=?, preference=?, heure=?, acces=? WHERE id =?";
            $bdd->prepare($sql)->execute([secure($_POST['email']), secure($_POST['prenom']),secure($_POST['nom']), secure($_POST['boisson']), secure($_POST['heure']),secure($_POST['acces']), $_POST['idUser']]);
            switch ($_POST['acces']){
                case 25:
                    $sql = "UPDATE users_user SET typeUser=?,invite=? WHERE id=?";
                    $bdd->prepare($sql)->execute(['Invité',1,$_POST['idUser']]);
                    break;
                case 50:
                    $sql = "UPDATE users_user SET typeUser=? WHERE id=?";
                    $bdd->prepare($sql)->execute(['Enfant',$_POST['idUser']]);
                    break;
                case 75:
                    $sql = "UPDATE users_user SET typeUser=? WHERE id=?";
                    $bdd->prepare($sql)->execute(['Utilisateur',$_POST['idUser']]);
                    break;
                case 100:
                    $sql = "UPDATE users_user SET typeUser=? WHERE id=?";
                    $bdd->prepare($sql)->execute(['Référent',$_POST['idUser']]);
                    break;
            }

        
        }
        if(!empty($_POST['mdp1']) && !empty($_POST['mdp2']))
        {
            if($_POST['mdp1'] == $_POST['mdp2']) {

                $sql = "UPDATE users_user SET mdp=? WHERE id =?";
                $bdd->prepare($sql)->execute([secure(crypterMdp($_POST['mdp1'])), $_POST['idUser']]);

                $alerte = succes("<center>Mot de passe changé.</center>");
            }
            else {
                $alerte = succes("<center>Les deux mot de passe ne correspondent pas.</center>");
            }
        }

        //AJOUTER UTILISATEUR

        if( !empty($_POST['emailadd']) &&
        !empty($_POST['prenomadd']) && 
        !empty($_POST['mdp1add']) && 
        !empty($_POST['mdp2add']) && 
        !empty($_POST['nomadd']) && 
        !empty($_POST['boissonadd']) && 
        !empty($_POST['accesadd']) && 
        !empty($_POST['idmaisonadd']) && 
        !empty($_POST['heureadd']))

            {


            if($_POST['mdp1add'] == $_POST['mdp2add']) {

                $query = 'INSERT INTO users_user (idFoyer, prenom, nom, email, mdp, heure, preference, acces, invite, datecre, valide, typeUser) 
                VALUES (:idFoyer, :prenom, :nom, :email, :mdp, :heure, :preference, :acces, :invite, :datecre, :valide, :typeUser)';

                $idfoyer = secure($_SESSION['idFoyer']);
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
                switch ($_POST['accesadd']){
                    case 25:
                        $type= 'Invité';
                        $invite=1;
                        break;
                    case 50:
                        $type= 'Enfant';
                        $invite=0;
                        break;
                    case 75:
                        $type= 'Utilisateur';
                        $invite=0;
                        break;
                    case 100:
                        $type= 'Référent';
                        $invite=0;
                        break;
                    default: 
                        $type= 'Utilisateur';
                        $invite=0;
                }
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

    case 'supprimerUtilisateur':
        if(isset($_GET['id']) && isset($_GET['token']) && ($_GET['token'] == $_SESSION['token'])) {
           
            deleteUser($bdd,$_GET['id']);

        }
        header("Location: index.php?cible=utilisateurs&fonction=referent-profil");
        break;



  

    case 'sav':
        $vue = "header-footer/sav";
        if ( $_COOKIE['language'] == "en") {
            $title = "Customer service";
        } else {
            $title = "Service après vente";
        }
        
        break;

    case 'cdu':
        $vue = "header-footer/cdu";
        if ( $_COOKIE['language'] == "en") {
            $title = "Conditions of use";
        } else {
            $title = "Conditions d'utilisation";
        }
        break;

    case 'faq':
        $vue = "header-footer/faq";
        $title = "FAQ";
        break;



    


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "/components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


if ( $_COOKIE['language'] == "en") {
    include('vues/en/header-footer/header.php');
    include('vues/en/' . $vue . '.php');
    include('vues/en/header-footer/footer.php');
} else {
    include('vues/fr/header-footer/header.php');
    include('vues/fr/' . $vue . '.php');
    include('vues/fr/header-footer/footer.php');
} 
