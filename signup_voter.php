<?php
	session_start();
	if(isset($_SESSION['user']))
		header("location:Portals/");
	include('connect.php');
	$_SESSION['error']="";
	$result="";

	$usn=$_POST['usn'];
	$password=$_POST['password'];
	$email=$_POST['email'];

	$pass=sha1($password);
	$conf=md5(uniqid(rand()));
	
	$query1="SELECT `USN`, `name`, `email`, `branch`, `section`, `year`, `password`, `confirmation`, `activated`, `voted` FROM `Voter` WHERE USN='$usn'";
	$query2="UPDATE `Voter` SET password='$pass', confirmation='$conf' WHERE USN='$usn'";
	$result1=mysqli_query($db, $query1);
	$prevoter=mysqli_fetch_assoc($result1);
	if($prevoter['USN']=="" || $prevoter['email']=="")
	{
		$_SESSION['error']=$_SESSION['error']."USN or email not registered. Contact concerned authority.";
	}
	else if(strcasecmp($prevoter['USN'],$usn)==0 && strcasecmp($prevoter['email'],$email)==0)
	{
		if(!empty($prevoter['password']) && !empty($prevoter['confirmation']))
		{	
			if($prevoter['activated']==0)
				$_SESSION['error']=$_SESSION['error']."Account already exists but not activated.";
			else
				$_SESSION['error']=$_SESSION['error']."Account already exists and is activated. Login.<br>";
		}
		else
			$result=mysqli_query($db,$query2);
	}
	else
	{		
		$_SESSION['error']=$_SESSION['error']."USN and email mismatch.";
	}
	if($result)
	{
		$message="confirm.php?id=usn&check=$usn&passkey=$conf&table=Voter";
		echo "<a href=\"".$message."\">Confirm your account</a>";	
	}
	else
	{
		$_SESSION['error']=$_SESSION['error'].mysqli_error($db);
		header("location:home.php#userinput");
	}
?>