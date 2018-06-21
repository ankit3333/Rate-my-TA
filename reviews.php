<!DOCTYPE html>
<html>
<head>
	<title>Feedback Information</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="cointainer-fluid">
    <div class="col-sm-3 sidenav">
      <h2>TA Review</h2>
      <ul class="nav nav-pills nav-stacked">
    </div>
  </div>
</body>
</html>







<?php

$servername = "tethys.cse.buffalo.edu";
$username = "ankitner";
$password = "ChangeMe";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!mysqli_select_db($conn,'cse442_542_2018_summer_team04_db')){
  echo 'Database not selected';
}

$query = "SELECT * FROM TA_Rating";

$data = mysqli_query($conn,$query);

$total= mysqli_num_rows($data);


if($total != 0){

?>

<style type="text/css">


/* Create two equal columns that floats next to each other */
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
	margin-top: 60px;
}


</style>



<table class="table">


</table>


<?php

while($result=mysqli_fetch_assoc($data)){

	echo "
		  <div class='container res'>	
      	   <tbody>
		    <tr>
		     	<h3>TA INFORMATION:</h3>
		   <strong>Course:</strong>&nbsp&nbsp<td>".$result['course']."</td>
		   <br>
		  <strong>TA Name:&nbsp&nbsp</strong><td>".$result['TAname']."</td>
		  <br>
		  <strong>Description:&nbsp&nbsp</strong><td>".$result['description']."</td>
		  <br>
		  <strong>Comment:&nbsp&nbsp</strong><td>".$result['comment']."</td>
		  <br>
		  <strong>Overall Experience:&nbsp&nbsp</strong><td>".$result['experience']."</td>
		  <br>
		  
		    </tr>

		    <br>
		    <br>


		    <tr>
		    <h3>REVIEWER INFORMATION:</h3>
		  <strong>Name:&nbsp&nbsp</strong><td>".$result['name']."</td>
		  <br>
		  <strong>Email:&nbsp&nbsp</strong><td>".$result['email']."</td>
		  <br>
		  <strong>Phone:&nbsp&nbsp</strong><td>".$result['pno']."</td>
		 
		    </tr>

		    </tbody>
		 

		
		  <br>
		  <br>
		  </div>";

}
}




else{
 
 	echo "Not Found";
}



?>

