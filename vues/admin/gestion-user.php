<?php
/**
 * Vue : accueil
 */
?>

<style>
    <?php include "css/css_admin.css";
    ?>
</style>


<p class="titre">Gestion des utilisateurs:</p>

<?php foreach ($utilisateurs as $element) { ?>


<a class="delete_btn" href="index.php?cible=admin&fonction=supprimerUtilisateur&id=<?= $element['id']; ?>"
	>Supprimer</a>
<div class='utilisateur'>
	
	<?php echo $element['prenom']; ?>   
	<?php echo $element['nom']; ?>
	
</div>

<br>
<br>


<?php } ?>
