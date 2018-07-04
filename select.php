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
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>TA Feedback</title>
  <style media="screen">
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
    #feedback{
      padding-top: 5%;
    }
    #name{
      color: white;
    }
    #Logout-Btn{
      position: relative;
      top: 5%;
    }
  </style>
  </style>
</head>
<body>

  <div class="container-fluid sidenav">
    <div class="cointainer">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <a class="navbar-brand" href="index.php"><h2 id = "name">TA Review</h2></a>

        <button type="button" class="btn btn-info btn-md pull-right" id = "Logout-Btn">
          <a href="index.php?logout='1'" style="color: blue;">  <span class="glyphicon glyphicon-user"></span> Logout</a>

      </button>
      </nav>

    </div>

  </div>
  <div class="cointainer" id="feedback">
    <?php  if (isset($_SESSION['username'])) : ?>


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

  </div>




</body>
</html>
