<?php 


 // VARIABLES A DEFINIR


// RECUPERATION TRAME



 $content = ''; // CONTENU TOTAL DE LA TRAME
$time = time();





// DECOUPAGE TRAME




$type = ''; // TYPE DU CAPTEUR
$etat = ''; // ETAT DU CAPTEUR
$idMachine = ''; // idMachine DU CAPTEUR
$mesure = ''; // MESURE DU CAPTEUR




// REQUETES

// INSERTION HISTORIQUE
			$sql = "INSERT INTO historique_trame (trame_date, content) VALUES (?, ?)";
			            $bdd->prepare($sql)->execute(
			                [
			                	secure($time),
			                	secure($content),
			                ]);

// MAJ CAPTEUR
            $sql = "UPDATE structure_capteur SET etat=? AND Mesure=? WHERE idMachine =? AND type=?";
            $bdd->prepare($sql)->execute(
                [
                	secure($etat),
                	secure($mesure),
                	secure($idMachine),
                	secure($type),
                ]);

?>
