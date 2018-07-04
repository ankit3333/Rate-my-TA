<?php
//GETS COURSES FROM TA DATABASE
require "opendb.php";

$query="SELECT DISTINCT coursecode FROM TA";
$data= mysqli_query($conn, $query);
$Courses=array();
while($row=mysqli_fetch_array($data)){
	array_push($Courses, $row["coursecode"]);	
}

echo json_encode($Courses);

require "closedb.php";
 ?>
