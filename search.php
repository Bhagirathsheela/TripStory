<?php

$r=15;
$search = $_GET ['srch-term'];
    echo "You searched for <b>$search</b> <hr size='1'></br>";
    $con =mysqli_connect("localhost","root","") or die(mysql_error());
    mysqli_select_db($con,"tripstory") or die(mysql_error());
    $x=0;
    //$search_exploded = explode (" ", $search);
    
    /*foreach($search_exploded as $search_each)
    { 
      $x++;
      if($x==1)
        $construct ="'title' LIKE '%$search_each%'";      
      else
        $construct ="AND 'title' LIKE '%$search_each%'";

    }*/

    $construct ="SELECT * FROM written WHERE title like '%$search%' or loc like '%$search%'  limit 30";
    $run = mysqli_query($con,$construct);
    $foundnum =mysqli_fetch_array($run);
    
    //echo $foundnum;
    //echo "11";

    if($run === FALSE) { 
      die(mysql_error());
    }    
   // $foundnum = mysqli_num_rows($run);

    if ($foundnum==0)
      echo "Sorry, there are no matching result for <b>$search</b>.</br></br>1. 
    Try more general words. for example: If you want to search 'how to create a website'
    then use general keyword like 'create' 'website'</br>2. Try different words with similar
    meaning</br>3. Please check your spelling";
    else
    {
      echo $search; echo " results found !<p>";

      while($runrows = mysqli_fetch_array($run))
      {
        $title = $runrows ['title'];
        $desc = $runrows ['loc'];
        $url = $runrows ['budget'];
        $pid =$runrows ['id'];

        echo "
       <a href='onestory.php?id=<?php echo $pid;?>'> <b>$title</b>  </a>
           <br>$desc<br>
        $url<br>
        ";

      }
    }

  
  //$foundnum =$r-$foundnum; 
  
?>
  <html>
  <stye>
 <title>tripstory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="des/css/bootstrap.min.css">
 <style> 
#look
{
  font-size: 40px;
line-height: 1.42857143;
color: #0F0C0C;

}

body{

background-color: rgb(233, 235, 236);;

}
 #row1{
  position: relative;
 } 
  
</style>
  <body>

    <div >
  
    

    <span id='look'>Search Results<span>

      <br>
  <div id='section2' class="container-fluid" >
           
 <?php

 $con = mysqli_connect("localhost","root","");
  mysqli_select_db($con,"tripstory");

$no = mysqli_num_rows($run);  
$total= "select * from written limit $no";
$total_info_=mysqli_query($con,$total) or die();


              while($total_info = mysqli_fetch_array($total_info_))
              {
                  $pid = $total_info['id'];
                  $query = "select pic from image where id='$pid'";
                  $res = mysqli_query($con, $query);
                  $row = mysqli_fetch_array($res);
            ?>

    <div class="row">
      <div class="col-md-2 portfolio-item">
    <a href="onestory.php?id=<?php echo $pid;?>">
   <img id="row1"class="img-responsive" src="<?php echo 'upload_photo/'.$row['pic']; ?>" alt="">
     </a>   
       <a href="onestory.php?id=<?php echo $pid;?>">
             <h3>
                    <?php echo $total_info['title']; ?>
                </h3>
              </a>
            </div>
       
            <?php
              }
            ?>
          </div>
             </div>
            </body>
            </html>