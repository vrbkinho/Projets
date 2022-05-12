<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
session_start();
require('../config.php');
if (isset($_REQUEST['libelle'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$libelle = ($_REQUEST['libelle']);
	$id=$_GET['id'];
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
    $query = "UPDATE salles
SET libelle = libelle WHERE id=$id";
    $res = mysqli_query($conn, $query);
      if($res){
       echo "<div class='sucess'>
             <h3>La salle a été modifiée avec succés.</h3>
             <p>Cliquez <a href='index.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Modifier une salle</h1>
	<input type="text" class="box-input" name="libelle" placeholder="Nouveau nom de salle" required />
    <input type="submit" name="submit" value="Modifier une salle" class="box-button" />
</form>
<?php } ?>
</body>
</html>