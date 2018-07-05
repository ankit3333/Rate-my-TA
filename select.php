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

$query = "SELECT * FROM TA_Rating WHERE `coursecode` = '".$_GET['coursecode']."'  AND `TAname` = '".$_GET['TAname']."' ORDER BY time_stamp DESC";

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
	<title>TA Feedback</title>
<style type="text/css">

.column {
    float: left;
    width: 35%;
    padding: 10px;
    height:250px;
    border: 1px solid black;
    display: inline-block;
}

/* Clear floats after the columns */

.res{

	border: 1px solid black;
	margin-top: 20px;
}

 .sidenav {
    background-color: rgba(0,91,187,0.9);
    width: 100%;
    border-bottom: 1px solid rgba(0,0,0,0.9);
    color: white;
    position: fixed;
    top: 0;
 }

.table{
	margin-top: 120px;
}


.logoutLblPos{

   position:fixed;
   right:10px;
   top:5px;
}

</style>

</head>

<body>

<div class="cointainer-fluid">
    <div class="col-sm-3 sidenav">
      <h2>TA Review</h2>
      TA Name: <?php echo $_GET["TAname"]; ?>
      <span style="padding-left: 15px;">Course Code: <?php echo $_GET["coursecode"]; ?></span>
      <a href="index.php" style="color: white; padding-left: 15px;">Go to index page</a>
      <ul class="nav nav-pills nav-stacked">
  </ul>
    </div>
  </div>


<?php  if (isset($_SESSION['username'])) : ?>
		<div class="logoutLblPos">
    	<p> <a href="index.php?logout='1'" style="color: white;"><h3>Log Out</h3></a> </p>
    	</div>
<?php endif ?>

<div class="table">

</div>

<?php

	if(mysqli_num_rows($res) > 0)
	{
			while($row = mysqli_fetch_assoc($res))
			{

				echo
				"
		  <div class='container res'>
      	   <tbody>
		    <tr>
		     	<h3>TA INFORMATION:</h3>
		  <strong>Description:&nbsp&nbsp</strong><td>".$row['description']."</td>
		  <br>
		  <strong>Comment:&nbsp&nbsp</strong><td>".$row['comment']."</td>
		  <br>
		  <strong>Overall Experience:&nbsp&nbsp</strong><td>".$row['experience']."</td>
		  <br>
		  
		    </tr>

		    <br>
		    <br>


		    <tr>
		    <h3>REVIEWER INFORMATION:</h3>
		  <strong>Name:&nbsp&nbsp</strong><td>".$row['name']."</td>
		  <br>
		  <strong>Email:&nbsp&nbsp</strong><td>".$row['email']."</td>
		  <br>
		  <strong>Phone:&nbsp&nbsp</strong><td>".$row['pno']."</td>
		  <br>
		 <strong>Submitted Time:&nbsp&nbsp</strong><td>".$row['time_stamp']."</td>
		    </tr>

		    </tbody>
		 

		
		  <br>
		  <br>
		  
		  </div>";
		
	}
}

?>

<p  style="margin-top: 25px;" ><a href="index.php" style="color: blue; padding-left: 15px;">Go to index page</a></p>

</body>
</html>