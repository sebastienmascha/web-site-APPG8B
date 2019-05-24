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
foreach ($maisons as $maison) { 

	if ($i%2 == 0 ){ $alt = 'class="alt"'; } else { $alt = ''; } ?>
		<tr  <?php echo $alt; ?>>
			<td>
			<?php echo $maison['id']; ?>   
			</td>
			<td><?php echo $maison['nom']; ?> </td>
			<td>
            <?php echo '<a class="" href="index.php?cible=admin&fonction=gestion-machine&idMaison='.$maison["id"].'"
            ><input type="submit" value="ACCEDER" ></a>'; ?>
            </td>


		</tr>

<?php	$i++; }	?>

</tbody>
</table>
</div>






