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



<?php	$i++; }	?>

</tbody>
</table>
</div>
