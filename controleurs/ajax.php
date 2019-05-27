<?php

/**
 * Contrôleur pour AJAX
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.utilisateurs.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'stock-getMaisons':
        $vue = "stock-getMaisons";
        if ($_COOKIE['language'] == "en") {
            $title = "Stock Gestion";
        } else {
            $title = "Gestion du stock";
        }
        $idMaison = $_GET["q"];
        $machines = recupereMachinefromMaisonid($bdd, $idMaison);
        $machinesInfo = recupereInfoMachinefromMachineid($bdd, 1);
        break;

    case 'postCafe':
        if ($_GET['etatMachine'] == 0) {
            stopCafe($bdd, $_GET['idMachine']);
            header('location: index.php?cible=utilisateurs&fonction=accueil');
        } else {
            runCafe($bdd, $_GET['idMachine']);
            header('location: index.php?cible=utilisateurs&fonction=accueil');
        }

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/fr/' . $vue . '.php');
