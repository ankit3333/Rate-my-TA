<?php
 //Database credentials
 $dbHost     = 'tethys.cse.buffalo.edu';
 $dbUsername = 'ankitner';
 $dbPassword = 'ChangeMe';
 $dbName     = 'cse442_542_2018_summer_team04_db';

 //Connect and select the database
 $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

 if ($db->connect_error) {
     die("Connection failed: " . $db->connect_error);
 }
 ?>
