<?php
session_start();
require('../config.php');
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <div class="sucess">
    <p>Gestion des salles</p>
<body>


<h2>Liste des salles</h2> 
<table class="table-style" >
<tr style="text-align: left;"><th>id Salle</th><th>Libellé</th><th>Actions</th>
<?php
 $query = "SELECT id, libelle FROM salles ";
 $result = mysqli_query($conn, $query);

 // Afficher les lignes du tableau en fonction de la réponse à la requête
 if ($result) {
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
      <td>".$row["id"]."</td>
      <td>".$row["libelle"]."</td>
      <td>";echo '<a href="modifier_salle.php?id='. $row['id'] .'"> Modifier </a>';"</td>
      <td>";echo '<a href="supprimer_salle.php?id='. $row['id'] .'"> Supprimer </a>';"</td>
      </tr>\n";

   }
  }
 }
 
?>
</table> 
</section></body>
</html>
    <a href="../logout.php" style="margin-top: 50px;">Déconnexion</a>
    </ul>
    </div>
  </body>
</html>