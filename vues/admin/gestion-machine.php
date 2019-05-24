<?php
/**
 * Vue : accueil
 */
?>

<style>
    <?php include "css/css_admin.css";
    ?>
</style>

<p class="titre">Gestion des différentes machines:</p>



<?php foreach ($machines as $machine) { ?>

<div class="boite" style="background:url('img/Appartement_Paris.jpg'); background-size:cover; ">
	<p class="p" ><?php echo $machine['name']; ?></p>
	<p class="p" ><?php echo $machine['id']; ?> </p>
		<div class="center">
            <a class="button" href="index.php?cible=admin&fonction=gestion-capteur&idMachine=<?= $machine['id'] ?>;">Selectionner</a>       
        </div>
</div>


<?php } ?>


<p class="titre">Ajout maison</p>

<div id="boitePrincipale" >
        <div class="boite1">
            <form method="POST" action="">
            <label for="nom">Nom : <br> </label> <input type="text" name="nom" id="nom" required/> 

                <div style="text-align: center;">
                    <input type="submit" value="Ajouter cette machine dans cette maison" >
                </div>
                                                
            </form>
        </div>
</div> 

