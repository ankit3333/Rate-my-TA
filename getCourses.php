<?php
//GETS COURSES FROM TA_Rating DATABASE
require "opendb.php";

$query="SELECT DISTINCT coursecode FROM TA_Rating";
$data= mysqli_query($conn, $query);
$Courses=array();
while($row=mysqli_fetch_array($data)){
	array_push($Courses, $row["coursecode"]);	
}

echo json_encode($Courses);

require "closedb.php";
 ?>
