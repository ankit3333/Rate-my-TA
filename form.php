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




       $course = $_POST['course'];

       $TAname = $_POST['TAname'];

       $description = $_POST['description'];


       $comment = $_POST["comment"];

       $name = $_POST["name"];

       $email=$_POST["email"];

       $pno=$_POST["pno"];

      $experience=$_POST["experience"];

       $query = "INSERT INTO TA_Rating(course,TAname,description,experience,comment,name,email,pno) VALUES ('$course','$TAname','$description','$experience','$comment','$name','$email','$pno')";






      if(!mysqli_query($conn,$query)){
        
        echo "Not inserted into databse";
        
      }
      else{
        echo "Your form was submitted successfully";
      }




   
  header("url=sprint2.php");
?>

