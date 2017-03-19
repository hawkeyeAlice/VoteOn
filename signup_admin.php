<?php
	session_start();
	if(isset($_SESSION['user']))
		header("location:Portals/");
	include('connect.php');
	$_SESSION['error']="";
	$result="";

	$staffid=$_POST["staffid"];
	$email=$_POST["email"];
	$password=$_POST["password1"];

	$pass=sha1($password);
	$conf=md5(uniqid(rand()));
	
	$query1="SELECT staffid, email, password,confirmation, activated from Admin where staffid=$staffid";
	$query2="UPDATE `Admin` SET password='$pass', confirmation='$conf' WHERE staffid='$staffid'";

	$preadmin=mysqli_fetch_assoc(mysqli_query($db, $query1));
	
	if($preadmin['staffid']==$staffid && $preadmin['email']==$email)
	{
		if(!empty($preadmin['password']) && !empty($preadmin['confirmation']))
		{	
			if($preadmin['activated']==0)
				$_SESSION['error']=$_SESSION['error']."Account already exists but not activated.";
			else
				$_SESSION['error']=$_SESSION['error']."Account already exists and is activated. Login.<br>";
		}
		else
			$result=mysqli_query($db,$query2);
	}
	else
	{		
		$_SESSION['error']=$_SESSION['error']."Staff id and email mismatch.";
	}
	if($result)
	{
		$message="confirm.php?passkey=$conf&staffid=$staffid";
		echo "<a href=\"".$message."\">Confirm your account</a>";	
	}
	else
	{
		$_SESSION['error']=$_SESSION['error'].mysqli_error($db);
		header("location:index.php");
	}
?>