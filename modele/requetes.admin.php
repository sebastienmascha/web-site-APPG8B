<?php

//on définit le nom de la table
$table = "users";


function recupereUsers(PDO $bdd): array {
    $query = 'SELECT * FROM users_user';
    $utilisateurs = $bdd->query($query)->fetchAll();
    return $utilisateurs;
}
function addUsers(PDO $bdd,int $idSupprimer) {
    $query = "ADD  FROM users_user";
    $statement = $bdd->prepare($query);
    $statement->execute(["id" => (int)$idSupprimer]);
}


function deleteUsers(PDO $bdd,int $idSupprimer) {
    $query = "DELETE FROM users_user WHERE id=:id ;";
    $statement = $bdd->prepare($query);
    $statement->execute(["id" => (int)$idSupprimer]);
}

/**
 * Récupère tous les enregistrements de la table users
 * @param PDO $bdd
 * @return array
 */

function recupereFoyers(PDO $bdd): array {
    $query = 'SELECT * FROM structure_foyer';
    $foyers = $bdd->query($query)->fetchAll();
    return $foyers;
}


function recupereMaisonsFromFoyerid(PDO $bdd, string $idFoyer):array{
    $query = "SELECT * FROM structure_maison 
            WHERE idFoyer=".$idFoyer;
    return $bdd->query($query)->fetchAll();
}


function recupereMachinefromMaisonidGest(PDO $bdd, string $idMaison):array{
    $query = "SELECT * FROM structure_machine 
            WHERE idMaison=".$idMaison;
    return $bdd->query($query)->fetchAll();
}



function recupereCapteursfromMachineidGest(PDO $bdd, string $idMachine):array{
    $query = "SELECT * FROM structure_capteur 
            WHERE idMachine=".$idMachine;
    return $bdd->query($query)->fetchAll();
}
