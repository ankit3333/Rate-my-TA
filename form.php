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

       $course = mysqli_real_escape_string($conn,  $_POST['course']);
       $TAname =  mysqli_real_escape_string($conn, $_POST['TAname']);
       $description =  mysqli_real_escape_string($conn, $_POST['description']);
       $comment =  mysqli_real_escape_string($conn, $_POST["comment"]);
       $name =  mysqli_real_escape_string($conn, $_POST["name"]);
       $email= mysqli_real_escape_string($conn, $_POST["email"]);
       $pno= mysqli_real_escape_string($conn, $_POST["pno"]);
       $experience=mysqli_real_escape_string($conn,$_POST["experience"]);

       $query = "INSERT INTO TA_Rating(course,TAname,description,experience,comment,name,email,pno) VALUES ('$course','$TAname','$description','$experience','$comment','$name','$email','$pno' )";

      if(!mysqli_query($conn,$query)){

        echo "Not inserted into databse";

      }
      else{
        header("Location:submission.php");
        die();
      }

  header("url=Student_Panel.php");
?>