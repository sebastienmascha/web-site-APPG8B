<?php
/**
 * Vue : accueil
 */


?>

<style>
    <?php include "css/css_admin.css";
    ?>
</style>
<?php echo $alerte; ?>
<?php echo $alertemdp; ?>
<p class="titre">Gestion des utilisateurs:</p>



<div class="datagrid">
<table>
<thead>
	<tr>
		<th>Nom</th>
		<th>Type</th>
		<th>Heure</th>
		<th>E-mail</th>
		<th>Suppression</th>
        <th>Modifier</th>
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
			<td><?php echo $element['heure']; ?> </td>
			<td><?php echo $element['email']; ?> </td>
			<td>
            <a class="delete_btn" href="index.php?cible=admin&fonction=supprimerUtilisateur&id=<?php echo $element['id']; ?>&token=<?php echo $_SESSION['token']; ?>"
            >Supprimer</a>
            </td>

            <td>
           <input id="edite"type="submit" value="Edit" onclick="edit_div('editer<?php echo $element['id'];?>')" /> 
            </td>


		</tr>

<?php	$i++; }	?>


</tbody>
</table>
</div>
</br>

<?php
foreach ($utilisateurs as $user) { 
    ?>
<div id="editer<?php echo $user['id'];?>" style="display:none" >
    
 <div class="titre">Modifier le compte</div>
  <div id="boitePrincipale" >      
        <form method="POST" action="">
            <label for="nom">Nom : <br> </label> <input type="text" name="nom" id="nom" value="<?php echo $user['nom']; ?>"/> <br>
            <label for="prenom">Prenom : <br> </label> <input type="text" name="prenom" id="prenom" value="<?php echo $user['prenom']; ?>"/> <br>
            <label for="mail">Email : <br> </label> <input type="email" name="email" id="Email" value="<?php echo $user['email']; ?>"/> <br>
    
            <label for="mdp1">Nouveau mot de passe:</label>
                <input type="password" name="mdp1" id="mdp1" value=""/>
            <label for="mdp2">Confirmation:</label>
                <input type="password" name="mdp2" id="mdp2" value=""/>
                
            <label for="PreferenceBoisson "> Préférence Boisson : <br> </label>
            <select name="boisson" value="">
                <?php  $req = recupereTous($bdd, 'boisson_boisson');
                foreach ($req as $element) {
                    echo '<option';
                    if($element['id'] == $user['preference']) { echo ' selected'; }
                    echo ' value="'.$element['id'].'">'.$element['nom'].'</option>';
                }
                ?>
            </select>
            
            <label for="heure"> Préférence heure de préparation: </label>

            <input type="time"  id="heure" name="heure"
                min="00:00" max="23:59" value="<?php echo $user['heure']; ?>" required/>
                




            <input type="hidden" name="id" value="<?php echo $user['id']; ?>"/> 
            <div style="text-align: center;">
                <input type="submit" value="Valider" >
            </div>

        </form>
    </div>
</div>    

<?php   } ?>
<script src="js/afficher_masquer.js"></script>





<p class="titre">Ajout d'utilisateur:</p>

<div id="boitePrincipale" >
        
            <form method="POST" action="">
            <label for="nom">Nom : <br> </label> <input type="text" name="nomadd" id="nom" required/> <br>
            <label for="prenom">Prenom : <br> </label> <input type="text" name="prenomadd" id="prenom" required/> <br>
            <label for="mail">Email : <br> </label> <input type="email" name="emailadd" id="Email" required/> <br>    
                <label for="mdp1">Mot de passe:</label>
                <input type="password" name="mdp1add" id="mdp1" value="" required/>
            <label for="mdp2">Confirmation:</label>
                <input type="password" name="mdp2add" id="mdp2" value="" required/>
                
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
                <input type="time"  id="heure" name="heureadd"
                    min="00:00" max="23:00" placeholder="heure" required/>
                <div style="text-align: center;">
                    <input type="submit" value="Ajouter cet utilisateur" >
                </div>
                                                
            </form>
        
</div> 