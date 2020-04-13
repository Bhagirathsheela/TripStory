<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripstory");
session_start();
if (isset($_POST['update'])) {
$pass1=$_POST['old'];
$new=$_POST['new'];
$new1=$_POST['new1'];
$pass1 = md5($pass1);
$new=md5($new);
 $new1=md5($new1);
 $id=$_SESSION['id'];
 
 $take="select *from signup where ID='$id'";
 $take1=mysqli_query($con,$take);
 $row=mysqli_fetch_array($take1);
 $pass=$row['password'];
 if ($pass==$pass1) {
 	if ($new==$new1) {
 	 $sql = "update signup set password='$new' where ID= '$id'";
 	 mysqli_query($con,$sql);
 	 header("Location: home.php");
 	}
 	else{
 		echo"New Password Didn'match";
 	}
 }
else{
	echo"Old Password Didn't match";
}
}

?>

<html>
<head>
<style type="text/css">
	body{
		background-color: #F0FFFF;
	}
	#main{
		position: relative;
		left: 550px;
		top: 200px;
	}
	#box1{
		width: 220px;
		height: 30px;
		border-radius: 7px;
	}
	#buttn{
		border-radius: 5px;
		background-color: #C0C0C0;
	}
</style>
</head>
<body>
<form id="main" method="post" action="changepass.php">
	<input id="box1" name="old" type="password" placeholder="Enter Old Password"></input></br><br>
	<input id="box1" name="new" type="password" placeholder="Enter New Password"></input></br></br>
	<input id="box1" name="new1" type="password" placeholder="Renter New Password"></input><br><br>
	<button id="buttn" name=update>Confirm</button>
</form>
	
</body>

</html>
