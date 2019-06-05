<?php

/**
 * Liste des fonctions spécifiques à la recuperation des trames de transmission
 */


function getTrameTransmission()
{
    $ch = curl_init();

    curl_setopt(

        $ch,

        CURLOPT_URL,

        "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=008B"
    );

    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $data = curl_exec($ch);

    curl_close($ch);

    echo "Raw Data:<br />";

    echo ("$data");
}
