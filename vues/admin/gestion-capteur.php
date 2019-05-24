<?php
/**
 * Vue : accueil
 */
?>

<style>
    <?php include "css/css_admin.css";
    ?>
</style>

<p class="titre">Gestion des différents capteurs:</p>



<?php 

foreach ($capteurs as $element)
 { 
 
 	if( $element['etat'] == 1) 
 		{ $etat = succes("O");
 } 
 elseif( $element['etat'] == 0) 
 	{ 
 		$etat = alerte("O");
 	} 

 			?>
	<div class="boite" style="background:url(''); background-size:cover; ">
		<p class="p" ><?php echo $element['type']; ?> </p>
		Capteur en marche :
             <?php echo $etat; ?>
                            
</div>

<?php } ?>


<p class="titre">Ajout capteur</p>

<div id="boitePrincipale" >
        <div class="boite1">
            <form method="POST" action="">
            <label for="nom">Nom : <br> </label> <input type="text" name="nom" id="nom" required/> 
            <label for="nom">Nom : <br> </label> <input type="text" name="nom" id="nom" required/> 
                <div style="text-align: center;">
                    <input type="submit" value="Ajouter ce capteur dans cette machine" >
                </div>
                                                
            </form>
        </div>
</div> 
