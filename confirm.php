<?php
	if(isset($_SESSION['user']))
		header("location:Portals/");
	include("connect.php");

	$id=$_GET['id'];
	$check=$_GET['check'];
	$conf=$_GET['passkey'];
	$table=$_GET['table'];
	$query1="SELECT confirmation FROM `$table` WHERE $id='$check'";
	$query2="UPDATE `$table` SET activated=1 WHERE $id='$check'";
	echo $query1;
	echo $query2;
	$result1=mysqli_query($db,$query1);
	$result=mysqli_fetch_assoc($result1);
	
	if($result['confirmation']==$conf)
	{
		$result1=mysqli_query($db,$query2);
		if($result1)
			echo "Account Activated <a href='index.php'>Login Here</a>";
		else
			echo "Activation error";
	}
	else
		echo "Activation error 1";
?>