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
			<?php 
			switch ( $capteur['type']){
				case 1: 
					echo 'Température';
					break;
				case 2: 
					echo 'Présence de tasse';
					break;
				case 3: 
					echo 'Présence de capsules';
					break;
				case 4: 
					echo 'Capteur sonore';
					break;
				case 5: 
					echo 'Résistance Chauffante';
					break;
				default:
					echo 'Capteur non rentré dans la base de données';
			}
			?>
		</p>
		<div class="boite" >
			<?php
			if ($capteur['type']==1) {
				echo 'Use : Get back the temperature from the drink to know if it needs to be warmed  <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
					echo 'Good <br/>';
				} else {
					echo 'Critical<br/>';
				}
				echo 'Temperature measured right now : ';
				echo $capteur['Mesure'];
				echo ' °C';
			} else if ($capteur['type']==2){
				echo 'Use : Permit to know if there is a mug in front of the machine <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
					echo 'Good<br/>';
				} else {
					echo 'Critical<br/>';
				}
				echo 'Calculated distance : ';
				echo $capteur['Mesure'];
				echo ' cm';
			} else if ($capteur['type']==3){
				echo 'Use : Permit to know if there are capsules remaining in the machine <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
					echo 'Good<br/>';
				} else {
					echo 'Critical<br/>';
				}
				echo 'Distance calculée : ';
				echo $capteur['Mesure'];
				echo ' cm';
			}else if ($capteur['type']==4){
				echo 'Use : Permit to comand a coffee with the voice <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
						echo 'Good<br/>';
				} else {
						echo 'Critical<br/>';
				}
			} else if ($capteur['type']==5){
				echo 'Use : Warm the drink if needed  <br/>';
				echo 'State : ';
				if ($capteur['etat']==1) {
						echo 'Good<br/>';
				} else {
						echo 'Critical<br/>';
				}
				
			}
			?>
		</div>
	

				

	</div>

<?php } ?>