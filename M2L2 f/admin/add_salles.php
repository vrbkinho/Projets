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
	$libelle = stripslashes($_REQUEST['libelle']);
	$libelle = mysqli_real_escape_string($conn, $libelle); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
    $query = "INSERT into `salles` (libelle)
				  VALUES ('$libelle')";
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>La salle a été créée avec succés.</h3>
             <p>Cliquez <a href='index.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Ajouter une salle</h1>
	<input type="text" class="box-input" name="libelle" placeholder="Libelle de la salle" required />
    <input type="submit" name="submit" value="Ajouter une salle" class="box-button" />
</form>
<?php } ?>
</body>
</html>