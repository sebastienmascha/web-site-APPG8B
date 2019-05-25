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

			<div class="boite2">
				<a class="delete_btn" href="index.php?cible=utilisateurs&fonction=supprimerUtilisateur&id=<?php echo $user['id']; ?>&token=<?php echo $_SESSION['token']; ?>">Supprimer</a>
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
			<select name="acces" value="">
					<option value=25> Invité</option>
                    <option value=50> Enfant</option>
                    <option value=75> Utilisateur</option>
                    <option value=100> Référent</option>
            </select>

			<input type="hidden" name="idUser" value=<?php echo $user['id'];?> />
		
		
			<div style="text-align: center;">
				<input type="submit" value="Valider" />
			</div>

		</form>
	</div>
</div>
<?php } ?>
<?php echo $alerte; ?>

<div class="boite2">
	<input id="addUser" type="button" value="Ajouter utilisateur dans le foyer" onclick="edit_div('add')" /> </p>
</div>

<div id="add" style="display:none" >
	<div class="title">AJOUTER UTILISATEUR</div>


	<form method="POST" action="">
            <label for="nom">Nom : <br> </label> <input type="text" name="nomadd" id="nom" required/> <br>

            <label for="prenom">Prenom : <br> </label> <input type="text" name="prenomadd" id="prenom" required/> <br>

            <label for="mail">Email : <br> </label> <input type="email" name="emailadd" id="Email" required/> <br>  

                <label for="mdp1">Mot de passe:</label>
                <input type="password" name="mdp1add" id="mdp1" value="" required/>


            <label for="mdp2">Confirmation:</label>
                <input type="password" name="mdp2add" id="mdp2" value="" required/>
                
        	<label for="PreferenceBoisson "> Préférence Boisson : <br> </label>
            <select name="boissonadd" value="">
                <?php  $req = recupereTous($bdd, 'boisson_boisson');
                foreach ($req as $element) {
                    echo '<option';
                    if($element['id'] == $user['preference']) { echo ' selected'; }
                    echo ' value="'.$element['id'].'">'.$element['nom'].'</option>';
                }
                ?>
			</select>

			<label for="heure">Heure de préparation:</label>
                <input type="time"  id="heure" name="heureadd"
					min="00:00" max="23:00" placeholder="heure" required/>


			<label for="maison">Choisissez la maison:</label>    
            <select name="idmaisonadd" value="">
                    <?php  $req = recupereTous($bdd, 'structure_maison');
                foreach ($req as $element) {
                    echo '<option';
                    echo ' value="'.$element['id'].'">'.$element['nom'].'</option>';
                }
                ?>
            </select>


            <label for="heure">Choissisez le type d'utilisateur :</label>    
			<select name="accesadd" value="">
					<option value=25> Invité</option>
                    <option value=50> Enfant</option>
                    <option value=75> Utilisateur</option>
                    <option value=100> Référent</option>
            </select>

            
					
            <div style="text-align: center;">
                <input type="submit" value="Ajouter cet utilisateur" >
            </div>
                                                
    </form>

</div>


<script src="js/afficher_masquer.js"></script>






	


