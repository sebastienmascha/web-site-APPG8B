<?php
/**
 * Fonctions liées aux contrôleurs
 */


/**
 * Détermine si le paramètre est un entier ou non
 * @param mixed $int
 * @return bool
 */
function estUnEntier($int): bool
{
    return is_numeric($int);
}

/**
 * Détermine si le paramètre est une string ou non
 * 
 * @param mixed $chaine
 * @return bool
 */
function estUneChaine($chaine): bool
{
    if (empty($chaine)) {
        return false;

    } else {
        return is_string($chaine);
    }
}

function estUnMotDePasse($chaine): bool
{
    if (empty($chaine) || strlen($chaine) < 8) {
        return false;
    } else {
        return is_string($chaine);
    }
}

function crypterMdp($password) {
    //return sha1($password);
    return password_hash($password, PASSWORD_BCRYPT);
}

function secure($chaine)
{
    $nouveau = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $chaine) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    return $nouveau;
}

