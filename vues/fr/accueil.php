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
                        <?php echo $machine['name']; ?>
                    </div>

                    <div style="text-align: center;">
                        <?php if ($machine['isDispo'] == 1 ) : ?>
                            <a href="index.php?cible=ajax&fonction=postCafe&idMachine=<?= $machine['id']; ?>&etatMachine=<?= $machine['isDispo']; ?>">
                                <button type="submit" onclick="postCafe();">
                                    CAFE INSTANTANNE
                                </button>
                            </a>
                        <?php endif; ?>
                        <?php if ($machine['isDispo'] == 0 ) : ?>
                            <a href="index.php?cible=ajax&fonction=postCafe&idMachine=<?= $machine['id']; ?>&etatMachine=<?= $machine['isDispo']; ?>">
                                <button type="submit" style="background-color: red;">
                                    ARRETER
                                </button>
                            </a>
                        <?php endif; ?>

                    </div>

                    <table class="Recap" width=100%>
                        <tr>
                            <th> Etat machine :</th>
                            <td><?php

                                if ($machine['etat'] == 1) {
                                    echo 'Fonctionnelle';
                                } else {
                                    echo 'Non Fonctionnelle';
                                }
                                ?></td>
                        </tr>

                        <tr>
                            <th> Temps utilisation : </th>
                            <td> <?php echo $machine['tempsUtilisation']; ?> </td>
                        </tr>

                        <tr>
                            <th> Machine en marche : </th>
                            <td>
                                <?php

                                if ($machine['isDispo'] == 1) {
                                    echo 'Disponible';
                                } else {
                                    echo 'Non Disponible';
                                }

                                ?>
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

    <script>
        function postCafe() {
            alert('e');
    </script>

<?php } ?>