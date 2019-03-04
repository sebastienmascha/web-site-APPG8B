<?php

try{
    $bdd = new PDO('mysql:host=sql7.freesqldatabase.com:3306;dbname=sql7281782;charset=utf8', 'sql7281782', 'W2ZuBw3MyN', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// $bdd = new PDO('mysql:host=db4free.net:3306;dbname=mvcg8b;charset=utf8', 'appg8b', 'jesuislemotdepasseg8b', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));