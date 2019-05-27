<?php
/**
* Vue : ajouter un capteur
*/
?>

<?php echo AfficheAlerte($alerte); ?>

<form method="POST" action="">
	
	<label>Nom :</label>
	<input type="text"  name="name" />
	
	<label>Type :</label>
	<input type="text"  name="type" />

    <button type="submit" name="submit">Add</button>

</form>

<p><a href="index.php?cible=capteurs">Go back</a> | <a href="index.php">Home</a></p>