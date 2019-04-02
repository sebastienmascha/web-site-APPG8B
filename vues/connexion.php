<?php
/**
* Vue : Connexion
*/
?>

<?php
if (!isset($valide) or !$valide) {

    ?>
<div class="boite">

    <form method="POST" action="">
        <label for="email">Email : </label> <input type="email" name="email" id="email" placeholder="Email" required />
        <label for="password">Mot de passe : </label> <input type="password" name="password" id="password" placeholder="********" required />
        <label for="submit"></label><input type="submit" value="Valider">
        <?php 
        if (isset($alerte)) {
            echo ' <label for="alerte"></label>' . alerte($alerte);
        }
        ?>
    </form>

</div>
<div class="boite">

    <img src="img/logo.png" class="logo" alt="logo" style="height:300px;">
</div>

<?php 
} else {
    ?>
<div class="boite">

    <?php echo succes($alerte); ?>
    <meta http-equiv="refresh" content="3;URL=index.php">
</div>
<?php

} ?> 