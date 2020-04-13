<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripstory");
$total= "select * from written limit 3";
$total_info_=mysqli_query($con,$total);
session_start();

//echo '$total_info';
?>


<!DOCTYPE html>
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

  #section3 {padding-top:50px;height:690px;width:100%;color: #fff; background-color: #fff;}
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
  margin: 10px;
  margin-bottom: 20px;
  position: relative;
  top: -20px;
}

#setting{
  
  border-radius: 50% 50% 50% 50%;
  height: 50px;
  width: 50px;
  margin: 10px;
  margin-left: 70px;
  position: relative;
  top: 7px;

}
#well1{
  position: absolute;
  width:150px;
  margin-left: 1180px;
  margin-top: 5px;
  padding: 6px;
  background-color: skyblue;
}
#well1 a {
  margin-top: -20px;
}
#well1 a:hover{ color: orange; font-weight: bolder;text-decoration: underline;} 

#notification{
  border-radius: 50% 50% 50% 50%;
  height: 30px;
  width: 30px;
  position: relative;
  top:-20px;
  margin-left:50px;
}
#row1{
  height: 300px;
  width: 400px;
}
#row2{
  height: 300px;
  width: 400px;
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
  <a href="logout.php" >logout</a>
</center>
</div>
            <?php
              }
            ?>
        </div>
      </div>
    </div>
  </nav>    





  <div id="section1" class="container-fluid">
    <!-- Inspired by http://codepen.io/transportedman/pen/NPWRGq -->
    <div class="carousel slide carousel-fade" data-ride="carousel">

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
        </div>
        <div class="item">
        </div>
        <div class="item">
        </div>
      </div>
    </div>

    <!-- Remeber to put all the content you want on top of the slider below the slider code -->

    <div class="title">
      <h1>This is Awesome</h1>
    </div>
    <br><br><br><br><br>

    <div class="row ">
      <form  method="GET" action="search.php">
      <div class="col-lg-7" style="float:none; margin: 0 auto;">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search ........ " name="srch-term" id="srch-term" autocomplete="off" >
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
      </div>
      </form>
      <br><br>
      <div class="row">
        <div class="col-lg-5" style="float:none; margin: 0 auto;" >

         <a href="story.php"><button type="button" class="btn btn-primary btn-block">Write story</button></a>

        </div>
      </div>

    </div>
  </div>

  <div id="section2" class="container-fluid">
    
   

    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                </h1>
            </div>
        </div>
        <!-- /.1.row -->

        <!-- Projects Row -->
        <div class="row">
            <?php
              while($total_info = mysqli_fetch_array($total_info_))
              {
                  $id = $total_info['id'];
                  $query = "select pic from image where id='$id'";
                  $res = mysqli_query($con, $query);
                  $row = mysqli_fetch_array($res);
            ?>
             <a href="onestory.php?id=<?php echo $id;?>">
            <div class="col-md-4 portfolio-item">
            
                    <img id="row1"class="img-responsive" src="<?php echo 'upload_photo/' .$row['pic']; ?>" alt="">
            
                <h3>
                    <?php echo $total_info['title']; ?>
                </h3>
                <!--<p><?php echo $total_info['title']; ?></p>-->
            </div>
            </a>
            <?php
              }
            ?>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <?php
              $total= "select * from written limit 3,3";
              $total_info_=mysqli_query($con,$total);
              while($total_info = mysqli_fetch_array($total_info_))
              {
                  $id = $total_info['id'];
                  $query = "select pic from image where id='$id'";
                  $res = mysqli_query($con, $query);
                  $row = mysqli_fetch_array($res);
            ?>
            <a href="onestory.php?id=<?php echo $id;?>">
            <div class="col-md-4 portfolio-item">
              
                    <img  id="row2"class="img-responsive" src="<?php echo 'upload_photo/' .$row['pic']; ?>" alt="">
            
                <h3>
                  <?php echo $total_info['title']; ?>
                </h3>
    
            </div>
            </a>
            <?php
              }
            ?>

        </div>

        

     

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#section3">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

      

    </div>
    
   </div>
  <div id="section3" class="container-fluid">
   <?php
while($total_info = mysqli_fetch_array($total_info_))
{
  $id = $total_info['id'];
  $query = "select pic from image where id='$id'";
?>
<div class="row" id="show" style="margin-left: 134px">
  <div class="col-md-5">
  <?php
  echo '<img src="upload_photo/'.$total_info[5].'" style="height:200px;width:200px"/>';
  ?>    
  </div>
  <div class="col-md-3">
  <?php 
echo $total_info[1];
echo '</br>';
echo $total_info[2];
echo '</br>';
echo $total_info[3];
echo '</br>';
echo $total_info[4];
echo '</br>';
  ?>
  </div>
</div>
<br/>
<?php 
}
?>
 </div>

 <script type="text/javascript">
  function show(){
    //$('#well1').show();
    $("#well1").toggle();
    //$(this).toggleClass('well1')
  }

$("#srch-term").keyup(function() {
      var searchString = $(this).val();
      var dataString = 'searchword='+ searchString;
      if(searchString==''){
        $("#search_result").html('').show();
      }else{
        $.ajax({
          type: "POST",
          url: "search.php",
          data: dataString,     
          cache: false,
          success: function(html){
            if(!html){
              $("#search_result").html('<p id="search_no_results">no results</p>').show();
            }else{
              $("#search_result").html(html).show();    
            }       
          }
        });
      }   
    });






</script> 
 
</body>
</html>