<?php
	require_once "variables.php";
	$db=mysqli_connect("$server","$root","$password") or die("Cannot connect to server.");
	mysqli_select_db($db,"$dbms") or die("Cannot select required database.");
?>