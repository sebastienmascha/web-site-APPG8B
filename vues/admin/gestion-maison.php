<?php
/**
 * Vue : accueil
 */
?>

<style>
    <?php include "css/css_admin.css";
    ?>
</style>

<p class="titre">Gestion des différentes maisons:</p>



<?php foreach ($maisons as $maison) { ?>

<div class="boite" style="background:url('img/Appartement_Paris.jpg'); background-size:cover; ">
	<p class="p" ><?php echo $maison['nom']; ?></p>
	<p class="p" ><?php echo $maison['id']; ?> </p>
	<div class="center">
        <a class="button" href="
            	index.php?cible=admin&fonction=gestion-machine&idMaison=<?= $maison['id'] ?>;">Selectionner</a>    
    </div>
</div>

<?php } ?>



