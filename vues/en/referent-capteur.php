<?php 
/**
* Vue : accueil
*/
?>
<style>
<?php include "css/css_referent-autre-page.css"; ?>
</style>

<?php foreach ($capteurs as $capteur) { ?>
	<div class="boite" style="background:url('img/Micro.jpg'); background-size:cover; ">

		<p class="afficherTitre"> 
			<?php echo $capteur['id']; ?>
			
		</p>

		<div class="center">
            	<a class="button" >Select</a>    
         	</div>
	</div>
<?php } ?>
