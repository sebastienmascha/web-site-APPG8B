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




<div class="datagrid">
<table>
<thead>
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Selectionner</th>
	</tr>
</thead>


<tbody>
<?php 
$i = 0;
foreach ($foyers as $element) { 

	if ($i%2 == 0 ){ $alt = 'class="alt"'; } else { $alt = ''; } ?>
		<tr  <?php echo $alt; ?>>
			<td>
			<?php echo $element['id']; ?>   
			</td>
			<td><?php echo $element['nom']; ?> </td>
			<td>
            <?php echo '<a class="" href="index.php?cible=admin&fonction=gestion-maison&idFoyer='.$element["id"].'"
            ><input type="submit" value="ACCEDER" ></a>'; ?>
            </td>


		</tr>

<?php	$i++; }	?>

</tbody>
</table>
</div>


