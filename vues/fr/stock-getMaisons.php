<?php

$q = $_GET["q"];
$maisons = $_GET["maisons"];

echo '-----ok----';
echo $maisons[$q]['nom'];
echo '-----ha----';

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mvc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM structure_maison 
INNER JOIN users_homes ON structure_maison.id = users_homes.idMaison 
WHERE users_homes.idUser =2";

$result = mysqli_query($conn, $sql);


echo "<ul >";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li><a>" . $row['id'] . "</a></li>";
        echo "<li><a>" . $row['idFoyer'] . "</a></li>";
        echo "<li><a>" . $row['nom'] . "</a></li>";
        echo "<li><a>" . $row['location'] . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
