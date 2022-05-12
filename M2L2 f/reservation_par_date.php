<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
session_start();
require('config.php');
?>
<form class="box" method="post">
    <h1 class="box-title">Indiquez le créneau voulu</h1>
    <select name="heure" class="box-input" >
  <option value="8">8h-9h</option>
  <option value="9">9h-10h</option>
  <option value="10">10h-11h</option>
  <option value="11">11h-12h</option>
  <option value="12">12h-13h</option>
  <option value="13">13h-14h</option>
  <option value="14">14h-15h</option>
  <option value="15">15h-16h</option>
  <option value="16">16h-17h</option>
  <option value="17">17h-18h</option>
  <option value="18">18h-19h</option>
  <option value="19">19h-20h</option>
</select> <br>
</select>
<?php $jour=date('Y-m-d');  ?>
     <input type="date"  name="jour" class="box-input" value=<?php echo "$jour" ?>>
<input type="submit" name="submit" class="box-button" value="Découvrez les salles disponibles">


<table class="table-style" style="margin-top: 30px;" >
<tr style="text-align: left;"><th>Numéro</th><th>Salle disponible</th></tr>

<?php
if (isset( $_REQUEST['heure'], $_REQUEST['jour'])){
  

  $heure = ($_REQUEST['heure']);
  $jour = ($_REQUEST['jour']);

   $query = "SELECT DISTINCT libelle, salles.id FROM salles INNER JOIN reservations ON salles.id=reservations.id_salle WHERE id_salle not in( select id_salle from reservations WHERE jour='$jour' AND heure='$heure')";
     $result = mysqli_query($conn, $query);

 // Afficher les lignes du tableau en fonction de la réponse à la requête
 if ($result) {
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
      <td>".$row["id"]."</td>
      <td>".$row["libelle"]."</td></tr>\n"
      ;
   }
  }
 }
}

 ?> 

 </table>
<div class="accueil">
<a href="reservation.php" style="text-decoration: none; font-size: 30px;"> Réservez maintenant ! </a>
 </form>