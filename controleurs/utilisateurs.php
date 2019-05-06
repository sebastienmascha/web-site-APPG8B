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

switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        $vue = "accueil";
        $title = "Accueil";
        $maisons = recupereMachines($bdd);      
        break;

    case 'referent':
        //liste des capteurs enregistrés
        $vue = "referent";
        $title = "Espace référent";
        break;

    case 'stock':
        //liste des capteurs enregistrés
        $vue = "stock";
        $title = "Gestion du stock";
        $maisons = recupereMaisons($bdd);
        break;

    case 'compte':
        //liste des capteurs enregistrés
        $vue = "compte";
        $title = "Mon compte";
        $maisons = recupereMaisons($bdd);

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
        $title = "Résidence(s)";
        break;

    case 'referent-profil':
        //liste des capteurs enregistrés
        $vue = "referent-profil";
        $title = "Profil";
        break;

    case 'sav':
        //liste des capteurs enregistrés
        $vue = "header-footer/sav";
        $title = "SAV";
        break;

    case 'cdu':
        //liste des capteurs enregistrés
        $vue = "header-footer/cdu";
        $title = "CDU";
        break;

    case 'faq':
        //liste des capteurs enregistrés
        $vue = "header-footer/faq";
        $title = "FAQ";
        break;

    case 'referent-machine':
    //liste des capteurs enregistrés
    $vue = "referent-machine";
    $title = "Machine(s)";
    break;

    case 'referent-capteur':
    //liste des capteurs enregistrés
    $vue = "referent-capteur";
    $title = "Capteur(s)";
    break;

    


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "/components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header-footer/header.php');
include('vues/' . $vue . '.php');
include('vues/header-footer/footer.php');
