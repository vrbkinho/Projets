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
    $Etat=$_REQUEST['Etat'];
    $Raison=$_REQUEST['Raison'];
    $id=$_GET['id'];
    $query = "UPDATE tache
SET Etat = '$Etat',
  Raison = '$Raison'
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
    <label>Etat de la tâche</label>
                            <SELECT name="Etat" class="box-input">
                                
        <OPTION>Non assignee
        <OPTION>En cours de réalisation
        <OPTION>En attente
        <OPTION>Terminée
        </SELECT>
        <label>Si la tâche est en attente, indiquez pourquoi:</label>
        <input type="text" name="Raison" class="box-input">
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <input type="submit" name="submit" value="Modifier une tâche" class="box-button" />
</form>
<?php } ?>
</body>
</html>