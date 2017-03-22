<?php
	session_start();
	if(isset($_SESSION['user']))
		header("location:Portals/");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="styles/master.css">
	<link href='http://fonts.googleapis.com/css?family=Signika+Negative' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
	<!--	
		function inputbox(dom)
		{
			dom.value="";
		}
		function change(type)
		{
			var loginhtml="<label id=\"usnlabel\" for=\"usn\">USN</label><br><input id=\"usn\" type=\"textbox\"name=\"usn\" /><label id=\"passlabel\" for=\"password\">PASSWORD</label><br><input id=\"pass\" type=\"password\" name=\"password\"/>";
			var signuphtml="<label id=\"passlabel1\" for=\"password\">RE-ENTER PASSWORD</label><br><input id=\"pass1\" type=\"password\" name=\"password1\"/><label id=\"emaillabel\" for=\"email\">EMAIL</label><br><input id=\"email\" type=\"textbox\" name=\"email\" />";
			dom=document.getElementById("input-container");
			if(type=='login')
			{
				login=document.getElementById("loginform");
				login.style.backgroundColor="#110b15";
				login.style.color="#e9d5bb";
				signup=document.getElementById("signupform");
				signup.style.backgroundColor="#e9d5bb";
				signup.style.color="#110b15";
				dom.innerHTML=loginhtml;
				document.getElementById("submitbtn").innerHTML="Login";
				document.getElementById("submitbtn1").style.bottom="30%";
			}
			else if(type=='signup')
			{
				signup=document.getElementById("signupform");
				signup.style.backgroundColor="#110b15";
				signup.style.color="#e9d5bb";
				login=document.getElementById("loginform");
				login.style.backgroundColor="#e9d5bb";
				login.style.color="#110b15";
				dom.innerHTML=loginhtml+signuphtml;
				document.getElementById("submitbtn").innerHTML="Sign Up";
				document.getElementById("submitbtn1").style.bottom="5%";
			}
		}
		function authenticate()
		{
			dom1=document.getElementById("pass");
			dom2=document.getElementById("pass1");
			dom3=document.getElementById("submitbtn");
			dom4=document.getElementById("usn");
			
			if(dom3.innerHTML=='Login')
				type='login';
			else if(dom3.innerHTML=='Sign Up')
				type='signup';
			
			if(type=='login' && (dom1.value=="" || dom4.value==""))
			{	
				alert("Enter all fields");
			}
			else if(type=='signup' && (dom2.value=="" || dom4.value=="" || dom1.value==""))
			{
				alert("Enter all fields");
			}
			else if(type=='signup' && dom1.value != dom2.value)
			{
				alert("Passwords dont match");	
			}
			else
			{
				document.getElementById("forminp").action="signup_voter.php";
			}
		}
	//-->
	</script>
</head>
<body>
	<div class="page-container" id="firstpage">
		<div id="top-bar">
			<a href="#firstpage"><div class="menubaritems" id="voteon">Vote On</div></a>
			<a href="#aboutpage"><div class="menubaritems" id="about">About</div></a>
			<a href="#userinput"><div class="menubaritems" id="signup" onclick=change('signup')>Signup</div></a>
			<a href="#userinput"><div class="menubaritems" id="login" onclick=change('login')>Login</div></a>
		</div>
	</div>
	<div class="page-container" id="userinput">
		
		<div class="input" id="">
			<div class="inputformhead" id="loginform" onclick="change('login')">Login</div>
			<div class="inputformhead" id="signupform" onclick="change('signup')">Sign Up</div>
			<span id="error">
			<?
				if(isset($_SESSION['error']))
				{	echo $_SESSION['error'];
					$_SESSION['error']="";
				}
			?>
			</span>
			<form action="" method="post" id="forminp">
				<div id="input-container">
					<label id="usnlabel" for="usn">USN</label><br>
					<input id="usn" type="textbox" name="usn" />
					<label id="passlabel" for="password">PASSWORD</label><br>
					<input id="pass" type="password" name="password"/>
				</div>
				<div class="submit" id="submitbtn1">
					<button id="submitbtn" type="submit" onclick="authenticate()">Login</button>
				</div>
			</form>
		</div>
	
	</div>
	<div class="page-container" id="aboutpage">
		VoteOn is an online voting and polling portal. Voting being a collective decision to choose a leader under principles such as independence, integrity, transparency, competence, fairness and political privacy.
		We aim to conduct the class representative election based on this online platform. This online voting interface has two types of users: System Admins and students.
		On the day of voting, the students are authenticated via email and their respective USN. After the verification procedure is done, he/she can vote for the candidate of his/her choice.
		Once the deadline is reached, the counting algorithm is automatically run and the winner is declared.
		
	</div>
</body>
</html>
