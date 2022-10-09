<html>
<head>
<script src="jquerypart.js" type="text/javascript"></script>
<link rel="stylesheet" href="adminwintan.css"> 
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "getclinic.php",
	data:'city='+val,
	success: function(data){
		$("#clinic-list").html(data);
	}
	});
}
function getManager(val) {
	$.ajax({
	type: "POST",
	url: "getmanager.php",
	data:'cid='+val,
	success: function(data){
		$("#manager-list").html(data);
	}
	});
}

</script>
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
<center><h1>DELETE MANAGER IN A CLINIC</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<label style="font-size:20px" >City:</label>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getState(this.value);">
		<option value="">Select City</option>
		<?php
		include 'dbconfig.php';
		$sql1="SELECT distinct City FROM clinic";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["City"]; ?>"><?php echo $rs["City"]; ?></option>
		<?php
		}
		?>
		</select>
        
	
		<label style="font-size:20px" >Clinic:</label>
		<select id="clinic-list" name="clinic" onchange="getManager(this.value);" >
		<option value="">Select Clinic</option>
		</select>
		
		<label style="font-size:20px" >Manager:</label>
		<select name="manager" id="manager-list" >
		<option value="">Select Manager</option>
		</select>
		
		
		<button name="Submit" type="submit">DELETE</button>
	</form>
<?php
session_start();
include 'dbconfig.php';
if(isset($_POST['Submit']))
{
	$cid=$_POST['clinic'];
	$mid=$_POST['manager'];
	$sql = "DELETE FROM manager_clinic WHERE CID= $cid AND MID= $mid";
	$sql1="update clinic set MID = 0 where MID= $mid";

	if (mysqli_query($conn, $sql))
		{
		echo "DATA DELETED successfully.....";
		header( "Refresh:2; url=deletemanagerclinic.php");
		}
	else
		{
			echo "ERROR DELETEING DATA: " . mysqli_error($conn);
		}
	if (mysqli_query($conn, $sql1)) 
				{
							echo "<h2>Record created successfully( CID=$cid MID=$mid )in CLINIC TABLE!!</h2>";
							echo "Please wait...Refreshing...";
							header( "Refresh:2; url=deletemanagerclinic.php");

				} 
				else
				{
					echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
				}
}

if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
?>			

</body>
</html>