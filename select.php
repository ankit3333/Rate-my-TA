<?php

  session_start(); 

  include 'connection.php';

if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

$query = "SELECT * FROM TA_Rating WHERE `coursecode` = '".$_GET['coursecode']."'  AND `TAname` = '".$_GET['TAname']."'";

  $res = mysqli_query($conn,$query);


?>


<!DOCTYPE html>
<html>
<head>
	<title>TA Feedback</title>
</head>
<body>

<?php  if (isset($_SESSION['username'])) : ?>
    	<p> <a href="index.php?logout='1'" style="color: blue;">logout</a> </p>
    	<p> <a href="index.php" style="color: blue;">Go to index page</a> </p>
    <?php endif ?>

<?php

	if(mysqli_num_rows($res) > 0)
	{
			while($row = mysqli_fetch_array($res))
			{

				echo htmlspecialchars($row["comment"]);
	}
}

?>


</body>
</html>