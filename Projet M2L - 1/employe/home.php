<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: ../login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?> !</h1>
    <p>C'est votre espace employé.</p>
<body>


<h2>Liste tâches</h2> 
<table class="table-style" >
<tr style="text-align: left;"><th>id Tache</th><th>Libellé</th><th>Description</th><th>Etat</th><th>Priorité</th><th>Action</th></tr>
<?php
$id= $_SESSION['id'];
require('../config.php');
 $query = "SELECT tache.id, libelle, description, etat, priorite FROM tache INNER JOIN users ON tache.idemploye = users.id where idemploye=$id";
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
      <td>";echo '<a href="modifier_taches.php?id='. $row['id'] .'"> Modifier </a>';"</td></tr>\n";
   }
  }
 }
 
 // Fermer la connexion
 mysqli_close($conn);
?>
</table> 
</section></body>
</html>
    <a href="../logout.php" style="margin-top: 50px;">Déconnexion</a>
    </ul>
    </div>
  </body>
</html>