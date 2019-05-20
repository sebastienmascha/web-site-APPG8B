<?php


?>

<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">

    <title><?php echo $title; ?></title>
    <meta name="description" content="CaCo, la cafetière connectée.">
    <meta name="author" content="CaCo">

    <link rel="stylesheet" href="css/css.css">

</head>

<body>


    <div id="conteneur">



        <aside id="side" class="bg-trans">

            <a href="index.php">
                <div id="logo"><img src="img/logotop.png" /></div>
            </a>

            <nav class="menu" role="navigation">
                <ul class="liste">
                    <a href="index.php">
                        <li><span class="nav-icon"><img src="img/home.png" alt="Accueil" /></span><span class="nav-text"> Accueil</span></li>
                    </a>
                    <li><a href="index.php?cible=utilisateurs&fonction=compte"><span class="nav-icon"><img src="img/dashboard.png" alt="Mon compte" /></span> <span class="nav-text">Mon compte</span></a></li>
                    <li><a href="index.php?cible=utilisateurs&fonction=stock"><span class="nav-icon"><img src="img/package.png" alt="Stock" /> </span><span class="nav-text">Stock</span></a></li>
                    <li><a href="index.php?cible=utilisateurs&fonction=referent"><span class="nav-icon"><img src="img/admin.png" alt="Referent" /></span> <span class="nav-text">Référent</span></a></li>

                </ul>
            </nav>

        </aside>

        <header class="bg-trans">
            <div class="droite">
                
                <p ><?php echo $_SESSION['prenom']?></p>
                <img src="img/icon.png" />
                <img src="img/notif.png" />
                <a href="index.php?cible=utilisateurs&language=en">
                    <div class="droite"><img src="img/drapeauAnglais.png" /></div>
                </a>
                <a href="index.php?cible=utilisateurs&language=fr">
                    <div class="droite"><img src="img/drapeauFrance.png" /></div>
                </a>
                <a href="index.php?cible=connexion&fonction=deconnexion&token=<?php echo $_SESSION['token']; ?>">
                    <div class="droite"><img src="img/deco.png" /></div>
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