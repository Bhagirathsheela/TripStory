<?php
session_start();

//$con = mysqli_connect('localhost','root','','tripstory');
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripstory");
if($con)
{
	//echo 'CONNECTED';
}
$loggedin = true;

if(isset($_POST['login_button']))	
{
	
	$email = $_POST['email'];
	$pass1 = $_POST['pass1'];
	$pass1 = md5($pass1);
	$res1 = "select * from signup where email='$email' and password='$pass1' ";
	$res1 = mysqli_query($con, $res1);
   
   $row=mysqli_fetch_array($res1);

	if(mysqli_num_rows($res1)==1)
		{
			$_SESSION['email'] = $row['email'];
			$_SESSION['name'] = $row['fname'] .' '. $row['lname'];
			$_SESSION['id'] = $row['ID'];
			header("Location: home.php");
		}
		else
		{
			$loggedin = False;
	        //<script>alert('wrong details');</script>
	    }
}
?>
<html>
<head>
<script src="jquery-1.12.0.js"></script>

<style>
body {
  background-image: url("signpic.jpg"); 
}

h1 {
    color: GREEN;
    text-align: center;
}

.forms { 
	border: solid 1px #5F9EA0;
	background:#e0e0e0;
	width:320px;
 	border-radius: 5px;
	position: relative;
	height: 230px;
 }
 
 .forms form {
	height: 200px;
	
 }
 
 .forms ul{
	list-style-type: none;
	padding: 20px;
	position: absolute;
	left: 0;
	right: 0;
	margin: auto;
 }
 
 .forms ul li {
	border-radius: 5px;
	padding: 5px;
	font-size: 20px;
	height: 20px;
	margin-bottom: 8px;
	margin-left: 25px;
 }
 
#login_button {
  position: absolute;
  left: 0;
  right: 0;
  margin-left:50px;
  width: 60px;
  height: 25px;
  border-radius: 5px;
  background-color: #aaa;
 } 
 
#display{
	font-size :15px;
	text-align:left;
	display:none;
}
#new{position: relative;
	top: -27px;
	left: 120px;
}
#box1{
	height: 30px;
	width: 220px;
	border-radius: 5px;
}
#box2{
	height: 30px;
	width: 220px;
	border-radius: 5px;
}
#forgot{
	margin-left: 30px;
	margin-top: -10px;
}
</style>
</head>
<body>
<marquee>
<h1> Welcome to tripsory  </h1>
</marquee>
<?php

if(!$loggedin)
  echo "Email or Password not Matched";
?>
 <div class="display" id="display">
 signup successfull
 </div>

<div class="forms"  style="margin-left:550px;margin-top:110px">
	<form method="post" action="signin.php" >
	<ul>
		<li><input id="box1" type="text" name="email" placeholder="Enter Email "></li>
		<li><input id="box2" type="password" name="pass1" maxlength="15" placeholder="Enter password"></li>
		<li><input id="login_button" type="submit" value="Login" name ="login_button" align="center"></li>
		<a  id="new" href="signup.php">New User ?</a>
	    <div class="login-help">
      <p id="forgot">Forgot your password? <a href="forgot.php">Click here to reset it</a>.</p>
    </div>
	</ul>
	</form>
</div>
</body>
</html>