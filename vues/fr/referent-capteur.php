<?php 
/**
* Vue : Liste des capteurs de la machine selectionnee 
*/
?>
<style>
<?php include "css/css_referent-autre-page.css"; ?>
</style>

<?php foreach ($capteurs as $capteur) { ?>
	<div class="boite"  >

		<p class="afficherTitre"> 
			<?php echo $capteur['type']; ?>
		</p>
		<p >
			<?php
			if ($capteur['type']=='Température') {
				echo 'Utilisation : Récupère la température de la boisson pour savoir s il faut le rechauffer <br/>';
				echo 'Etat : ';
				if ($capteur['etat']==1) {
					echo 'Bon <br/>';
				} else {
					echo 'Critique<br/>';
				}
				echo 'Température mesurée actuellement : ';
			} else if ($capteur['type']=='Présence de tasse'){
				echo 'Utilisation : Permet de savoir si il y a une tasse devant la cafetière <br/>';
				echo 'Etat : ';
				if ($capteur['etat']==1) {
					echo 'Bon<br/>';
				} else {
					echo 'Critique<br/>';
				}
				echo 'Distance calculée : ';
			} else if ($capteur['type']=='Présence de capsules'){
				echo 'Utilisation : Permet de savoir si il reste des capsules dans la machine <br/>';
				echo 'Etat : ';
				if ($capteur['etat']==1) {
					echo 'Bon<br/>';
				} else {
					echo 'Critique<br/>';
				}
				echo 'Distance calculée : ';
			}else if ($capteur['type']=='Sonore'){
				echo 'Utilisation : Permet de commander un café avec la voix <br/>';
				echo 'Etat : ';
				if ($capteur['etat']==1) {
						echo 'Bon<br/>';
				} else {
						echo 'Critique<br/>';
				}
			} else if ($capteur['type']=='Résistance Chauffante'){
				echo 'Utilisation : Permet de réchauffer le café si besoin <br/>';
				echo 'Etat : ';
				if ($capteur['etat']==1) {
						echo 'Bon<br/>';
				} else {
						echo 'Critique<br/>';
				}
				
			}
			?>
		</p>
	

				

	</div>

<?php } ?>