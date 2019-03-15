<?php

/**
 * Contrôleur des capteurs
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.utilisateurs.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "connexion";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {
    
    case 'connexion':
        //liste des capteurs enregistrés
        $vue = "connexion";
        $title = "Connexion";

        break;
        
        case 'inscription':
        // inscription d'un nouvel utilisateur
        $vue = "inscription";
        $alerte = false;

        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['username']) and isset($_POST['password'])) {

            if (!estUneChaine($_POST['username'])) {
                $alerte = "Le nom d'utilisateur doit être une chaîne de caractère.";
            } else if (!estUnMotDePasse($_POST['password'])) {
                $alerte = "Le mot de passe n'est pas correct.";
            } else {
                // Tout est ok, on peut inscrire le nouvel utilisateur

                // 
                $values = [
                    'username' => $_POST['username'],
                    'password' => crypterMdp($_POST['password']) // on crypte le mot de passe
                ];

                // Appel à la BDD à travers une fonction du modèle.
                $retour = ajouteUtilisateur($bdd, $values);

                if ($retour) {
                    $alerte = "Inscription réussie";
                } else {
                    $alerte = "L'inscription dans la BDD n'a pas fonctionné";
                }
            }
        }
        $title = "Inscription";
        break;

        case 'deconnexion':
        // inscription d'un nouvel utilisateur
        $vue = "connexion";
        $title = "Connexion";
        break;
        
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/' . $vue . '.php');
include ('vues/footer.php');
