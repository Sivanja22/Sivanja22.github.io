<html>
<head>
	<link rel="stylesheet" href="wintan.css">
</head>
<body style="background-image:url(images/signup3.jpg)">
<div class="header">
				<ul>
					<li style="float:left;border-right:none"><a href="cover.php" class="logo"><img src="images/WH2.png" width="70px" height="70px"><strong>Wintan </strong>Appointment Making System</a></li>
					<li><a href="locateus.php">Locate Us</a></li>
					<li><a href="cover.php">Home</a></li>
				</ul>
</div>

<div class="footer">
				<ul style="position:absolute;top:85%;width:100%;background-color:black">
					<p style="color:yellow;font-size:40px;"><marquee>Welcome to Our Online Appointment Booking System</marquee></p><br>
				</ul>
			</div>


<form action="signup.php" method="post">

	<div class="sucontainer"style="margin-top:3%; background-color:#028379;">
		
		<input type="text" placeholder="Enter Full Name" name="fname" required><br>
	
		
		<input type="date" name="dob" required><br><br>
	
	
		<input type="radio" name="gender" value="female" required>Female
		<input type="radio" name="gender" value="male" required>Male
		<input type="radio" name="gender" value="other" required>Other<br><br>
		
		
		<input type="number" placeholder="Contact Number" name="contact" required><br>
		
		
		<input type="text" placeholder="Create Username" name="username" required><br>
		
		
		<input type="email" placeholder="Enter Email" name="email" required><br>

		
		<input type="password" placeholder="Enter Password" name="pwd" id="p1" required><br>

		
		<input type="password" placeholder="Repeat Password" name="pwdr" id="p2" required><br>
		

		
		<div class="container" style="background-color:black; height:50px;">
			
			<button type="submit" name="signup" style="margin-left:180px; background-color:green;">Sign Up</button>
		</div>
		
  </div>
  
  
  
<?php

function newUser()
{
		include 'dbconfig.php';
		$name=$_POST['fname'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['pwd'];
		$prepeat=$_POST['pwdr'];
		$sql = "INSERT INTO Patient (Name, Gender, DOB,Contact,Email,Username,Password) VALUES ('$name','$gender','$dob','$contact','$email','$username','$password') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to login page....</h2>";
		header( "Refresh:3; url=cover.php");

	} 
	else
	{
		echo "<h2>Please Fill all fields </h2>";
		
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkusername()
{
	include 'dbconfig.php';
	$usn=$_POST['username'];
	$sql= "SELECT * FROM Patient WHERE Username = '$username'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
		{
			echo"<b><br>Username already exists!!";
		}
		else if($_POST['pwd']!=$_POST['pwdr'])
		{
			echo"Passwords dont match";
		}
		else if(isset($_POST['signup']))
		{ 
			newUser();
		}

	
}
if(isset($_POST['signup']))
{
	if(!empty($_POST['username']) && !empty($_POST['pwd']) &&!empty($_POST['fname']) &&!empty($_POST['dob'])&& !empty($_POST['gender']) &&!empty($_POST['email']) && !empty($_POST['contact']))
			checkusername();
}
?>

</form>
</body>
</html>