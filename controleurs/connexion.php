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

 // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['email']) and isset($_POST['password'])) {

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $alerte = "Adresse email non valide.";
            } 

            else if (!estUnMotDePasse($_POST['password'])) {
                $alerte = "Le mot de passe n'est pas correct.";
            } 
            

            // RECHERCHE SI LE COMPTE EXISTE
                $req = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT COUNT(id) FROM users_user WHERE email = '".secure($_POST['email'])."'");
                $res = mysqli_fetch_assoc($req);
            else if($res['id'] == 0)
            {
                $alerte = "Le compte n'existe pas.";
            }
            // RECHERCHE SI MOT DE PASSE EST BON
                $req2 = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM users_user WHERE email = '".secure($_POST['email'])."'");
                $res2 = mysqli_fetch_assoc($req2);
            else if(crypterMdp($_POST['pass']) != $res2['pass'])
            {
                $alerte = "Le mot de passe n'est pas correct.";
            }
          
                
                
                else
                {
                    
                // RECUPERE TOUT 

                    $req3 = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM users_user WHERE email = '".secure($_POST['email'])."'");
                    $dataCo = mysqli_fetch_assoc($req3);

                    // variable session pr avoir acces rapidement a ces données
                    $_SESSION['id'] = $dataCo['id'];
                    $_SESSION['nom'] = $dataCo['nom'];
                    $_SESSION['prenom'] = $dataCo['prenom'];
                    $_SESSION['email'] = $dataCo['email'];

                    $_SESSION['token'] = uniqid(md5(rand()), true); // utile pour le lien de déconnexion 
                    $_SESSION['acces'] = $dataCo['acces'];
                    
                    $alerte = "Bienvenue ".$dataCo['prenom']." !";
                  
                    
                    // AJOUTER session_start(); au tout début d'un fichier qui est inclu sur TOUTES les pages pour maintenir la session ouverte
                    // doit impérativement être déclaré avant que du code html soit appelé

                    exit;
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
include ('vues/footer/footer.php');
