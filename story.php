<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripstory");
session_start();
$files = glob("upload_photo/*.*");
$user =$_SESSION['id'];
if($user){
if(isset($_POST['last_button'])){

$loc = $_POST['loc'];
$title = $_POST['title'];
$story = $_POST['story'];
$budget = $_POST['budget'];
$files = $_FILES['upload1'];



$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

if ($fn) {  
  // AJAX call
  file_put_contents(
    'upload_photo/' . $fn,
    file_get_contents('php://input')
  );
  //echo "$fn uploaded";
  exit();

}
else {
     
  $story_info = "insert into written values (DEFAULT, '$loc', '$title', '$story', '$budget','$user')";
                  $story_info1=mysqli_query($con,$story_info) or die();
  $done = false;
  foreach($_FILES['upload1']['error'] as $key => $value) {
          if ($value == UPLOAD_ERR_OK){
              // get the image original name
            $check = getimagesize($_FILES['upload1']['tmp_name'][$key]);
            if($check!=false){
                $name = $_FILES["upload1"]["name"][$key];
                $new_name = str_replace(' ', '_', $name);
                $target = time() . $key . $new_name;
                $q = 100;
                $tmp_file = $_FILES['upload1']['tmp_name'][$key];
                list($width,$height)=getimagesize($tmp_file);

                // Replace the images to a new nice location. Note the use of copy() instead of move_uploaded_file(). I did this becouse the copy function will replace with the good file rights and  move_uploaded_file will not shame on you move_uploaded_file.
                if(move_uploaded_file($_FILES['upload1']['tmp_name'][$key], 'upload_photo/' . $target)) {
                 // compress_image('upload_photo/' . $target, 'upload_photo/' . $target, $q, $width, $height, $target);
                  
                  $query = "select * from written where loc='$loc' and title='$title'and story='$story' and budget='$budget'";
                  $res = mysqli_query($con, $query) or die('1');
                  $row = mysqli_fetch_array($res);
                  $id = $row['id'];
                  $query1 = "INSERT INTO image(id, pic) VALUES ('$id','$target')";
                  $result1 = mysqli_query($con, $query1) or die('2');
                  $done = true;  
                }
            }
          }
      }
      if($done){
          header('location:home.php');
      } 
    }
}
}
else{
  header('location:signin.php');
}
?>

<html>
<head>
<title>Write Story</title>
<script src="jquery.min.js"></script>
<script type="text/javascript" src="des/js/bootstrap-filestyle.min.js"></script>
<style>
#story{
width: 615px;
height: 400px;
padding: 2%;
font: 1.4em/1.6em cursive;
background-color: #eee;
border: 1px solid #aaa;
border-radius: 5px;
align:"center";
margin-top: 4px;
}
body {
	background-color:#00000;
	background-image: url("picture.jpg");
    }
#form1{
	clear: both;
	float: none;
	
}  
#form1 input {
	clear: both;
	float: none;
}  
#loc{
margin-left :1px;
width : 615px;
height : 40px;
font-size :20px;
}
#title{
margin-left :1px;
width : 615px;
height : 40px;
font-size :20px;
}

#budget{
margin-left : 360px;
margin-top: 5px;
width : 615px;
height : 40px;
font-size :20px;}
#submit_next	{
	height: 35px;
	width: 125px;
	background-color:#abc789;
	border: 2px solid #eee;
	border-radius: 5px;
	margin-left:850px;
	margin-top: 10px;
}
#mydiv1{
	margin-left: -360px;
	margin-top: -14px;
}
#upload{
	padding:50px;
	width: 515px;
	margin-left: 360px;
	margin-top: 10px;
	display: none;
	border: 2px solid #aaa;
}
#upload1{
	text-decoration-style: dashed;
}
#last_button{
	background-color: #aad;
	margin-left: 500px;
	height: 30px;
	width: 60px;
	border: 5px solid #eef;
	border-radius: 2px;
}
</style>
</head>
<body>
<h1><center><font face="" color="#000">Write Your Beautiful Trip Experience </font></center></h1>



<form id="form1" method="post" action="story.php" enctype="multipart/form-data">
	<center><input class="loc" id="loc" name="loc" placeholder="  Enter location"></input></center>
	<center><input class"title" id="title" name="title" placeholder="Title of Story"></input></center>

   <center>
     <textarea name="story" id="story" placeholder="  Enter Your Story ">
     </textarea>
   </center>

<div id="mydiv">
  <input name="budget" id="budget" placeholder="  Enter Budget"></input>
</div>
<a href="#upload"><input type="button" value="Next" id="submit_next"></input></a>

<div id="upload">
<h3>Want to Upload Pictures</h3>
<a href="#">skip</a>
<input type="file" class="filestyle" id="upload1" name="upload1[]" accept="image/*" multiple="true" data-input="false"data-buttonText="Yes"/>
<button id="last_button" name="last_button">Submit</button>	
</div>
</body>
</form>
<script type="text/javascript">
   $(document).ready(function(){
    $('#submit_next').click(function(){
    
       $('#upload').toggle();
       if(submit_next.value == 'Next')
       {
           submit_next.value='Back';
       }
       else
       {
           submit_next.value = 'Next';
       }
           });
});
</script>

</html>