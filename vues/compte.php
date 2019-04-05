<?php 
/**
* Vue : accueil
*/
?>
<style>
    <?php include "css/css_compte.css";
    ?>
</style>





<div class="boite">
    <form method="POST" action="traitement.php">
        <input type="email" name="Email" id="Email" placeholder="Email" required />
        <input type="text" name="Prénom" id="Prénom" placeholder="Prénom" required />

        <select>
            <option value="">Préférence</option>
            <option value="">café</option>
            <option value="">Chocolat chaud</option>
            <option value="">Late</option>
            <option value="">Cappucino</option>
            <option value="">Thé</option>
        </select>
        <input type="time" id="heure" name="heure" min="00:00" max="23:00" placeholder="heure" required />


        <input type="submit" value="Valider">

    </form>
    <p class="utilisateur">type d'utilisateur</p>
</div>
<figure>
    <img src="img/icon.png" class="icon" alt="icon">
    <figcaption class="légende">NAME_USER </figcaption>
</figure> 