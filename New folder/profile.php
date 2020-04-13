<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripstory");
session_start();
$user=$_SESSION['id'];

 $count="select count(*) as count from written where user='$user'";
 $count1 =mysqli_query($con,$count);
$count3= mysqli_fetch_array($count1);
$count2=$count3[0];
$val="select * from signup where ID='$user'";
$val1=mysqli_query($con,$val);
$info=mysqli_fetch_array($val1);
$first=$info['fname'];
echo"$first";
echo"$info[1]";


if(isset($_POST['submit'])){
$profile = $_FILES['profile'];
 $done = false;
foreach($_FILES['profile']['error'] as $key => $value) {
          if ($value == UPLOAD_ERR_OK){
              // get the image original name
            $check = getimagesize($_FILES['profile']['tmp_name'][$key]);
            if($check!=false){
                $name = $_FILES["profile"]["name"][$key];
                $new_name = str_replace(' ', '_', $name);
                $target = time() . $key . $new_name;
                $q = 100;
                $tmp_file = $_FILES['profile']['tmp_name'][$key];
                list($width,$height)=getimagesize($tmp_file);

                // Replace the images to a new nice location. Note the use of copy() instead of move_uploaded_file(). I did this becouse the copy function will replace with the good file rights and  move_uploaded_file will not shame on you move_uploaded_file.
                if(move_uploaded_file($_FILES['profile']['tmp_name'][$key], 'profile_photo/' . $target)) {
                 // compress_image('profile_photo/' . $target, 'profile_photo/' . $target, $q, $width, $height, $target);
                  $id = $_SESSION['id'];
                  $query1 = "UPDATE signup SET profile = '$target' WHERE id =  '$id'";
                  $result1 = mysqli_query($con, $query1) or die("2");
                  $done = true;  
                }
            }
          }
      
      if($done){
          header('location:profile.php');
      } 
    }
    }
?>

<html>
<head>
  <title>tripstory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="des/css/bootstrap.min.css">
  <script src="des/js/jquery.min.js"></script>
  <script src="des/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/normalize.css">
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> 

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src='des/js/bootstrap.min.js'></script>

  <script src="js/index.js"></script>
  
    <script type="text/javascript">
      $('#ca-container').contentcarousel();
    </script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
    <!-- /.container -->

    <!-- jQuery -->
    <script src="j/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="j/js/bootstrap.min.js"></script>

  <style>

  body {
    position: relative; 
  }

  #section1 {padding-top:50px;
    height:690px;
    color: #fff; 
    width:100%;
    background-color:transparent;
  }

  #section2 {padding-top:50px;height:990px;width:100%;color: #fff; background-color: black;}

  #section3 {padding-top:50px;height:690px;width:100%;color: #fff; background-color: #ff9800;}
#write{
  font-color:0000;
}

#pro{
  border-radius: 50% 50% 50% 50%;
  height: 50px;
  width: 50px;
  position: relative;
  top:-20px;
  margin-left: 600px;

}
#signup{

}
#user-name {
  color: #fff;
  width: 150px;
  margin: 20px;
  margin-bottom: 20px;
  position: relative;
  top: -20px;
}

#setting{
  
  border-radius: 50% 50% 50% 50%;
  height: 50px;
  width: 50px;
  margin: 10px;
  margin-left: 80px;
  position: relative;
  top: 7px;

}
#well1{
  position: absolute;
  width:150px;
  margin-left: 1200px;
  margin-top: 5px;
  padding: 6px;
  background-color: skyblue;
}
#well1 a {
  margin-top: -20px;
}
#well1 a:hover{ color: orange; font-weight: bolder;text-decoration: underline;} 

#a1 {
    margin-left: 10px;
    margin-top: 100px;
    height: 350px;
    width: 405px;
    background-color: #171010 !important;
    <?php
    $id = $_SESSION['id'];
$query = "SELECT * FROM signup WHERE id = '$id'";
$result = mysqli_query($con,$query) or die('Error : ' . mysql_error());
$row = mysqli_fetch_array($result);
$photo = $row['profile'];
    if(isset($photo))
      echo "background:url('profile_photo/" . $photo . "') no-repeat center;";
    else
      echo "background:url('images/profile.png') no-repeat center;";
    ?>
    
 
background-size: 80% 80% !important;
}
#menu {
   width : 500px;
  float:left;
  padding :10px;
  margin-top: -350px;
  margin-left: 600px;
}

