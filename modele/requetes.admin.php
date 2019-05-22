<?php

//on définit le nom de la table
$table = "users";


function recupereUsers(PDO $bdd): array {
    $query = 'SELECT * FROM users_user';
    $utilisateurs = $bdd->query($query)->fetchAll();
    return $utilisateurs;
}

function deleteUsers(PDO $bdd,int $idSupprimer) {
    $query = "DELETE FROM users_user WHERE id=:id ;";
    $statement = $bdd->prepare($query);
    $statement->execute(["id" => (int)$idSupprimer]);

    $query = "DELETE FROM users_homes WHERE idUser=:id ;";
    $statement = $bdd->prepare($query);
    $statement->execute(["id" => (int)$idSupprimer]);
}

/**
 * Récupère tous les enregistrements de la table users
 * @param PDO $bdd
 * @return array
 */
function recupereFoyers(PDO $bdd): array {
    $query = "SELECT * FROM structure_foyer";
    return $bdd->query($query)->fetchAll();
}
