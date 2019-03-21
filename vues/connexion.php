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
<style>
form {
    width:100%;
}
label {
    display:inline-block;
    width:40%;
}
input[type=text],input[type=password], input[type=email], select, textarea {
    width: 50%;
    margin: 5px;
    padding: 5px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    height: 25px;
    margin:14px;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin:20px;
}

input[type=submit]:hover {
    background-color: #45a049;
}

</style>
</head>

<body>


    <div id="conteneur">

     

        <div class="wrap">
            <main>
                <div id="page-wrap" class="bg-trans">

                    <div id="page-header">
                        <img src="img/home.png" alt="intitulé img" class="icon-page" />
                        <h1><?php echo $title; ?></h1>
                    </div>

                    <div class="page-content"> 

<div class="boite">
    <form method="POST" action="traitement.php">
       <label for="email">Email : </label> <input type="email" name="email" id="email" placeholder="Email" required/>
        <label for="password">Mot de passe : </label> <input type="password" name="password" id="password" placeholder="********" required/>
        <label for="submit"></label><input type="submit" value="Valider">
    </form>
</div>
                <div class="boite">
                <img src="./../img/logo.png" class="logo" alt="logo" style="height:300px;">
                </div>