#notification{
  border-radius: 50% 50% 50% 50%;
  height: 30px;
  width: 30px;
  position: relative;
  top:-20px;
  margin-left:50px;
}
#about{
  margin-top: 20px;
  margin-left: -70px;

}
#box3{
  margin-left: 35px;
}
#box5{
  margin-left: 45px;
}
#box4{
width: 195px;
margin-left: 3px;
}
#box6{
width: 195px;
height: 40px;
margin-left: 70px;
margin-top: -20px;
}
#update{
  margin-left: 70px;
  border-radius: 4px;
}
#count{
  display: none;
  margin-left: 100px;
  margin-top: 10px;
}
   </style>
  </head>

  <body >
  <nav class="navbar navbar-inverse navbar-fixed-top" >
  
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Tripstory</a>
      </div>

      <div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="home.php">home</a></li>
            <li><a href="#section2">stories</a></li>
            <li><a href="#section3">contact</a></li>
          </ul>
          
          <?php
             if(!isset($_SESSION['email'])) {
          ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php"><span class="glyphicon glyphicon-user" id="signup"></span> Sign Up</a></li>
            <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
            <?php
              }else{
            
              $id = $_SESSION['id'];
              $query = "SELECT * FROM signup WHERE id = '$id'";
              $result = mysqli_query($con,$query) or die('Error : ' . mysql_error());
              $row = mysqli_fetch_array($result);
              $photo = $row['profile'];
                  if(isset($photo))
                    echo '<image src="profile_photo/'.$photo.'" alt="Submit" id="pro" />';
                  else
                    echo '<image src="images/profile.png" alt="Submit" id="pro" />';
                  ?>
            
            <span id="user-name"><?php echo $_SESSION['name'];?></span>
            <image src="images/notification.png" id="notification" alt="Submit" />
            <span>
             <input type="image" src="images/setting.jpg" alt="Submit" id="setting" onclick="show()">
             </span>

           <div class="well" id="well1" style="display: none">
<center>
  <a href="profile.php">Edit Profile</a></br><hr>
  <a href="mystory.php">My Stories</a></br><hr>
  <a href="changepass.php">Change Password</a></br><hr>
  <a href="logout.php">Logout</a></br><hr>
</center>
</div>
            <?php
              }
            ?>
        </div>
      </div>

    </div>
  </nav>

        <form id="pro_upload_form" action="profile.php" method="post" enctype="multipart/form-data">
  <input type="file" id="pro_input" name="profile[]" accept="image/*">
  <input type="submit" name="submit" id="sub">
</form>
<div class="well" id="a1" >  
</div>    
<div class="container"   id ='menu' >

   <ul class="nav nav-tabs">

    <li class="active"><a data-toggle="tab" href="#about" onclick="show1()">About Me</a></li>
    <li><a data-toggle="tab" href="#" onclick="show2()">My Stories </a></li>
    <li><a data-toggle="tab" href="#menu2">Recent Activities</a></li>
    <li><a data-toggle="tab" href="#menu2">Published Stories</a></li>
    
  </ul>

 <form id="about" method="post" action="profile.php" >
 
  <label>First Name<input id="box1"></input></label><br><br>
 <label>Last Name<input id="box2"></input></label><br><br>
 <label>Email<input type="email" id="box3"></input></label><br><br>
 <label>Birth Date<input type="date" id="box4"></input></label><br><br>
  <!--<label>Sex</label></h><label id="box5">Male<input type="radio" ></input></label> <label>Female<input type="radio"></input></label></label><br><br>-->
  <label>Sex<input id="box5" type="radio" name="gender" value="male" checked> Male <input type="radio" name="gender" value="female"> Female<br>
  <label >Bio<br><textarea id="box6"></textarea></label><br><br>
 <input type="button" id="update" value="Edit" name="update1" onclick="disableElements()"></input>
 </form>
  <form id="count">
    <label >You Shared total <?php echo"$count2";?> Stories</label>
  </form>

  <script type="text/javascript"> 
$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#a1').css('background', "url('"+e.target.result+"') no-repeat center");
     $("#sub").trigger("click");
};

$("#pro_upload_form").hide();
$("#a1").click(function() {
    $("#pro_input").trigger("click");
   
});
function show(){
    //$('#well1').show();
    $("#well1").toggle();
    //$(this).toggleClass('well1')
  }
  function show1(){
  
    $("#about").toggle();

  }

  function show2(){
    $("#count").toggle();
    $("#about").toggle(); 
  }

  function disableElements(){
    
       if(update.value == 'Edit')
       {  document.getElementById("box1").disabled = false;
          document.getElementById("box2").disabled = false;
          document.getElementById("box3").disabled = false;
          document.getElementById("box4").disabled = false;
          document.getElementById("box5").disabled = false;
          document.getElementById("box6").disabled = false;
           update.value='Update';
       }
       else{
        document.getElementById("box1").disabled = true;
        document.getElementById("box2").disabled = true;
        document.getElementById("box3").disabled = true;
        document.getElementById("box4").disabled = true;
        document.getElementById("box5").disabled = true;
        document.getElementById("box6").disabled = true;
        update.value='Edit';
       }
}

        
</script>
</body>
</html>