<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="adminwintan.css"> 
<style>
table{
    width: 85%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 5px;
	font-size: 20px;
	margin-top:5%;
	text-align:center;
}

th{
border: 5px solid gray;
	background-color: white;
    color: black;
	text-align: center;
}
tr,td{
	border: 5px solid gray;
	background-color: black;
    color: white;
}
</style>

</head>
<body background= "clinicview.jpg">
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
<center><h1>VIEW CLINIC</h1><hr>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
$con = mysqli_connect('localhost','root','','wt_database');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM clinic order by City,Town,CID ASC";
$result = mysqli_query($con,$sql);
echo "<br><h2>TOTAL CLINICS IN DATABASE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>CID</th>
<th>Name</th>
<th>Address</th>
<th>Town</th>
<th>City</th>
<th>Contact</th>
<th>MID</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['cid'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['town'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
	echo "<td>" . $row['contact'] . "</td>";
	echo "<td>" . $row['mid'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>