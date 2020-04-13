<html>
<head>

<link rel="stylesheet" href="des/css/bootstrap.min.css">
<script src="des/js/bootstrap.min.js"></script>
<script src="jquery.min.js"></script>
<script  src=des/js/bootstrap.js></script>

<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Hello World";
}
</script>

<script type="text/javascript">
  function show(){
    //$('#well1').show();
    $("#well1").toggle();
    //$(this).toggleClass('well1')
  }
</script>

<style>
.header {
    background-color:green;
    height:70px;
    text-align:center;
    padding:10px;
}
#setting{
  margin-left: 1200px;
  border-radius: 50% 50% 50% 50%;
  height: 50px;
  width: 50px;
  margin-top: -53px;
} 
.lighter{
  margin-left:-800px;
    margin-top: 0px;
}
.search{
  width: 220px;
  height: 30px;
  margin-top:10px;
  border-radius: 5px;
}
#well2{
  position: absolute;
  width:200px;
  height: 200px;
  margin-left: 5px;
  margin-top: 0px;
  padding: 6px;
  background-color: skyblue;
}
#search1{
  height: 30px;
  width: 125px;
  background-color:#abf;
  border: 2px solid #eee;
  border-radius: 5px;
  margin-left:15px;
  margin-top:-40px;
}
#write input{
  height: 30px;
  width: 125px;
  background-color:#abf;
  border: 2px solid #eee;
  border-radius: 5px;
  margin-left:30px;
  margin-top:-44px;
}

#menu {
   width : 500px;
  float:left;
  padding :10px;
}
#setting{
  margin-left: 1200px;
  border-radius: 50% 50% 50% 50%;
  height: 50px;
  width: 50px;
  margin-top: -53px;
}

#pro{
  border-radius: 50% 50% 50% 50%;
  margin-left: 650px;
  height: 50px;
  width: 50px;
  margin-top: -50px;
}

#a1 {
    position :absolute;
    margin-left:5px;
    margin-top: 10px;
    height: 220px;
    width: 250px;
    float:left; 
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:300px;
    float:left;
    padding:2px;        
}

#a2{
  margin-left: 25px;
  height: 60px;
  width: 135px;
  padding-top: 10px !important;
}

#a3{
  height: 60px;
  width: 135px;
  padding-top: 10px !important;
}

#a4{
  height: 60px;
  width: 135px;
  padding-top: 10px !important;
}
#well1{
  position: absolute;
  width:130px;
  margin-left: 1200px;
  margin-top: 5px;
  padding: 6px;
  background-color: skyblue;

}
#well1 a {
  margin-top: -20px;
}
#well1 a:hover{ 
             color: grey; font-weight: bolder;text-decoration: underline;}


</style>
</head>

<body>
<div class="header">

<div>

<form class="lighter">
  <input type="text" class="search" placeholder= " Location,People"></input>
  <input type="button" value="Search" id="search1"  enctype="multipart/form-data"></input>
</form>

<div id="write">
  <a href="story.php"><input type="button" value="Write Story"></input></a>
</div>

<div >
  <input type="image" src="images/profile.png" alt="Submit" id="pro" >
</div>

<div>
  <input type="image" src="images/setting.jpg" alt="Submit" id="setting" onclick="show()">
</div>
</div>
</div>

<div class="well" id="well1" style="display: none">
<center>
  <a href="#">Edit Profile</a></br><hr>
  <a href="#">Your Stories</a></br><hr>
  <a href="#">About Us</a></br><hr>
  <a href="#">Logout</a></br><hr>
</center>
</div>


<div id="nav">
<div class="well" id ="a1" > 
</div>

<button onclick="myFunction()">Click me</button>
<p id="demo"></p>

</div>

<div class="container"   id ='menu' >
  <h2> PROFILE </h2>
   <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">updates</a></li>
    <li><a data-toggle="tab" href="#menu1">About </a></li>
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div>

 <div class="tab-content">
     <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, </br></br>consectetur adipisicing elit, 
         sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <p>Lorem ipsum dolor sit amet, </br></br>consectetur adipisicing elit, 
         sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <p>Lorem ipsum dolor sit amet, </br></br>consectetur adipisicing elit, 
         sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <p>Lorem ipsum dolor sit amet, </br></br>consectetur adipisicing elit, 
         sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

  </div>

    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>

    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>

  </div>
</div>





</body>
</html>