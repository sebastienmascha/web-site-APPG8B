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
        if (!isset($_SESSION['id'])) {
            $vue = "connexion";
            $title = "Connexion";
        } else {
            header('location:index.php');
        }

        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['email']) and isset($_POST['password'])) {

            $valide = true;

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $alerte = "Adresse email non valide.";
                $valide = false;
            }


            // RECHERCHE SI LE COMPTE EXISTE





            $req = recupereTous($bdd, 'users_user WHERE email="' . secure($_POST['email']) . '" AND valide=1');

            if (!$req) {
                $alerte = "Le compte n'existe pas.";
                $valide = false;
            }

            foreach ($req as $element) {

                if (crypterMdp($_POST['password']) != $element['mdp']) {
                    $alerte = "Le mot de passe n'est pas correct.";
                    $valide = false;
                }
            }


            if ($valide) {

                // RECUPERE TOUT 

                foreach ($req as $dataCo) {

                    // variable session pr avoir acces rapidement a ces données
                    $_SESSION['id'] = $dataCo['id'];
                    $_SESSION['nom'] = $dataCo['nom'];
                    $_SESSION['prenom'] = $dataCo['prenom'];
                    $_SESSION['email'] = $dataCo['email'];
                    $_SESSION['typeUser'] = $dataCo['typeUser'];
                    $_SESSION['idFoyer'] = $dataCo['idFoyer'];

                    $_SESSION['pref'] = $dataCo['preference'];
                    $_SESSION['heure'] = $dataCo['heure'];

                    $_SESSION['token'] = uniqid(md5(rand()), true); // utile pour le lien de déconnexion 
                    $_SESSION['acces'] = $dataCo['acces'];

                    $alerte = "Bienvenue " . $_SESSION['prenom'] . " !";
                }
            }
        }
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
        if (isset($_GET['token']) and isset($_SESSION['token']) and $_GET['token'] == $_SESSION['token']) {
            session_destroy();
        } else { }
        $vue = "deconnexion";
        $title = "Déconnexion";
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







    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "components/erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/fr/header-footer/headerConnexion.php');
include('vues/fr/' . $vue . '.php');
include('vues/fr/header-footer/footer.php');
