<?php

/**
 * Liste des fonctions spécifiques à la recuperation des trames de transmission
 */

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=008B");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data,33);
$size=count($data_tab);
for($i=$size-5;$i<$size-1;$i++){
    // RECUPERATION TRAME
    //echo "<br />Trame $i: $data_tab[$i]<br />";
	$trame =array_str($data_tab[$i]);
    $content = array_str($data_tab[$i]); // CONTENU TOTAL DE LA TRAME
    $time = "$trame[25]$trame[26]/$trame[23]$trame[24]/$trame[19]$trame[20]$trame[21]$trame[22]  $trame[27]$trame[28]:$trame[29]$trame[30]:$trame[31]$trame[32]";
	$etat = 1; // ETAT DU CAPTEUR
    $idMachine = 1; // idMachine DU CAPTEUR

    
	if ($trame[6]==2) {
        $decimal1=intval($trame[11]);
        $decimal2=intval($trame[12]);
        $temp = $decimal1*16 + $decimal2;

        $type = 1; // TYPE DU CAPTEUR
        $mesure = $temp; // MESURE DU CAPTEUR
		//echo "Temperature<br/>";
		
        //echo "La temperature est de :";
        //echo $temp;
		if ("$trame[11]$trame[12]">"14") {
			//echo "chaud";
		}
		elseif ("$trame[11]$trame[12]">"10") {
			//echo "bof";
		}
		else{
			//echo "froid";
		}
		//echo "  $trame[25]$trame[26]/$trame[23]$trame[24]/$trame[19]$trame[20]$trame[21]$trame[22]  $trame[27]$trame[28]:$trame[29]$trame[30]:$trame[31]$trame[32]";
        //echo "<br/>";
        // MAJ CAPTEUR
        $sql = "UPDATE structure_capteur SET etat=?, Mesure=? WHERE (idMachine =? AND type=?)";
        $bdd->prepare($sql)->execute(
        [
            secure($etat),
            secure($mesure),
            secure($idMachine),
            secure($type)
        ]);
	}
	elseif ($trame[6]==1) {
        $type = 2; // TYPE DU CAPTEUR
		//echo "Distance<br/>";
		if("$trame[12]"=="E"){
            $isDispo = 1; // MESURE DU CAPTEUR
			//echo "tasse";
		}
		else{
            $isDispo = 0; // MESURE DU CAPTEUR
			//echo "pas de tasse";
		}
		//echo "  $trame[25]$trame[26]/$trame[23]$trame[24]/$trame[19]$trame[20]$trame[21]$trame[22]  $trame[27]$trame[28]:$trame[29]$trame[30]:$trame[31]$trame[32]";
        //echo "<br/>";
        // MAJ CAPTEUR
        $sql = "UPDATE structure_machine SET etat=?, isDispo=? WHERE (id =?)";
        $bdd->prepare($sql)->execute(
        [
            secure($etat),
            secure($isDispo),
            secure($idMachine)
        ]);
        }

    // REQUETES
    // INSERTION HISTORIQUE
                $sql = "INSERT INTO historique_trame (trame_date, content) VALUES (?, ?)";
                            $bdd->prepare($sql)->execute(
                                [
                                    secure("0"),
                                    secure("0")
                                ]);

    /// END SQL
}


function array_str($str) {
  $newstr = '';
  for($i = 0; $i < strlen($str); $i++) {
    $newstr .= substr($str, $i, 1);
  }
  return $newstr;
}

