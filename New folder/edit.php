<?php
$servername = "localhost";
$username = "root";
$password = "negi";
$dbname = "tripstory";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }




?> 


  <!DOCTYPE HTML> 
  <html>
  <head>
    <style>
    .error {color: green;}
   body{

 background-image:url('images/1uZsu.jpeg'); 
}

.shadow{
  font-family:Mr Dafoe, sans-serif;
  font-size:1em;
  text-align:center;
    text-shadow: 0 -3px 0 #333,
    0 6px 8px rgba(0,0,0,.4),
    0 9px 10px rgba(0,0,0,.15),
    0 30px 10px rgba(0,0,0,.18),
    0 15px 10px rgba(0,0,0,.21);

}

    #position
    {
     margin-left: 10%;
     width: 70%;



   }
   #positi
   {  
    padding: 0.5%;
     margin-left: 20%;
     width: 40%;
     height: 100%;


   }
   #pos{

         text-shadow: 4px 4px white;
    text-align: center;
    padding: 10px;    

   }
   #name1{
    font-family:Mr Dafoe, sans-serif;
  font-size:1em;
    text-shadow: 0 -3px 0 #333,
    0 6px 8px rgba(0,0,0,.4),
    0 9px 10px rgba(0,0,0,.15),
    0 30px 10px rgba(0,0,0,.18),
    0 15px 10px rgba(0,0,0,.21);

   }
   #name{


    background-color:rgba(3,21,31,22); ;
    padding: 1%;
    margin: 10px;
    border-radius: 27%;
    padding-top: 1%;
    box-shadow: 50%;
         text-shadow: 0 -3px 0 #333,
    0 6px 8px rgba(0,0,0,.4),
    0 9px 10px rgba(0,0,0,.15),
    0 30px 10px rgba(0,0,0,.18),
    0 15px 10px rgba(0,0,0,.21);

 
    text-align: center;
    padding: 10px; 

   }
   .black { /* I’m half transparent black! */
  color: rgba(0, 0, 0, 0.5);
  color: rgba(0%, 0%, 0%, 0.5);
}

.white { /* I’m 2/3 transparent white! */
  color: rgba(255, 255, 255, 0.33);
  color: rgba(100%, 100%, 100%, 0.33);
}

.red { /* I’m fully transparent red, so kind of invisible */
  color: rgba(255, 0, 0, 0);
  color: rgba(100%, 0%, 0%, 0);
}


 /*cloud-scroll*/



   </style>
 </head>
 <body> 
<div id="cloud-scroll"></div>
<div class="shadow">tripstory.com </div>
  <h1 id='name'    > Change/Edit name email or bio </h1>
  <?php

 session_start();
$id=$_SESSION['id'];
 echo $id;

  
    $sql="select * from signup WHERE id=$id";
  
  $aql=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($aql);
  echo $row[1];
    echo $row[2];
    
 

  $nameErr = $lnameErr = $emailErr = "";
  $fname = $row['1'] ; $lname =$row['2'] ;$email =$row['3'] ;$bio =$row['8'] ;
 $f=0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["fname"])) {
     $nameErr = "Name is required";
   } else {
     $fname =test_input($_POST["fname"]);
     // check if fname only contains letters and whitespace
     $sql = "UPDATE signup SET fname='$fname' WHERE id= $id";

     if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
      $f=1;

    } else {
      echo "Error updating record: " . mysqli_error($conn);

      $f=0;

    }


    if (empty($_POST["lname"])) {
     $nameErr = "lname is required";
   } else {
     $fname =test_input($_POST["lname"]);
     // check if fname only contains letters and whitespace
     $sql = "UPDATE signup SET lname='$lname' WHERE id= $id";

     if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
      $f=1;
    } else {
      echo "Error updating record: " . mysqli_error($conn);
      $f=0;
    }

  }   

  if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
   $nameErr = "Only letters and white space allowed"; 
 }
}

if (empty($_POST["email"])) {
 $emailErr = "Email is required";
} else {
  $email = test_input($_POST["email"]);

  $sql = "UPDATE signup SET email='$email' WHERE id= $id";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    $f=1;
  } else {
    echo "Error updating record: " . mysqli_error($conn);
    $f=0;
  }


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $emailErr = "Invalid email format"; 
 }

 }

if (empty($_POST["bio"])) {
$bio = "";
} else {
 $bio = test_input($_POST["bio"]);

 $sql = "UPDATE signup SET bio='$bio' WHERE id= $id";

 if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
  $f=1;
} else {
  echo "Error updating record: " . mysqli_error($conn);
  $f=0;
}
}



}
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

if($f)
{

 header('location: profile11.php?id=<?php echo "{$id}"; ?>');


}




?>

<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<span id= 'name1'> FirstName</span>: <input type="text"  name="fname" id='positi' value="<?php echo $fname;?>">
 <span class="error">* <?php echo $nameErr;?></span>
 <br><br>

 <span id='name1'>LastName </span> <input type="text" name="lname" id='positi' value="<?php echo $lname;?>">
 <span class="error">* <?php echo $lnameErr;?></span>
 <br><br>
 <span id ='name1'>E-mail </t></pr>  . </span> <input type="text" name="email" id='positi' value="<?php echo $email;?>">
 <span class="error">* <?php echo $emailErr;?></span>
 <br><br> <br><br> <br><br>

<span id='name1'>BIO </span>
 <br><br> 
 <textarea name="bio"   rows="10" id='position' cols="90"><?php echo $bio;?></textarea>
 <br><br>
 <input type="submit" id='name' name="submit" value="Submit"> 
</form>
</body>
</html>