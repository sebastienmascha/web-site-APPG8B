<?php

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "users";


function recupereUsers(PDO $bdd): array {
    $query = 'SELECT * FROM users_user';
    return $bdd->query($query)->fetchAll();
}

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
        $query = "SELECT * FROM structure_machine
        WHERE structure_machine.idMaison =1+".$index ;
        $maisons[$index]['machines'] = $bdd->query($query)->fetchAll();
        $index = $index +1;
    }
    return $maisons;
}