<?php 
/**
* Vue : accueil
*/
?>
<style>
<?php include "css/css_compte.css"; ?>
</style>


    
    <div class="boite">
            
            <form method="POST" action="traitement.php">
                    <p> <label for="Email">Email :</label>
                        <input type="email" name="Email" id="Email" required/>
                    </p>
                    <p> <label for="Prénom">Prénom :</label>
                      <input type="text" name="Prénom" id="Prénom" required/>
                  </p>
                  <p> <label for="Préférence">Préférence :</label>
                      <input type="text" name="Préférence" id="Préférence" required/>
                  </p>
                  <p> <label for="Heure">Heure de préparation :</label>
                      <input type="text"  name="Heure" id="Heure" required/>
                  </p>
                  
                  <p> 
                      <button type="submit">Valider</button>  
                  </p>
      
                </form>
                
                <figure>
                <img src="img/icon.png" class="icon" alt="icon">
                <figcaption class="légende">NAME_USER</figcaption>
                </figure>
                
                <p class="utilisateur">type d'utilisateur</p>
                </div>
    
    
    
    
    


 