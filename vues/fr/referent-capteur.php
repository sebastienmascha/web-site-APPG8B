<?php 
/**
* Vue : Liste des capteurs de la machine selectionnee 
*/
?>
<style>
<?php include "css/css_referent-autre-page.css"; ?>
</style>

<?php foreach ($capteurs as $capteur) { ?>
	<div class="boite" style="background:url('img/Micro.jpg'); background-size:cover; ">

		<p class="afficherTitre"> 
			<?php echo $capteur['type']; ?>
		</p>

		<div class="center">
			<p class="button">
				<input  type="button" value="Afficher Infos" onclick="edit_div('InfosCapteurs');" />
			</p>
              
        </div>
		
		<div id="editer" style="display:none">
			<p> Utilisation : </p>
			<p> Etat : </p>

		</div>




	</div>
<?php } ?>
