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
        $vue = "gestion";
        $title = "Support technique";
        $maisons = recupereMachines($bdd);      
        break;

    

    


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "/components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header-footer/headerConnexion.php');
include('vues/admin/' . $vue . '.php');
include('vues/header-footer/footerConnexion.php');
