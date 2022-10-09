<html>
<head>
<link rel="stylesheet" href="wintan.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "dbconfig.php"; ?>
<body style="background-color:black;">
	<div class="header">
		<ul>
			<li style="float:left;border-right:none"><a href="cover.php" class="logo"><img src="images/WH2.png" width="70px" height="70px"><strong>Wintan </strong>Appointment Making System</a></li>
			<li><a href="ulocateus.php">Locate Us</a></li>
			<li><a href="ulogin.php">HOME</a></li>
		</ul>
	</div>
	<form action="cancelbookingpatient.php" method="post">
	<div class="sucontainer"style="margin-top:5%;width:60%;margin-left:-10%;background-color:black;">
		<label style="font-size:20px" >Delete Appointment:</label><br><br>
		<select name="appointment" id="appointment-list" class="demoInputBox"  style="width:100%;height:35px;border-radius:9px">
		<option value="">Search Appointment</option>
		<?php
		
		session_start();
		$username=$_SESSION['username'];
		$date= date('Y-m-d');
		$sql1="SELECT * from book where username='".$username."'and status not like 'Cancelled by Patient' and DOV >='$date'";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) {
			$sql2="select * from doctor where did=".$rs["DID"];
			$results2=$conn->query($sql2);
				while($rs2=$results2->fetch_assoc()) {
					$sql3="select * from clinic where cid=".$rs["CID"];
					$results3=$conn->query($sql3);
		while($rs3=$results3->fetch_assoc()) {
			
		?>
		<option value="<?php echo $rs["Timestamp"]; ?>"><?php echo "Patient: ".$rs["Fname"]." Date: ".$rs["DOV"]." -Dr.".$rs2["name"]." -Clinic: ".$rs3["name"]." -Town: ".$rs3["town"]." - Booked on:".$rs["Timestamp"]; ?></option>
		<?php
		}
		}
		}
		?>
		</select>
					
					<br><br>

			<button type="submit" style="position:center;float:right;" name="submit" value="Submit">Delete</button>
	</form>
	<?php
if(isset($_POST['submit']))
{
		$username=$_SESSION['username'];
		$timestamp=$_POST['appointment'];
		$updatequery="update book set Status='Cancelled by Patient' where username='$username' and timestamp= '$timestamp'";
				if (mysqli_query($conn, $updatequery)) 
				{
							echo "Appointment Cancelled successfully..!!<br>";
							header( "Refresh:2; url=ulogin.php");

				} 
				else
				{
					echo "Error: " . $updatequery . "<br>" . mysqli_error($conn);
				}

}
?>
</body>
</html>