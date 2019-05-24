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

<p class="titre">Gestion des différentes machines:</p>



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

            <td>
            <?php echo '<a class="delete_btn" href="index.php?cible=admin&fonction=supprimerMachine&id='.$machine["id"].'"
            >Supprimer</a>'; ?>
            </td>
		</tr>

<?php	$i++; }	?>

</tbody>
</table>
</div>




<p class="titre">Ajout machine</p>

<div id="boitePrincipale" >
        <div class="boite1">
            <form method="POST" action="">
            <label for="nom">Nom : <br> </label> <input type="text" name="nom" id="nom" required/> 

            <input type='hidden' name="idMaison" value='<?php echo $_GET['idMaison']; ?>'/>
                <div style="text-align: center;">
                    <input type="submit" value="Ajouter cette machine dans cette maison" >
                </div>
                                                
            </form>
        </div>
</div> 

