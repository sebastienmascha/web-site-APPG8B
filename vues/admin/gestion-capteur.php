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






<div class="datagrid">
<table  class="haute" >
<thead>
	<tr>
		<th>Type</th>
		<th>Mesure</th>
		<th>Etat</th>
	</tr>
</thead>


<tbody>
<?php 
$i = 0;
 foreach ($capteurs as $element) { 

 	if( $element['etat'] == 1) 
 		{ $etat = succes("O");
 } 
 elseif( $element['etat'] == 0) 
 	{ 
 		$etat = alerte("X");
 	} 


	if ($i%2 == 0 ){ $alt = 'class="alt"'; } else { $alt = ''; } ?>

		<tr <?php echo $alt; ?>>
			<td>
			<?php echo $element['type']; ?>   
			</td>
			<td>
			<?php echo $element['Mesure']; ?>   
			</td>
			<td><?php echo $etat; ?> </td>



		</tr>


<?php	$i++; }	?>

</tbody>
</table>
</div>

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
