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
        //liste des capteurs enregistrés
        $vue = "referent";
        if ( $_COOKIE['language'] == "en") {
            $title = "Account Officer";
        } else {
            $title = "Espace référent";
        }
        break;

    case 'stock':
        //liste des capteurs enregistrés
        $vue = "stock";
        if ( $_COOKIE['language'] == "en") {
            $title = "Stock Gestion";
        } else {
            $title = "Gestion du stock";
        }
        $maisons = recupereMaisons($bdd);
        break;

    case 'compte':
        //liste des capteurs enregistrés
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
            //TODO: Vérifier si la personne à le droit de supprimer la maison (si non tu redirige vers une page d'erreur de méchant)
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
        //liste des capteurs enregistrés
        $vue = "referent-profil";
        $title = "Profil";
        break;

    case 'sav':
        //liste des capteurs enregistrés
        $vue = "header-footer/sav";
        if ( $_COOKIE['language'] == "en") {
            $title = "Customer service";
        } else {
            $title = "Service après vente";
        }
        
        break;

    case 'cdu':
        //liste des capteurs enregistrés
        $vue = "header-footer/cdu";
        if ( $_COOKIE['language'] == "en") {
            $title = "Conditions of use";
        } else {
            $title = "Conditions d'utilisation";
        }
        break;

    case 'faq':
        //liste des capteurs enregistrés
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
