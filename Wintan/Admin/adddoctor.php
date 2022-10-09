<html>
<head>
<link rel="stylesheet" href="adminwintan.css"> 
</head>
<body background= "doctordesk.jpg">
<ul>
<li class="dropdown"><font color="white"  size="10" style="text-shadow: 3px 3px 5px red;">ADMIN &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></li>
<br>
<h2>

<li class="dropdown">
  <a href="javascript:void(0)" class="dropbtn">CLINIC</a>
    <div class="dropdown-content">
      <a href="addclinic.php">Create Clinic</a>
      <a href="deleteclinic.php">Delete Clinic</a>
      <a href="adddoctorclinic.php">Add Doctor in Clinic</a>
	  <a href="addmanagerclinic.php">Add Manager in Clinic</a>
	  <a href="deletedoctorclinic.php">Delete Doctor in Clinic</a>
	  <a href="deletemanagerclinic.php">Delete Manager in Clinic</a>
	  <a href="showclinic.php">Show Clinic</a>
    </div>
  </li>

  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">DOCTOR</a>
    <div class="dropdown-content">
      <a href="adddoctor.php">Create Doctor</a>
      <a href="deletedoctor.php">Delete Doctor</a>
      <a href="showdoctor.php">Show Doctor</a>
	  <a href="showdoctorschedule.php">Show Doctor Schedule</a>
    </div>
  </li>
  
  
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">MANAGER</a>
    <div class="dropdown-content">
      <a href="addmanager.php">Create Manager</a>
      <a href="deletemanager.php">Delete Manager</a>
	  <a href="showmanager.php">Show Manager</a>
    </div>
  </li>
  
    <li>  
	<form method="post" action="mainpage.php">	
	<button type="submit" class="cancelbtn" name="logout" style="font-size:25px;background-color:red;margin-left:100%;width:6cm;"><b>Log Out</b></button>
	</form>
  </li>
	
</ul>
</h2>
<center><h1>CREATE DOCTOR</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<div class="columnA">
  DID:<input type="number" name="did" required>
  <br>
  Name: <input type="text" name="name" required>
  <br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <br>
  <br>
  DOB: <input type="date" name="dob" required >
  <br>
  Experience: <input type ="number" name="experience" required>
  <br>
  Specialization:<input type="text" name="specialization" required>
  <br>
  
  
  </div>
  <div class="columnB">
  Contact no.: <input type="number" name="contact" maxlength="10" minlength="10" required>
  <br>
  Address: <input type="text" name="address" required style="height:100px;">
  <br>
  Username: <input type="text" name="username" required>
  <br>
  Password: <input type="password" name="pwd" required>
  <br>
  Region: <input type="text" name="region" required>
  <br>
  
  </div>
  <br><br><br><br>
  <button type="submit" name="Submit">CREATE</button>
</form>
</font></b>
</center>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
function newUser()
{
	include 'dbconfig.php';
		$did=$_POST['did'];
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$experience=$_POST['experience'];
		$specialization=$_POST['specialization'];
		$contact=$_POST['contact'];
		$address=$_POST['address'];
		$username=$_POST['username'];
		$password=$_POST['pwd'];
		$region=$_POST['region'];
		$sql = "INSERT INTO doctor (DID, Name, Gender, DOB, Experience, Specialization, Contact,Address,Username,Password,Region) VALUES ('$did','$name','$gender','$dob','$experience','$specialization','$contact','$address','$username','$password','$region') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>DATA ADDED successfully!.....</h2>";
		header( "Refresh:3; url=adddoctor.php");

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkdid()
{
	include 'dbconfig.php';
	$did=$_POST['did'];
	$sql= "SELECT * FROM doctor WHERE DID = '$did'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
       {
			echo"<b><br>DID already exists!!";
       }
	else 
		if(isset($_POST['Submit']))
	{ 
		newUser();
	}

	
}
function checkusername()
{
	include 'dbconfig.php';
	$usn=$_POST['username'];
	$sql= "SELECT * FROM doctor WHERE Username = '$usn'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
       {
			echo"<b><br>Username already ADDED!";
       }
	else 
		if(isset($_POST['Submit']))
	{ 
		checkdid();
	}

	
}
if(isset($_POST['Submit']))
{
	if(!empty($_POST['did']) && !empty($_POST['username']) && !empty($_POST['pwd'])&& !empty($_POST['region']) &&!empty($_POST['experience']) &&!empty($_POST['specialization']) &&!empty($_POST['name']) &&!empty($_POST['dob'])&& !empty($_POST['gender']) &&!empty($_POST['address']) && !empty($_POST['contact']))
		checkusername();
	else
		echo "EMPTY DATA NOT ALLOWED";
}

?>

</body>
</html>