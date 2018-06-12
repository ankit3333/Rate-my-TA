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


$query1 = "SELECT  `coursenumber` FROM `coursecode`";


$result = mysqli_query($conn,$query1);


       $course = $_POST['course'];

       $TAname = $_POST['TAname'];

       $description = $_POST['description'];


       $comment = $_POST["comment"];

       $name = $_POST["name"];

       $email=$_POST["email"];

       $pno=$_POST["pno"];

       $first=$_POST["first"];

       $second=$_POST["second"];

       $third=$_POST["third"];

       $fourth=$_POST["fourth"];

       $fifth=$_POST["fifth"];


       $query = "INSERT INTO TA_Rating(course,TAname,description,comment,name,email,pno,first,second,third,fourth,fifth) VALUES ('$course','$TAname','$description','$comment','$name','$email','$pno','$first','$second','$third','$fourth','$fifth')";






      if(!mysqli_query($conn,$query)){
        
        echo "Not inserted into databse";
        
      }
      else{
        echo "Inserted a new row in database";
      }
   
  header("refresh:2,url=Student_Panel.php");
?>

