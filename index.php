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
        margin-top: 75px;
      }

     .sidenav {
    background-color: rgba(0,91,187,0.9);
    width: 100%;
    border-bottom: 1px solid rgba(0,0,0,0.9);
    color: white;
    position:fixed;
    top:0;
}

.logoutLblPos{

   position:fixed;
   right:10px;
   top:5px;
}

a..logoutLblPos{
color:#FFF; 
text-decoration:none; 
font-weight:normal;

}

.left{

  padding-left: 115px;
}

  </style>

</head>
<body>
<div class="cointainer-fluid">
    <div class="col-sm-3 sidenav">
      <h2>TA Review</h2>
      <ul class="nav nav-pills nav-stacked">
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
    	<p><h2>Welcome <strong><?php echo $_SESSION['username']; ?>!</strong></h2></p>
      <div class="logoutLblPos">
    <p> <a href="index.php?logout='1'" style="color: white;"><h3>Log Out</h3></a> </p>
    </div>
    <?php endif ?>


<strong>Course Code(s):</strong>

	<?php

  $coursecode = $row["coursecode"];

	if(mysqli_num_rows($result) > 0)
	{
			while($row = mysqli_fetch_array($result))
			{

    ?>

			 <?php echo $row["coursecode"];?>
       <br><span class="left"></span>

  <?php 
	}
}
	?>

<br>
<br>
<br>


<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="70%">TA Name</th>
      <th width="30%">Course Code</th>
    </tr>
	<?php

	if(mysqli_num_rows($res)>0){
		while($row1=mysqli_fetch_array($res)){

   $coursecode = $row1["coursecode"];
  

		$TAname = $row1["TAname"];


	echo '<tr><td><a href="select.php?TAname='.$TAname.'&coursecode='.$coursecode.'">'.$TAname.'</a><br /></td>
        <td>'.$coursecode.'</a><br /></td></tr>';

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

