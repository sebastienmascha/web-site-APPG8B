<?php 
/**
* Vue : accueil
*/
?>
<style>
    <?php include "css/css_compte.css";
    ?>
</style>



<div id="boitePrincipale" >
        <div class="boite1">
            <form method="POST" action="">

                <input type="email" name="Email" id="Email" placeholder=<?php echo $_SESSION['email']?> required/>
                <input type="text" name="Prénom" id="Prénom" placeholder=<?php echo $_SESSION['prenom']?> required/>
                
                <select>
                    <option value="">Préférence</option>
                    <option value="">café</option>
                    <option value="">Chocolat chaud</option>
                    <option value="">Late</option>
                    <option value="">Cappucino</option>
                    <option value="">Thé</option>
                </select>
                <label for="heure">Heure de préparation:</label>
                <input type="time"  id="heure" name="heure"
                    min="00:00" max="23:00" placeholder="heure" required/>
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
            <p class="utilisateur">type d utilisateur</p>
        </div>

</div>  

<div class="mes-maisons">

    <?php foreach ($maisons as $element) { ?>
    

    <div class="boite1" >
        <p class="p"> 
            <?php echo $element['nom']; ?>
            <?php echo $element['location']; ?>
        </p>
        <div class="center">
            <input type="Delete" value="Supprimer">      
         </div>
    </div>

    <?php } ?> 
</div>
      