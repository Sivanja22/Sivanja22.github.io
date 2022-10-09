<!DOCTYPE html>
<html>
<body style="background-image:url(images/back.jpg)">
<link rel="stylesheet" href="wintan.css">
	<form action="dlogin.php" method="post">
	<div class="header">
				<ul>
					<li style="float:left;border-right:none"><strong> Doctor </strong></li>
					<li><a href="http://localhost/Wintan/cover.php">Home</a></li>
				</ul>
	</div>
	<div class="sucontainer" style="width:30%;background-color:black;margin-left:-25%;">
		<label><b>Username:</b></label><br>
		<input type="text" placeholder="Enter Username" name="uname" required><br>
	
		<label><b>Password:</b></label><br>
		<input type="password" placeholder="Enter Password" name="pass" required><br><br>
		
		<div class="container" style="background-color:grey">
			<button type="submit" name="submit" style="float:right">Log In</button>
		</div>
<?php 
function SignIn() 
{ 
include 'dbconfig.php';

session_start();
if(!empty($_POST['uname']))  
{ 
	$query = mysqli_query($conn,"SELECT * FROM doctor where username = '$_POST[uname]' AND password = '$_POST[pass]'");
	$row = mysqli_fetch_array($query);
	if(!empty($row['username']) AND !empty($row['password'])) 
	{ 
		$_SESSION['username'] = $row['password']; 
		echo "Logging you in..";
		header( "Refresh:3; url=dMain.php");
	} 
	else 
	{ 
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