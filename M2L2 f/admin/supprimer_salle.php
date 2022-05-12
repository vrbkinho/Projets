<?php
require('../config.php');
	$id=$_GET['id'];
	$result = mysqli_query ($conn, "DELETE FROM salles WHERE id = $id");
	header('location:index.php');

?>