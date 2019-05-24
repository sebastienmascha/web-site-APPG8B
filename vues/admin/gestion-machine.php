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
 foreach ($machines as $machine) { 

	if ($i%2 == 0 ){ $alt = 'class="alt"'; } else { $alt = ''; } ?>
		<tr  <?php echo $alt; ?>>
			<td>
			<?php echo $machine['id']; ?>   
			</td>
			<td><?php echo $machine['name']; ?> </td>
			<td>
            <?php echo '<a class="" href="index.php?cible=admin&fonction=gestion-capteur&idMachine='.$machine['id'].'">
            <input type="submit" value="ACCEDER" ></a>'; ?>
            </td>


		</tr>

<?php	$i++; }	?>

</tbody>
</table>
</div>





