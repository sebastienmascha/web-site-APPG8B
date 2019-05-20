<?php
/**
 * Vue : accueil
 */
?>

<style>
    <?php include "css/css_admin.css";
    ?>
</style>

<p class="titre">Gestion des utilisateurs:</p>



<div class="datagrid">
<table>
<thead>
	<tr>
		<th>Nom</th>
		<th>Type</th>
		<th>Id</th>
		<th>E-mail</th>
		<th>Suppression</th>
	</tr>
</thead>


<tbody>
<?php 
$i = 0;
foreach ($utilisateurs as $element) { 

	if ($i%2 == 0 ){ $alt = 'class="alt"'; } else { $alt = ''; } ?>
		<tr <?php echo $alt; ?>>
			<td>
			<?php echo $element['prenom']; ?>   
			<?php echo $element['nom']; ?>
			</td>
			<td><?php echo $element['typeUser']; ?> </td>
			<td><?php echo $element['id']; ?> </td>
			<td><?php echo $element['email']; ?> </td>
			<td>
			<a class="delete_btn" href="index.php?cible=admin&fonction=supprimerUtilisateur
			&id=<?php echo $element['id']; ?>
			&token=<?php echo $_SESSION['token']; ?>"
			>Supprimer</a>
			</td>
		</tr>
<?php	$i++; }	?>


</tbody>
</table>
</div>
</br>


<p class="titre">Ajout d'utilisateur:</p>

<div id="boitePrincipale" >
        <div class="boite1">
            <form method="POST" action="">

                <input type="email" name="Email" id="Email" placeholder="Email">
                <input type="text" name="Prénom" id="Prénom" placeholder="Prénom">
                <input type="text" name="Prénom" id="Prénom" placeholder="Nom">
                <select>
                    <option value="">Préférence</option>
                    <option value="">Café</option>
                    <option value="">Chocolat chaud</option>
                    <option value="">Late</option>
                    <option value="">Cappucino</option>
                    <option value="">Thé</option>
                </select>
            </br></br>
                <label for="heure">Heure de préparation:</label>
                <input type="time"  id="heure" name="heure"
                    min="00:00" max="23:00" placeholder="heure" required/>
                <div style="text-align: center;">
                    <input type="submit" value="Ajouter cet utilisateur" >
                </div>
                								
            </form>
        </div>
</div> 

