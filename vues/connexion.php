<?php
/**
* Vue : entête HTML
*/
?>

<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">

    <title><?php echo $title; ?></title>
    <meta name="description" content="CaCo, la cafetière connectée.">
    <meta name="author" content="CaCo">

    <link rel="stylesheet" href="css/css_connexion.css">

</head>

<body>


    <div id="conteneur">





        <header class="bg-trans">
            <div class="gauche">
                <a href="index.php">
                    <div id="logo"><img src="img/logotop.png" /></div>
                </a>
            </div>
        </header>

        <div class="wrap">
            <main>
                <div id="page-wrap" class="bg-trans">

                    <div id="page-header">
                        <img src="img/home.png" alt="intitulé img" class="icon-page" />
                        <h1><?php echo $title; ?></h1>
                    </div>

                    <div class="page-content"> 