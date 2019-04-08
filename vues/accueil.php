<?php
/**
 * Vue : accueil
 */
?>

<style>
    <?php include "css/css_accueil.css";
    ?>
</style>

<?php foreach ($maisons as $element) { ?>



    <div class="boitePrincipale">
        <div id="accueil-header">
            <?php echo $element['nom']; ?>
            <?php echo $element['location']; ?>
        </div>

        <div class="flex-container">
            <div class="boite">

                <div class="cafetiere-header">
                    <p>Cafetière n°1 </p>
                </div>

                <div style="text-align: center;">
                    <button>
                        CAFE INSTANTANNE
                    </button>
                </div>

                <table class="Recap" width=100%>
                    <tr>
                        <th> Etat machine :</th>
                        <td> OK </td>
                    </tr>

                    <tr>
                        <th> Temps utilisation : </th>
                        <td> 2h30 </td>
                    </tr>

                    <tr>
                        <th> Machine en marche : </th>
                        <td>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <th> Capsules Restantes : </th>
                        <td> 52 
                            <button class="recharger" onclick="document.location.href='index.php?cible=utilisateurs&fonction=stock';" >
                                Recharger                           
                            </button>
                        </td>
                    </tr>

                </table>
            </div>

            <div class="boite">

                <div class="cafetiere-header">
                    <p>Cafetière n°2 </p>
                </div>

                <div style="text-align: center;">
                    <button>
                        CAFE INSTANTANNE
                    </button>
                </div>

                <table class="Recap" width=100%>
                    <tr>
                        <th> Etat machine :</th>
                        <td> OK </td>
                    </tr>

                    <tr>
                        <th> Temps utilisation : </th>
                        <td> 1h15 </td>
                    </tr>

                    <tr>
                        <th> Machine en marche : </th>
                        <td>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <th> Capsules Restantes : </th>
                        <td> 101 
                            <button class="recharger" onclick="document.location.href='index.php?cible=utilisateurs&fonction=stock';" >
                                Recharger
                            </button>
                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

<?php } ?>