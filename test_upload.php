$files = glob("upload_profile/*.*");

if(isset($_POST['pro_submit'])){

$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

if ($fn) {
  
  // AJAX call
  file_put_contents(
    'upload_profile/' . $fn,
    file_get_contents('php://input')
  );
  //echo "$fn uploaded";
  exit();

}
else {

  // form submit
  $files = $_FILES['fileselect'];

  foreach ($files['error'] as $id => $err) {
    if ($err == UPLOAD_ERR_OK) {
      $fn = $files['name'][$id];
            $ext = explode('.',$fn);
            $extension = $ext[1];
            //echo $extension;
            $newname = $query[5].'_'.$query[6].'_'.$query[1].'.'.$extension;    
            
            //$full_local_path = 'uploads/'.$newname.'.'.$extension ;
  
      move_uploaded_file($files['tmp_name'][$id],'upload_profile/' . $newname);
      
      //echo $newname;
      echo '</br>';
       
      //echo "<p>File $newname uploaded.</p>";
      
            $sql = "UPDATE regis SET pro_imgpath = '$newname'  WHERE username = '$username'";
      $res = mysql_query($sql) or die('Failed due to some reason, try again ' . mysql_error());
      if($res){
      echo "<script type='text/javascript'>window.location.href = 'profile.php?show_msg=1';</script>";
        }
    }
  }

}
}




bhagi


  <nav class="navbar navbar-inverse navbar-fixed-top" >

    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">tripstory</a>
      </div>

      <div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#section1">home</a></li>
            <li><a href="#section2">story</a></li>
            <li><a href="#section3">contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>

        </div>
      </div>
    </div>
  </nav>    


sign up

.sign ul{
  list-style-type: none;
  padding: 20px;
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
 }

 .sign ul li {
  border-radius: 5px;
  padding: 5px;
  font-size: 20px;
  height: 20px;
  margin-bottom: 8px;
 }
 .sign {
text-align:right
}   
 #submit_button {
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  width: 60px;
 }

<div class="sign"  style="margin-left:920px;margin-top:-197px">
  <form method="post" action="sign.php" onsubmit="validate()">
  <ul>
    <label>First Name </label><input type="text" name="fname" id="fname" method="post" ></br>
    <label>Last Name </label><input type="text" name="lname" id="lname"></br>
        <label>Email </label><input type="email" name="email" id="email"></br>
    <label>Enter Password </label><input type="password" name="pass1" minlength="6" id="pass1"></br>
    <label>Renter Password </label><input type="password" name="pass2" minlength="6" id="pass2"></br>
    <li><input id="submit_button" name="submit_button" type="submit"  value="submit" align="center"></li>
  </ul>
  </form>
</div>


error

<script type="text/javascript">
function validate(){
valid = 1;
var x = document.getElementById("fname").textContent;
if(x != ''){
  alert("not empty");
}
else{
  alert("empty");
}

}
 $("#submit_button").click(function(){
  $("#display").css("display","block"); 
 });
</script>


logout
<a href="logout.php" id="logout-button">logout</a>