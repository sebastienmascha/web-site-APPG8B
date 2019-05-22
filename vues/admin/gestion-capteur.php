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



