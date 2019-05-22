<?php 
/**
* Vue : accueil
*/



?>

<style>
<?php include "css/css_referent-profil.css"; ?>
</style>

<?php foreach ($users as $user) { ?>
	
<div class="gauche">

	

		<div class="LigneUser">
			<div class="boite2">
				<?php echo $user['prenom']; ?>
			</div>

			<div class="boite2">
				<?php echo $user['typeUser']; ?>
			</div>

			<div class="boite2">
				<input id="edite"type="button" value="Edit" onclick="edit_div('editer<?php echo $user['id'];?>')" /> </p>
			</div>
			
		</div>

	
</div>

<div class="droite">
	<div id="editer<?php echo $user['id'];?>" style="display:none" >
	


		<div class="title">MODIFIER LE COMPTE</div>
		
		<form method="POST" action="">
			<label for="nom">Nom : <br> </label> <input type="text" name="nom" id="nom" value="<?php echo $user['nom']; ?>"/> <br>
			<label for="prenom">Prenom : <br> </label> <input type="text" name="prenom" id="prenom" value="<?php echo $user['prenom']; ?>"/> <br>
			<label for="mail">Email : <br> </label> <input type="email" name="email" id="Email" value="<?php echo $user['email']; ?>"/> <br>
 	
			<label for="mdp1">Nouveau mot de passe:</label>
                <input type="password" name="mdp1" id="mdp1" value=""/>
			<label for="mdp2">Confirmation:</label>
				<input type="password" name="mdp2" id="mdp2" value=""/>
				
			<label for="PreferenceBoisson "> Préférence Boisson : <br> </label>
			<select name="boisson" value="">
				<?php  $req = recupereTous($bdd, 'boisson_boisson');
				foreach ($req as $element) {
					echo '<option';
					if($element['id'] == $user['preference']) { echo ' selected'; }
					echo ' value="'.$element['id'].'">'.$element['nom'].'</option>';
				}
				?>
			</select>
			
			<label for="heure"> Préférence heure de préparation: </label>

			<input type="time"  id="heure" name="heure"
				min="00:00" max="23:59" value="<?php echo $user['heure']; ?>" required/>
				
			<label for="heure"> Type d'utilisateur: </label>

			<input type="hidden" name="idUser" value=<?php echo $user['id'];?> />
		
		
			<div style="text-align: center;">
				<input type="submit" value="Valider" />
			</div>

		</form>
	</div>
</div>
<?php } ?>
<?php echo $alerte; ?>


<script src="js/afficher_masquer.js"></script>






	


