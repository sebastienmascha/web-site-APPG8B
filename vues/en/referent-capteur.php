<?php 
/**
* Vue : accueil
*/
?>
<style>
<?php include "css/css_referent-autre-page.css"; ?>
</style>

<?php foreach ($capteurs as $capteur) { ?>
	<div class="boite" >

		<p class="afficherTitre"> 
			<?php echo $capteur['type']; ?>	
		</p>

		<div class="boite" >
			<?php
			if ($capteur['type']=='Température') {
				echo 'Use : Get back the temperature from the drink to know if it needs to be warmed <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
					echo 'Good <br/>';
				} else {
					echo 'Critical<br/>';
				}
				echo 'Temperature measured right now : ';
				echo $capteur['Mesure'];
				echo ' °C';
			} else if ($capteur['type']=='Présence de tasse'){
				echo 'Use : Permit to know if there is a mug in front of the machine <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
					echo 'Good <br/>';
				} else {
					echo 'Critical<br/>';
				}
				echo 'Calculated distance : ';
				echo $capteur['Mesure'];
				echo ' cm';
			} else if ($capteur['type']=='Présence de capsules'){
				echo 'Use : Permit to know if there are capsules remaining in the machine <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
					echo 'Good <br/>';
				} else {
					echo 'Critical<br/>';
				}
				echo 'Calculated distance : ';
				echo $capteur['Mesure'];
				echo ' cm';
			}else if ($capteur['type']=='Sonore'){
				echo 'Use : Permit to comand a coffee with the voice  <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
					echo 'Good <br/>';
				} else {
					echo 'Critical<br/>';
				}
			} else if ($capteur['type']=='Résistance Chauffante'){
				echo 'Use : Warm the drink if needed <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
					echo 'Good <br/>';
				} else {
					echo 'Critical<br/>';
				}
				
			}
			?>
		</div>
	</div>
<?php } ?>
