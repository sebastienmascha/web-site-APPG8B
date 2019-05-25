<?php
/**
 * Vue : accueil
 */

echo $alerte;
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
		<th>Nb Maisons</th>
		<th>Selectionner</th>
	</tr>
</thead>


<tbody>
<?php 
$i = 0;
foreach ($foyers as $element) { 

		$nbMaisons = nbmaison($bdd,$element['id']);

	if ($i%2 == 0 ){ $alt = 'class="alt"'; } else { $alt = ''; } ?>
		<tr  <?php echo $alt; ?>>
			<td>
			<?php echo $element['id']; ?>   
			</td>
			<td><?php echo $element['nom']; ?> </td>
			<td><?php echo $nbMaisons['nombreMaisons']; ?> </td>
			<td>
            <?php echo '<a class="" href="index.php?cible=admin&fonction=gestion-maison&idFoyer='.$element["id"].'"
            ><input type="submit" value="ACCEDER" ></a>'; ?>
            </td>


		</tr>

<?php	$i++; }	?>

</tbody>
</table>
</div>



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
