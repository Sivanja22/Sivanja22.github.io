<html>
<head>
<link rel="stylesheet" href="adminwintan.css"> 
</head>
<body style="background-image:url(images/manager.jpg)">

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
	  <a href="dMain.php">Show Booking</a>
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
<p>
			
<center><h1 style="text-shadow: 3px 3px 15px green;margin-left:-40%;margin-top:8%;font-size:80px;">WELCOME</h1> </center>


<?php
session_start();	
	if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=../cover.php"); 
	}
?>
</body>
</html>