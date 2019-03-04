<?php

try{
    $bdd = new PDO('mysql:host=db4free.net:3306;dbname=mvcg8b;charset=utf8', 'appg8b', 'jesuislemotdepasseg8b', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}