<?php

//GETS TA INFO FROM TA DATABASE USING COURSECODE
if(isset($_GET["Courses"]))
{
	require "opendb.php";

	
	
$Courses=$_GET["Courses"];	


//TA DATABASE	
$query="SELECT TA.TAname FROM TA 
WHERE TA.coursecode LIKE '{$Courses}'";

//TAs DATABASE
/*
$query ="SELECT TAs.name FROM TAs
INNER JOIN Courses ON
TAs.course_id=Courses.id
WHERE Courses.name LIKE '{$Courses}' ";
*/


$data = mysqli_query($conn, $query);
$TA= array();

while($row=mysqli_fetch_array($data))
{
	array_push($TA, $row["TAname"]);	
}

echo json_encode($TA);

require "closedb.php";
}


 ?>
