
<?php 
  
  session_start(); 
    include 'connection.php';
    $name = $_SESSION['username'];
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  $sql = "SELECT  * FROM users WHERE `username` = '".$_SESSION['username']."' ";
  $result = mysqli_query($conn,$sql);
  $query = "SELECT * FROM TA_Rating INNER JOIN users ON users.coursecode=TA.coursecode WHERE `username` = '".$_SESSION['username']."'";
  $res = mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body>

	<div class="container">
		<div class="row">


<br>
<br>
TA Rating:
<br>
	<?php
	if(mysqli_num_rows($res)>0){
		while($row1=mysqli_fetch_array($res)){
	?>

	<a href=""><?php echo $row1["comment"]; ?><br></a>


	<?php	
		}
		}else{
			 echo "No rows to display";
		}
	?>

</table>
</div>
</div>

</body>
</html>