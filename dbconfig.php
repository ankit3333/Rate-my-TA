  <?php

 //Define your host here.
 $hostname = "tethys.cse.buffalo.edu";

 //Define your database username here.
 $username = "ankitner";

 //Define your database password here.
 $password = "ChangeMe";

 //Define your database name here.
 $dbname = "cse442_542_2018_summer_team04_db";

  $conn = mysql_connect($hostname, $username, $password);

  if (!$conn)

  {

  die('Could not connect: ' . mysql_error());

  }

  mysql_select_db($dbname, $conn);



 ?>
