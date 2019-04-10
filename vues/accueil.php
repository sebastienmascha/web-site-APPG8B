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
            <?php foreach ($element['machines'] as $machine) { ?>
                <div class="boite">

                    <div class="cafetiere-header">
                        <?php echo $machine['id']; ?>
                    </div>

                    <div style="text-align: center;">
                        <button>
                            CAFE INSTANTANNE
                        </button>
                    </div>

                    <table class="Recap" width=100%>
                        <tr>
                            <th> Etat machine :</th>
                            <td><?php echo $machine['isDispo']; ?></td>
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
                            <td> 52 </td>
                        </tr>

                    </table>
                </div>
            <?php } ?>



        </div>
    </div>

<?php } ?>