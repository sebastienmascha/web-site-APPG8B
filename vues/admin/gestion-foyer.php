<?php
/**
 * Vue : accueil
 */
?>

<style>
    <?php include "css/css_admin.css";
    ?>
</style>

<p class="titre">Gestion des différents foyers:</p>



<?php foreach ($foyers as $element) { ?>

<div class="boite" style="background:url('img/Appartement_Paris.jpg'); background-size:cover; ">
	<p class="p" ><?php echo $element['nom']; ?></p>
	<p class="p" ><?php echo $element['id']; ?> </p>
	<div class="box">
			<div class="center">
            	<a class="button" href="
            	index.php?cible=admin&fonction=gestion-maison&idFoyer=<?= $element['id'] ?>;">Selectionner</a>    
         	</div>
	</div>
</div>

<?php } ?>


<p class="titre">Ajout foyer</p>

<div id="boitePrincipale" >
        <div class="boite1">
            <form method="POST" action="">
            <label for="nom">Nom : <br> </label> <input type="text" name="nom" id="nom" required/> 

                <div style="text-align: center;">
                    <input type="submit" value="Ajouter ce nouveau foyer" >
                </div>
                                                
            </form>
        </div>
</div> 
