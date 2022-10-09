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
<li class="dropdown"><font color="white"  size="10" style="text-shadow: 3px 3px 5px red;">DOCTOR &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></li>
<br>
<h2>


  
    <li>  
	<form method="post" action="mainpage.php">	
	<button type="submit" class="cancelbtn" name="logout" style="font-size:25px;background-color:red;margin-left:100%;width:6cm;"><b>Log Out</b></button>
	</form>
  </li>
	
</ul>
</h2>
<center><h1>VIEW BOOKING</h1><hr>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=dlogin.php"); 
	}
$con = mysqli_connect('localhost','root','','wt_database');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM book order by Username,Fname,DID ASC";
$result = mysqli_query($con,$sql);
echo "<br><h2>TOTAL CLINICS IN DATABASE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>CID</th>
<th>Name</th>
<th>Father Name</th>
<th>Gender</th>
<th>DID</th>
<th>DOV</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['CID'] . "</td>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Fname'] . "</td>";
    echo "<td>" . $row['Gender'] . "</td>";
    echo "<td>" . $row['DID'] . "</td>";
	echo "<td>" . $row['DOV'] . "</td>";
	
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>