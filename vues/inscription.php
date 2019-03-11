<?php 
/**
* Vue : inscrire un nouvel utilisateur
*/			
?>

<style>
<?php include "css/css_inscription.css"; ?>
</style>


<?php echo AfficheAlerte($alerte); ?>

<form method="POST" action="">
	
	<label>Pseudo :</label>
	<input type="text"  name="username" />
	
	<label>Mot de passe :</label>
	<input type="password"  name="password"  />

    <button type="submit" name="submit">S'inscrire</button>

</form>

<p><a href="index.php">Retour</a></p>






<div class="row">
		<div class="well">
			<form method="post" class="bs-example form-horizontal" action="">
		
                <fieldset>
                  <legend>Formulaire de connexion</legend>
  
				<div class="form-group <?php if(isset($erreurPseudo)) echo 'has-error'; ?>">
                    <label class="col-lg-2 control-label" for="inputPseudo">Pseudo</label>
                    <div class="col-lg-4">
                      <input type="text" name="username" placeholder="Pseudo" id="inputPseudo" class="form-control" value="<?php echo xss($pseudo); ?>">
					  <?php if(isset($msgPseudo)) echo '<p class="help-block">'.$msgPseudo.'</p>'; ?>
                    </div>
                  </div>
				  
                  <div class="form-group <?php if(isset($erreurpass)) echo 'has-error'; ?>">
                    <label class="col-lg-2 control-label" for="inputPassword">Mot de passe</label>
                    <div class="col-lg-4">
                      <input type="password" name="password" placeholder="*********" id="inputPassword" class="form-control">
					  <?php if(isset($msgpass)) echo '<p class="help-block">'.$msgpass.'</p>'; ?>
                    </div>
                  </div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default">Annuler</button> 
                      <button class="btn btn-primary" type="submit">Confirmer</button> 
                    </div>
                  </div>
				  
                </fieldset>
         
			</form>
		</div>
</div>