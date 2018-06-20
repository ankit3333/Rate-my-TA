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


       $course = mysqli_real_escape_string($conn,  $_POST['course']);

       $TAname =  mysqli_real_escape_string($conn, $_POST['TAname']);

       $description =  mysqli_real_escape_string($conn, $_POST['description']);


       $comment =  mysqli_real_escape_string($conn, $_POST["comment"]);

       $name =  mysqli_real_escape_string($conn, $_POST["name"]);

       $email= mysqli_real_escape_string($conn, $_POST["email"]);

       $pno= mysqli_real_escape_string($conn, $_POST["pno"]);

       $experience= mysqli_real_escape_string($conn, $_POST["experience"]);


       $query = "INSERT INTO TA_Rating(course,TAname,description,experience,comment,name,email,pno) VALUES (?, ?, ?, ?, ?, ? , ? , ? );";

      $stmt= mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $query)){
        echo "SQL Error";

      }
      else{
        mysqli_stmt_bind_parm($stmt, "ssssssss", $course, $TAname, $description, $experience, $comment, $name, $email, $pno);
        mysqli_stmt_execute($stmt);
        echo "Inserted a new row in database" ;
      }





      //if(!mysqli_query($conn,$query)){
        
       // echo "Not inserted into databse";
        
      //}
      //else{
       // echo "Inserted a new row in database";
     // }
   
  header("refresh:2,url=Student_Panel.php");
?>
