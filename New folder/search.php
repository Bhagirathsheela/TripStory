<?php
	
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripstory"); or die;
	if(isset($_POST['searchword'])) {
		$key = $_POST['searchword'];
		$user = $_SESSION['id'];
		$query = "SELECT * FROM written WHERE location LIKE '%$key%' AND user <> '$user' LIMIT 5";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result)) {
?>
		<a href=".php?user=<?php echo $row['user']; ?>"> 
			<div id="search_profile_box">
				<img <?php 
						if(!empty($row['location'])){
							echo "no result found";
						}
						}else {
							echo "$row['location']";
						}
						?> id="search_profile_pic">
				<p id="search_profile_name"> <?php echo $row['name']; ?> </p>
			</div>
		</a>
<?php
		}
	}
?>