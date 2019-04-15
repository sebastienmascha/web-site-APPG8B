<?php

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "users";

// requêtes spécifiques à la table des capteurs



/**
 * Recherche un utilisateur en fonction du nom passé en paramètre
 * @param PDO $bdd
 * @param string $nom
 * @return array
 */
function rechercheParNom(PDO $bdd, string $nom): array {
    $statement = $bdd->prepare('SELECT * FROM  users WHERE username = :username');
    $statement->bindParam(":username", $value);
    $statement->execute();
    return $statement->fetchAll();
}

/**
 * Récupère tous les enregistrements de la table users
 * @param PDO $bdd
 * @return array
 */


/**
 * Ajoute un nouvel utilisateur dans la base de données
 * @param array $utilisateur
 */
function ajouteUtilisateur(PDO $bdd, array $utilisateur) {
    
    $query = ' INSERT INTO users (username, password) VALUES (:username, :password)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":username", $utilisateur['username'], PDO::PARAM_STR);
    $donnees->bindParam(":password", $utilisateur['password']);
    return $donnees->execute();
}

/**
 * Récupère tous les enregistrements de la table users
 * @param PDO $bdd
 * @return array
 */
function recupereMaisons(PDO $bdd): array {
    $query = "SELECT * FROM structure_maison 
    INNER JOIN users_homes ON structure_maison.id = users_homes.idMaison 
    WHERE users_homes.idUser =" .$_SESSION['id'];
    return $bdd->query($query)->fetchAll();
}

function recupereMachines(PDO $bdd): array {
    $maisons = recupereMaisons($bdd);
    $index = 0;
    foreach ($maisons as $element) {
        $query = "SELECT * FROM structure_machine";
        $maisons[$index]['machines'] = $bdd->query($query)->fetchAll();
        $index = $index +1;
    }
    return $maisons;
}
