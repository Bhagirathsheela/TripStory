<?php

   if (isset($_POST['submit'])) {

        include_once"connection.php"; //connection.php

        $username = strip_tags($_POST['name']);
        $password = strip_tags($_POST['password']);

       //shoudl do validation on passwords before submitting form
    $sql = "INSERT INTO members (username, password) VALUES ('$username', '$password')";


    if (mysqli_query($dbCon, $sql)) {

        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbCon);
    }
    mysqli_close($dbCon);
   }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <title>Register for Membership</title>
    </head>
    <center>
    <body>
        
        <h1>Register for Membership</h1>
        
        
        <form method="post" action="register.php">
            <table     align="center" width="30%" border="0"  >
                  <tr>
           <td> <input type="text" name="name" placeholder="Name" /></td>
            <tr />
            <tr>
            <td><input type="text" name="password" placeholder="Password" /><td/>
            <tr>
                <tr>
                <td>
            <input type="submit" name="submit" value="Join Member" /></td>
            </tr>
                    <td><a href="index.php">login</a></td>
         </tr>
         </table>
        </form>
    </center>
    </body>
</html>
