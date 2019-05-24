<?php

/**
 * MVC :
 * - index.php : identifie le routeur à appeler en fonction de l'url
 * - Contrôleur : Crée les variables, élabore leurs contenus, identifie la vue et lui envoie les variables
 * - Modèle : contient les fonctions liées à la BDD et appelées par les contrôleurs
 * - Vue : contient ce qui doit être affiché
 **/
session_start();
// Activation des erreurs
ini_set('display_errors', 1);

// Appel des fonctions du contrôleur
include("controleurs/fonctions.php");
// Appel des fonctions liées à l'affichage
include("vues/fr/fonctions.php");

// SET COOKIE LANGAGE TO FR PAR DEFAULT
if (!isset($_COOKIE['language'])) {
    setcookie('language', "fr");
}

if (isset($_SESSION['acces'])) {

    // On identifie le contrôleur à appeler dont le nom est contenu dans cible passé en GET
    if (isset($_GET['cible']) && !empty($_GET['cible'])) {
        // Si la variable cible est passé en GET
        $url = $_GET['cible']; //utilisateurs, capteur, admin, etc.

    } else {
        // Si aucun contrôleur défini en GET, on bascule sur utilisateurs
        if ($_SESSION['acces'] > 150) {
            $url = 'admin';
        } else {
            $url = 'utilisateurs';
        }
    }
} else {
    $url = 'connexion';
}

// On appelle le contrôleur
include('controleurs/' . $url . '.php');
