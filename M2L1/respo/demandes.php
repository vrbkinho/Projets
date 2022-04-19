<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>

<div class="ltachecontainer">
  <h2>Liste des tâches</h2> 
</div>

<table class="table-style" >
<tr style="text-align: left;"><th>id Tache</th><th>Libellé</th><th>Description</th><th>Etat</th><th>Priorité</th><th>Employé</th><th>Action</th></tr>
<?php
require('../config.php');
 $query = "SELECT tache.id, libelle, description, etat, priorite, username FROM tache INNER JOIN users ON tache.idemploye = users.id";
 $result = mysqli_query($conn, $query);

 // Afficher les lignes du tableau en fonction de la réponse à la requête
 if ($result) {
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    	<td>".$row["id"]."</td>
    	<td>".$row["libelle"]."</td>
    	<td>".$row["description"]."</td>
    	<td>".$row["etat"]."</td>
    	<td>".$row["priorite"]."</td>
      <td>".$row["username"]."</td>
    	<td>";echo '<a href="modifier_taches.php?id='. $row['id'] .'"> Modifier </a>';"</td></tr>\n";
   }
  }
 }
 
 // Fermer la connexion
 mysqli_close($conn);
?>
</table>
<div class="accueil">
<a href="home.php" style="text-decoration: none"> Accueil </a>
</div>
</body>
</html>