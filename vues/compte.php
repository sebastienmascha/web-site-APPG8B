<?php 
/**
* Vue : accueil
*/
?>
<style>
<?php include "css/css_compte.css"; ?>
</style>

<div id="boitePrincipale" >
<div class="boite1">
<form method="POST" action="">
        <input type="email" name="Email" id="Email" placeholder="Email" required/>
        <input type="text" name="Prénom" id="Prénom" placeholder="Prénom" required/>
        
        <select>
        <option value="">Préférence</option>
        <option value="">café</option>
        <option value="">Chocolat chaud</option>
        <option value="">Late</option>
        <option value="">Cappucino</option>
        <option value="">Thé</option>
        </select>
        <label for="heure">Heure de préparation:</label>
        <input type="time"  id="heure" name="heure"
       min="00:00" max="23:00" placeholder="heure" required/>
        <input type="submit" value="Valider">								
    </form>
</div>
<div class="boite2">
    <figure>
        <img src="img/icon.png" class="icon" alt="icon">
        <figcaption class="légende"> <p> <?php echo $_SESSION['prenom']?> </p>  </figcaption>
    </figure>
    <p class="utilisateur">type d'utilisateur</p>
</div>
<div class="boite3" style="background:url('img/Appartement_Paris.jpg'); background-size:cover; ">
	<p class="p" >Appartement Paris </p>
		
		<div >
		<input  type="button"  value="Sélectionner">
		</div>
</div>




<div class="boite4" style="background:url('img/Maison_Chantilly.jpg'); background-size:cover; ">

	<p class="p" > Maison Chantilly </p>
	<div >
	<input  type="button" value="Sélectionner">
	</div>
</div>

	
<div class="boite5" style="background:url('img/Châlet_Avoriaz.jpg'); background-size:cover; ">

	<p class="p">Châlet 
		<br>Avoriaz</p>
	<div class="box">
		<input  type="button"  value="Sélectionner">
	</div>
</div>





<div class="boite6" style="background:url('img/Maison_Biarritz.jpg'); background-size:cover; ">

	<p class="p">Maison Biarritz </p>
	<div class="box">
		<input  type="button"  value="Sélectionner">
	</div>
</div>
