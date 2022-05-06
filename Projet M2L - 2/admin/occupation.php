<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
	<form class="box" action="" method="post">
    <h1 class="box-title">Choisissez une salle</h1>
<select name="id_salle" class="box-input">
<option value="1">Salle de réunion 1</option>
<option value="2">Salle de réunion 2</option>
</select>
<input type="submit" name="submit" class="box-button" value="Afficher les réservations">
</form>
	<table class="table-style" >
	<tr style="text-align: left;"><th>Libellé</th><th>Jour</th><th>Heures réservées</th></tr>
	<?php
session_start();
require('../config.php');
if (isset($_REQUEST['id_salle'])){
$id_salle = ($_REQUEST['id_salle']);
$query="SELECT libelle, id_salle, str_to_date(jour,'%Y-%m-%d'), heure FROM reservations INNER JOIN salles ON reservations.id_salle = salles.id WHERE str_to_date(jour,'%Y-%m-%d') BETWEEN NOW()-INTERVAL 1 day AND NOW()+INTERVAL 8 DAY AND id_salle=$id_salle ORDER by str_to_date(jour,'%Y-%m-%d') AND heure;";

$result = mysqli_query($conn, $query);


 // Afficher les lignes du tableau en fonction de la réponse à la requête
 if ($result) {                                                                                                                                                                
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    	<td>".$row["libelle"]."</td>
    	<td>".$row["str_to_date(jour,'%Y-%m-%d')"]."</td>
    	<td>".$row["heure"]."</td>
</td></tr>\n";
   }
  }
 }
}
?>
</table>
<div class="sucess">
    <a href="index.php">Accueil</a>
    </div>
</body>
</html>