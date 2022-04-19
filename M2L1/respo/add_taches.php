<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
require('../config.php');
if (isset($_REQUEST['libelle'], $_REQUEST['description'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$libelle = stripslashes($_REQUEST['libelle']);
	$libelle = mysqli_real_escape_string($conn, $libelle); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$description = stripslashes($_REQUEST['description']);
	$description = mysqli_real_escape_string($conn, $description);
	
    $query = "INSERT into `tache` (libelle, description)
				  VALUES ('$libelle', '$description')";
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>La tâche a été créée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Ajouter une tâche</h1>
	<input type="text" class="box-input" name="libelle" placeholder="Libelle de la tache" required />
    <input type="text" class="box-input" name="description" placeholder="Description de la tache" required />
    <input type="submit" name="submit" value="Ajouter une tâche" class="box-button" />
</form>
<?php } ?>
</body>
</html>