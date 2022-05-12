<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
	<?php
session_start();
require('../config.php');
?>

<table class="table-style" >
	<tr style="text-align: left;"><th>id Salles</th><th>Libellé</th><th>heures réservées</th><th>Jour</th></tr>

<?php

$query = "SELECT libelle, id_salle, jour, GROUP_CONCAT(heure) AS conc_heure FROM reservations INNER JOIN salles ON reservations.id_salle = salles.id GROUP BY jour, id_salle";
$result = mysqli_query($conn, $query);


 // Afficher les lignes du tableau en fonction de la réponse à la requête
 if ($result) {
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    	<td>".$row["id_salle"]."</td>
    	<td>".$row["libelle"]."</td>
    	<td>".$row["conc_heure"]."</td>
    	<td>".$row["jour"]."</td>
</td></tr>\n";
   }
  }
 }
  mysqli_close($conn);
?>
</table>
<div class="accueil">
<a href="index.php" style="text-decoration: none"> Accueil </a>
</div>
</body>
</html>
