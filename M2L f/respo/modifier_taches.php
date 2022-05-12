<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
session_start();
require('../config.php');
if (isset($_REQUEST['submit'])){
    $Priorite=$_REQUEST['Priorite'];
    $idemploye=$_REQUEST['idemploye'];
    $id=$_GET['id'];
    $query = "UPDATE tache
SET Priorite = '$Priorite',
  idemploye = '$idemploye'
WHERE id = '$id'";
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>La tâche a été modifiée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
             </div>";
    }
}else{
?>
<form class="box" action="" method="post">
<h1 class="box-title">Modifier une tâche</h1>
<p class="box-title">Niveau de priorité</p>
<SELECT name="Priorite" class="box-input" >
        <OPTION>1
        <OPTION>2   
        <OPTION>3
        </SELECT>
<input type="number" name="idemploye" class="box-input" placeholder="Numéro de l'employé">
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <input type="submit" name="submit" value="Modifier une tâche" class="box-button" >
</form>
<div style="text-align: center; margin-top: 50px;">
    <h2>Liste des employés</h2>   
<table class="table-style" >
    <tr style="text-align: left;"><th>id </th> <th>Username</th></tr>
    <?php
 $query = "SELECT id, username FROM users WHERE type='employe' ";
 $result = mysqli_query($conn, $query);

 // Afficher les lignes du tableau en fonction de la réponse à la requête
 if ($result) {
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["username"]."</td>";
   }
  }
 }
?>
<?php } ?>
</table>
</body>
</html>