<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
session_start();
require('config.php');
if (isset( $_REQUEST['heure'], $_REQUEST['id_user'],  $_REQUEST['id_salle'], $_REQUEST['jour'])){

	$heure = ($_REQUEST['heure']);
	$id_user = ($_REQUEST['id_user']);
	$id_salle = ($_REQUEST['id_salle']);
	$jour = ($_REQUEST['jour']);
	
	$query = "SELECT * FROM reservations WHERE heure=$heure AND jour=str_to_date('$jour','%Y-%m-%d') AND id_salle=$id_salle";
	$res=mysqli_query($conn, $query);
	if ($res) {
if (mysqli_num_rows($res)>0){
    $message = "Le créneau n'est pas disponible.";
			# code...
}
}
if (mysqli_num_rows($res)==0){
	    $query = "INSERT INTO reservations (heure, id_user, id_salle, jour) VALUES ($heure, $id_user, $id_salle, str_to_date('$jour','%Y-%m-%d')) ";
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>La réservation a été créée avec succés.</h3>
             <p>Cliquez <a href='index.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
}}}
	?>
<form class="box" action="" method="post">
    <h1 class="box-title">Réservation</h1>
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
<input type="hidden" name="id_user" value=<?php echo $_SESSION['id']?>>
<select name="id_salle" class="box-input">
<option value="1">Salle de réunion 1</option>
<option value="2">Salle de réunion 2</option>
</select>
<?php $jour=date('Y-m-d');  ?>
     <input type="date"  name="jour" class="box-input" value=<?php echo "$jour" ?>>
<input type="submit" name="submit" class="box-button" value="Réservez maintenant!">
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
    <?php } ?>
</form>
</body>
</html>