<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripstory");
session_start();
$userid=$_SESSION['id'];
$total= "select * from written where user ='$userid'";
$total_info_=mysqli_query($con,$total);
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
  margin-left: 30px;
  position: relative;
  top: 7px;

}
#well1{
  position: absolute;
  width:150px;
  margin-left: 1170px;
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
#show{
	padding: 25px;
	background-color: #e2e2e2;
	width:80%;
	border : 2px solid #000;
}
#main_div{
	margin-top: 130px;
	text-align: center;
}
#location{
	font-size: 20px;
	font-family: "Comic Sans MS";
	font-style: Bold;
    width: 1000px;
    text-align: center;
}
#title{
	font-size: 20px;
	font-family: "Comic Sans MS";
	font-style: Bold;
	width: 1000px;
    text-align: center;
}
#story{
	font-size: 20px;
	font-family: "Comic Sans MS";
	font-style: Bold;
	width: 1000px;
    text-align: center;
}
#budget{
	font-size: 20px;
	font-family: "Comic Sans MS";
	font-style: Bold;
	width: 1000px;
    text-align: center;
}
#image{
	 height:400px;
	 width:400px;
	 margin: 10px;
     margin-left: 300px;
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
  <a href="#">Your Stories</a></br><hr>
  <a href="#">Change Password</a></br><hr>
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
  <!--to show the stories-->
  <div id="main_div">
   <?php
while($total_info = mysqli_fetch_array($total_info_))
{
?>

<div class="row" id="show" style="margin-left: 134px">
	<div class="col-md-3">
	<?php 

$name=$_SESSION['name'];
echo"<a id =\"user_link\" href=\"profile.php\">$name</a> Shared one story";
echo"<p id='location'>Location:$total_info[1]</p>";
echo"<p id='title'>title:$total_info[2]</p>";
echo"<p id='budget'>Approximate budget:$total_info[4] Rs</p>";
echo"<p id='story'>Story:$total_info[3]</p>";
echo '</br>';
	?>

<?php
 $only=$total_info[0];
 $image_="select * from image where id='$only'";
 $images=mysqli_query($con,$image_);
while (  $image = mysqli_fetch_array($images)) {  
   
	echo"<img  id='image' src='upload_photo/".$image[1]."'>";
	}
	?>	
	</div>
</div>

<br/>
<?php 
}
?>   
</div>

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

    $("#well1").toggle();
    //$(this).toggleClass('well1')
  }
</script>
</body>
</html>