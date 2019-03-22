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
        break;

    case 'admin':
        //liste des capteurs enregistrés
        $vue = "admin";
        $title = "Espace administrateur";
        break;

    case 'stock':
        //liste des capteurs enregistrés
        $vue = "stock";
        $title = "Gestion du stock";
        break;

    case 'compte':
        //liste des capteurs enregistrés
        $vue = "compte";
        $title = "Mon compte";
        break;

    case 'referent-residence':
        //liste des capteurs enregistrés
        $vue = "referent-residence";
        $title = "Résidence";
        break;

    case 'referent-profil':
        //liste des capteurs enregistrés
        $vue = "referent-profil";
        $title = "Profil";
        break;

    case 'referent-machine':
    //liste des capteurs enregistrés
    $vue = "referent-machine";
    $title = "Machine";
    break;

    case 'referent-capteur':
    //liste des capteurs enregistrés
    $vue = "referent-capteur";
    $title = "Capteur";
    break;

    


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "/components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header.php');
include('vues/' . $vue . '.php');
include('vues/footer/footer.php');
