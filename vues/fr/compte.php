<?php 
/**
* Vue : accueil
*/
            $req = recupereTous($bdd, 'users_user WHERE id=' . secure($_SESSION['id']));
             foreach ($req as $dataMe) {

                    // variable session pr avoir acces rapidement a ces données
                   
                    $prenom = $dataMe['prenom'];
                    $email = $dataMe['email'];
                    $heure = $dataMe['heure'];
                    $pref = $dataMe['preference'];

                }

?>
<style>
    <?php include "css/css_compte.css";
    ?>
</style>



<div id="boitePrincipale" >
        <div class="boite1">

            <?php 
echo $alerte;
            ?>
            <form method="POST" action="">

<label for="email">Email:</label>
                <input type="email" name="email" id="Email" value="<?php echo $email; ?>"" required/>
    <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" id="Prénom" value="<?php echo $prenom; ?>" required/>


                <label for="boisson">Préférence:</label>
                <select name="boisson" value="">
                <?php  $req = recupereTous($bdd, 'boisson_boisson');
                  foreach ($req as $element) {
                    echo '<option';
                    if($element['id'] == $pref) { echo ' selected'; }
                    echo ' value="'.$element['id'].'">'.$element['nom'].'</option>';
                }
                ?>
                </select>
                <label for="heure">Heure de préparation:</label>
                <input type="time"  id="heure" name="heure"
                    min="00:00" max="23:59" value="<?php echo $heure; ?>" required/>
               
                	
                <label for="mdp1">Nouveau mot de passe:</label>
                <input type="password" name="mdp1" id="mdp1" value=""/>
<label for="mdp2">Confirmation:</label>
                <input type="password" name="mdp2" id="mdp2" value=""/>


                 <div style="text-align: center;">
                    <input type="submit" value="Valider" >
                </div>


            </form>
        </div>

        <div class="boite1" style="text-align: center;">
            <figure>
                <img src="img/icon.png" class="icon" alt="icon">
                <figcaption class="légende"> <p> <?php echo $_SESSION['prenom']?> </p>  </figcaption>
            </figure>
            <p class="utilisateur">Type utilisateur : <?php echo $_SESSION['typeUser']?></p>
        </div>

</div>  

<div class="mes-maisons">

    <?php foreach ($maisons as $element) { ?>
    

    <div class="boite1" >
        <p class="p"> 
            <?= $element['nom']; ?>
            <?= $element['location']; ?>
        </p>
        <div class="center">
            
            <a class="delete_btn" href="index.php?cible=utilisateurs&fonction=supprimerMaison&id=<?= $element['id']; ?>">Supprimer</a>    
         </div>
    </div>

    <?php } ?> 
</div