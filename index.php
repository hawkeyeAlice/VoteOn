<?php
	session_start();
	if(isset($_SESSION['user']))
		header("location:Portals/");
	if(isset($_SESSION['error']))
	{	echo $_SESSION['error'];
		$_SESSION['error']="";
	}
?>
<html>
<head>
	<title>VoteOn</title>
</head>
<body>
	Signup:
	<br />
	Admin:
	<form action="signup_admin.php" method="POST">
		Staff id: <input type="textbox" name="staffid">
		Email: <input type="textbox" name="email" />
		Password: <input type="password" name="password1" />
		Repeat Password: <input type="password" name="password2" />
		<input type="submit" value="Sign up" />
	</form>
	Voter
	<form action="signup_voter.php" method="POST">
		USN: <input type="textbox" name="usn">
		Email: <input type="textbox" name="email" />
		Password: <input type="password" name="password1" />
		Repeat Password: <input type="password" name="password2" />
		<input type="submit" value="Sign up" />
	</form>
	<br><br>
	Login:<br>
	Admin:
	<form action="login_admin.php" method="POST">
		Email: <input type="textbox" name="email" />
		Password: <input type="password" name="password" />
		<input type="submit" value="Login" />
	</form>
	Voter:
	<form action="login_voter.php" method="POST"> 
		USN: <input type="textbox" name="usn" />
		Password: <input type="password" name="password" />
		<input type="submit" value="Login" />
	</form>
</body>
</html>