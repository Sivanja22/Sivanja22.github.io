<!DOCTYPE html>
<html>
<body style="background-image:url(images/back.jpg)">
<link rel="stylesheet" href="wintan.css">
	<form action="alogin.php" method="post">
	<div class="header">
				<ul>
					<li style="float:left;border-right:none"><strong> ADMIN</strong></li>
					<li><a href="http://localhost/Wintan/cover.php">HOME</a></li>
				</ul>
	</div>
	<div class="sucontainer"style="width:30%;background-color:black;margin-left:-25%;">
		<label><b>Username:</b></label><br>
		<input type="text" placeholder="Username" name="uname" required><br>
	
		<label><b>Password:</b></label><br>
		<input type="password" placeholder="Password" name="pass" required><br><br>
		
		<div class="container" style="background-color:grey">
			<button type="submit" name="submit" style="float:right">Log In</button>
		</div>
<?php 
function SignIn() 
{ 
session_start();
 {  
	if($_POST['uname']=='admin' && $_POST['pass']=='admin') 
	{ 
		$_SESSION['userName'] = 'admin'; 
		echo "Logging you in..";
		header( "Refresh:3; url=mainpage.php");
	} 
	else { 
		echo "Wrong Inputs!"; 
		} 
	}
	} 
	if(isset($_POST['submit'])) 
	{ 
		SignIn(); 
	} 
?>
</body>
</html>