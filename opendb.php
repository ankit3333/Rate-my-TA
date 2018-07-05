<?php
//opens database connection
require "dbconfig.php";

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword) or die("Could not connect");
mysqli_select_db($conn, $dbName);
 ?>
