<?php 
/**
* Vue : accueil
*/
?>

<style>
<?php include "css/css_referent-autre-page.css"; ?>
</style>
<?php foreach ($maisons as $element) { ?>
	<div class="boite" style="background:url('img/Appartement_Paris.jpg'); background-size:cover; ">
		<p class="afficherTitre" >
			<?php echo $element['nom']; ?>
			<?php echo $element['location']; ?>
		</p>	
			<div class="center">
            	<a class="button" href="index.php?cible=utilisateurs&fonction=referent-machine&idMaison=<?= $element['idMaison'] ?>;">Select</a>    
         	</div>
	</div>
<?php } ?>



	
		
	





	