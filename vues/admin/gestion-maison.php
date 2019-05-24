<?php
/**
 * Vue : accueil
 */
?>

<style>
    <?php include "css/css_admin.css";
    ?>
</style>

<p class="titre">Gestion des différentes maisons:</p>



<?php foreach ($maisons as $maison) { ?>

<div class="boite" style="background:url('img/Appartement_Paris.jpg'); background-size:cover; ">
	<p class="p" ><?php echo $maison['nom']; ?></p>
	<p class="p" ><?php echo $maison['id']; ?> </p>
	<div class="center">
        <a class="button" href="
            	index.php?cible=admin&fonction=gestion-machine&idMaison=<?= $maison['id'] ?>;">Selectionner</a>    
    </div>
</div>

<?php } ?>


<p class="titre">Ajout maison</p>

<div id="boitePrincipale" >
        <div class="boite1">
            <form method="POST" action="">
            <label for="nom">Nom : <br> </label> <input type="text" name="nom" id="nom" required/> 
            <label for="nom">Lieu : <br> </label> <input type="text" name="lieu" id="lieu" required/> 

                <div style="text-align: center;">
                    <input type="submit" value="Ajouter cette maison dans ce foyer" >
                </div>
                                                
            </form>
        </div>
</div> 


