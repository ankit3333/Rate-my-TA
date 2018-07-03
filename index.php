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

  <style type="text/css">

    .container{
          margin-top: 100px;
        }

    .sidenav {
      background-color: rgba(0,91,187,0.9);
      width: 100%;
      border-bottom: 1px solid rgba(0,0,0,0.9);
      color: white;
      position:fixed;
      top:0;
    }
    #name{
      color: white;
    }
    #Logout-Btn{

    }
  </style>
</head>
<body>

<div class="container-fluid sidenav">
  <div class="cointainer">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="#"><h2 id = "name">TA Review</h2></a>

      <button type="button" class="btn btn-info btn-md pull-right" id = "Logout-Btn">
        <a href="index.php?logout='1'" style="color: blue;">  <span class="glyphicon glyphicon-user"></span> Logout</a>

    </button>
    </nav>

  </div>

</div>


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
    	<h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h2>

    <?php endif ?>

<h3>Course Code:</h3>

<h4>



	<?php

  $coursecode = $row["coursecode"];

	if(mysqli_num_rows($result) > 0)
	{
			while($row = mysqli_fetch_array($result))
			{

				echo $row["coursecode"];
	}
}
	?>
</h4>
<hr>



<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="70%">TA Name</th>
		</tr>
	<?php

	if(mysqli_num_rows($res)>0){
		while($row1=mysqli_fetch_array($res)){

  $coursecode = $row1["coursecode"];

		$TAname = $row1["TAname"];
	echo '<tr><td><a href="select.php?TAname='.$TAname.'&coursecode='.$coursecode.'">'.$TAname.'</a><br /></td></tr>';
		}
		}else{
			 echo "No rows to display";
		}
	?>

</table>
</div>
</div>
</div>
</body>
</html>
