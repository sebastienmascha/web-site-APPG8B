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

<p class="titre">Gestion des différentes maisons:</p>






<div class="datagrid">
<table>
<thead>
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Selectionner</th>
        <th>Supprimer</th>

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
            <td>
            <?php echo '<a class="delete_btn" href="index.php?cible=admin&fonction=supprimermaison&id='.$maison["id"].'"
            >Supprimer</a>'; ?>
            </td>


		</tr>

<?php	$i++; }	?>

</tbody>
</table>
</div>





<p class="titre">Ajout maison</p>

<div id="boitePrincipale" >
        <div class="boite1">
            <form method="POST" action="">
            <label for="nom">Nom : <br> </label> <input type="text" name="nom" id="nom" required/> 
            <label for="nom">Lieu : <br> </label> <input type="text" name="lieu" id="lieu" required/> 

            <input type="hidden" name="id" value="<?php echo $_GET['idFoyer']; ?>"/>
                <div style="text-align: center;">
                    <input type="submit" value="Ajouter cette maison dans ce foyer" >
                </div>
                                                
            </form>
        </div>
</div> 


