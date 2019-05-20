<?php 
/**
* Vue : accueil
*/
?>

<style>
<?php include "css/css_referent-autre-page.css"; ?>
</style>



<?php foreach ($machines as $machine) { ?>
	<div class="boite" style="background:url('img/MachineUne.jpg'); background-size:cover; ">

		<p class="afficherTitre"> 
			<?php echo $machine['name']; 
			?>
			
		</p>
		
			<div class="center">
            	<a class="button" href="index.php?cible=utilisateurs&fonction=referent-capteur&idMachine=<?= $machine['id'] ?>;">Selectionner</a>    
         	</div>
	</div>
<?php } ?>
