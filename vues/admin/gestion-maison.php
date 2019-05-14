<?php
/**
 * Vue : accueil
 */
?>

<style>
    <?php include "css/css_admin.css";
    ?>
</style>

<p>Gestion des différents foyers:</p>



<?php foreach ($foyers as $element) { ?>

<div class="boite" style="background:url('img/Appartement_Paris.jpg'); background-size:cover; ">
	<p class="p" ><?php echo $element['nom']; ?></p>
		<p class="p" ><?php echo $element['id']; ?> </p>
		<div class="box">
		<input  type="button" onclick="document.location.href='index.php?cible=utilisateurs&fonction=referent-machine';" value="Sélectionner">
		</div>
</div>

<?php } ?>
