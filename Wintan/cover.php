<!DOCTYPE html>
<html>
<head>
</head>
<body style="background-image:url(images/hospital1.jpg);">
<link rel="stylesheet" href="wintan.css">
			<div class="header">
				<ul style="background-color:#060135;">
					<li style="float:left;border-right:none;"><a href="cover.php" class="logo"><img src="images/WH2.png" width="70px" height="70px"><strong>Wintan </strong>Appointment Making System</a></li>
					
					<li><a href="#home">HOME</a></li>
					<li><a href="https://www.hpb.health.gov.lk/en"target="_blank">COVID-19</a></li>
					<li><a href="https://www.bbc.com/tamil/topics/cz74k7p3qw7t"target="_blank">News</a></li>
					<li><a href="gallery.html">GALLERY</a></li>
					<li><a href="ulocateus.php">LOCATION</a></li>
				</ul>
			</div>
			<div style="float:center;">
				
				<button onclick="document.getElementById('id01').style.display='block'" style="position:absolute;top:24%;left:23%;font-size:50px;background-color:orange;border: 5px solid blue;color:#060135;border-radius:50%;height:4.5cm;">Login</button>
			
			</div>	
			
		
			<div style="background-color:black;width:69%;height:80%;float:right;font-size:50%;">
			
					<li style="margin-right:15%;margin-top:45%;"><a href="admin/mlogin.php" target="_blank">MANAGER Login</a></li>
					<li style="margin-top:45%;"><a href="admin/alogin.php" target="_blank">ADMIN Login</a></li>
					<li style="margin-top:45%;"><a href="admin/dlogin.php" target="_blank">Doctor Login</a></li>
					
					
			</div>
		
			
		
			<div class="footer">
				
				<ul style="position:absolute;top:93%;background-image:url(images/hospital1.jpg);color:yellow;width:100%;font-size:28px;">
				<marquee>Welcome to Our Online Appointment Making System</marquee>
			</ul>
			</div>
			
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="cover.php">
    <div class="imgcontainer">
		<span style="float:left"><h2>&nbsp&nbsp&nbsp&nbspLog In</h2></span>
      <span onclick="document.getElementById('id01').style.display='none'" style="background-color:white" class="close" title="Close Modal">&times;</span>
    </div>
	
    <div class="container"style="background-color:#060135;"><br><br>
      
      <input type="text" placeholder="Username" name="uname" required>

      
      <input type="password" placeholder="Password" name="psw" required>
	  <br>
		<button type="submit" name="login" style="background-color:green">Login</button>
		
      <input type="checkbox" checked="checked"> Noted
    </div>

    <div class="container" style="background-color:white;">
      <button onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'" style="float:center;background-color:blue;margin-left:15%;border:5px solid gray;">Create Your Account</button>
    </div>
	

  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="signup.php" method="post">
  
	
    <div class="container" style="background-color:black;">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
	  <button type="submit" name="signup" style="float:right;background-color:blue;" >Sign Up</button>
    </div>
	
  </form>
</div>


<script>

var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

</script>
<?php
session_start();
$error=''; 
if (isset($_POST['login'])) {
if (empty($_POST['uname']) || empty($_POST['psw'])) {
$error = "please fill correct Username and Password";
}
else
{
	include 'dbconfig.php';
	$username=$_POST['uname'];
	$password=$_POST['psw'];

	$query = mysqli_query($conn,"select * from patient where password='$password' AND username='$username'");
	$rows = mysqli_fetch_assoc($query);
	$num=mysqli_num_rows($query);
	if ($num == 1) {
		$_SESSION['username']=$rows['username'];
		$_SESSION['user']=$rows['name'];
		header( "Refresh:1; url=ulogin.php"); 
	} 
	else 
	{
		$error = "please fill correct Username and Password";
	}
	mysqli_close($conn); 
}
}
?>
</body>
</html>
