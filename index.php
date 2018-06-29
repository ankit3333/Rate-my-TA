<?php 
  
  session_start(); 

    include 'connection.php';

    $name = $_SESSION['username'];

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }


  $sql = "SELECT  * FROM users WHERE `username` = '".$_SESSION['username']."' ";

  $result = mysqli_query($conn,$sql);


  $query = "SELECT * FROM TA INNER JOIN users ON users.coursecode=TA.coursecode WHERE `username` = '".$_SESSION['username']."'";

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
	<title>Home Page</title>
</head>
<body>

	<div class="container">
		<div class="row">
  	
  	<?php if (isset($_SESSION['success'])) : ?>
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
     
  	<?php endif ?>

    
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: blue;">logout</a> </p>
    <?php endif ?>


Course Code:

	<?php

	if(mysqli_num_rows($result) > 0)
	{
			while($row = mysqli_fetch_array($result))
			{

				echo $row["coursecode"];
	}
}
	?>

<br>
<br>
TA name:
<br>
	<?php

	if(mysqli_num_rows($res)>0){
		while($row1=mysqli_fetch_array($res)){
	?>

	<a href=""><?php echo $row1["TAname"]; ?><br></a>


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