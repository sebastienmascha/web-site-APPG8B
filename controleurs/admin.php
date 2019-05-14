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
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
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
        //affichage de l'accueil
        $vue = "gestion-user";
        $title = "Gestion des utilisateurs";
        $utilisateurs = recupereUsers($bdd);     

        break;

    case 'gestion-maison':
        //affichage de l'accueil
        $vue = "gestion-maison";
        $title = "Gestion des foyers";
        $foyers = recupereFoyers($bdd);      
        break;

    case 'supprimerUtilisateur':
        if(isset($_GET['id'])) {
            //TODO: Vérifier si la personne à le droit de supprimer la maison (si non tu redirige vers une page d'erreur de méchant)
            //TODO: Gérer si il y a une erreur: exemple: la maison n'existait déjà plus => try/catch
            
            deleteUsers($bdd,$_GET['id']);

        }
        header("Location: index.php?cible=admin&fonction=gestion-user");
        break;
    


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "/components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header-footer/headerAdmin.php');
include('vues/admin/' . $vue . '.php');
