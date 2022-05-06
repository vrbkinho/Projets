<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['libelle'], $_REQUEST['description'])){

	$libelle = ($_REQUEST['libelle']);

	$description = ($_REQUEST['description']);
	
    $query = "INSERT into `tache` (libelle, description)
				  VALUES ('$libelle', '$description')";
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>La tâche a été créée avec succés.</h3>
             <p>Cliquez <a href='index.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
	<h1 class="box-logo box-title"><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1>
    <h1 class="box-title">Add taches</h1>
	<input type="text" class="box-input" name="libelle" placeholder="Libelle de la tache" required />
    <input type="text" class="box-input" name="description" placeholder="Description de la tache" required />
    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
<?php } ?>
</body>
</html>