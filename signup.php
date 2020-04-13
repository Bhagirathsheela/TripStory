<?php
session_start();

//$con = mysqli_connect('localhost','root','','tripstory');
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripstory");


if($con)
{
	//echo 'CONNECTED';
}

	if(isset($_POST['submit_button'])){
		$email = $_POST['email'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
	
	 if(!empty($email) && !empty($pass1) && !empty($pass2) && !empty($fname) && !empty($lname)){
		if($pass1!=$pass2){   
		        echo "Password doesnt match";
		     	header('location:signup.php');
		}
	    else{
	       $pass1 = md5($pass1);
		   $res_ = "insert into signup(ID,fname,lname,email,password) values (0, '$fname', '$lname', '$email', '$pass1')";
		   $res = mysqli_query($con, $res_) or die("failed");

			if($res){
			    echo 'sign up successfull';
			  	header('location:signin.php?ok');
			}
	       
	    }
	}
	else{
		header('location:signup.php');
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
	height: 270px;
 }
 
 .forms form {
	height: 200px;
	
 }
 
 .forms ul{
	list-style-type: none;
	padding: 10px;
	position: absolute;
	left: 0;
	right: 0;
	margin: auto;
 }
 
 .forms ul li {
	border-radius: 5px;
	padding: 10px;
	font-size: 20px;
	height: 10px;
	margin-bottom: 8px;
	margin-left: 25px;
 }
 

 #submit_button {
	left: 0;
	right: 0;
	margin: auto;
	width: 60px;
	background-color: #aaa;
	border-radius: 5px;
 }
#display{
	font-size :15px;
	text-align:left;
	display:none;
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
#box3{
	height: 30px;
	width: 220px;
	border-radius: 5px;
}
#box4{
	height: 30px;
	width: 220px;
	border-radius: 5px;
}
#box5{
	height: 30px;
	width: 220px;
	border-radius: 5px;
}

</style>
</head>
<body>
<marquee>
<h1> Welcome to tripsory  </h1>
</marquee>
 <div class="display" id="display">
 signup successfull
 </div>

<div class="forms"  style="margin-left:500px;margin-top:110px">
	<form method="post" action="signup.php" >
	<ul>
		<li><input id="box1" type="text" name="fname" placeholder="First Name"></li>
		<li><input id="box2" type="text" name="lname" placeholder="Last Name"></li>
		<li><input id="box3" type="email" name="email" id="email" placeholder="Email"></li>
		<li><input id="box4" type="password" name="pass1" minlength="6" placeholder="Password"></li>
		<li><input id="box5" type="password" name="pass2" minlength="6" placeholder="Re-Enter Password"></li>
		<li><input id="submit_button" type="submit" value="Signup" name ="submit_button" align="center"></li>
	    <div class="login-help">
      
    </div>
	</ul>
	</form>
</div>
</body>
</html>
