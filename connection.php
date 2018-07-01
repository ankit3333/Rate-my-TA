<?php 

session_start();

$servername = "tethys.cse.buffalo.edu";
$username = "ankitner";
$password = "ChangeMe";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!mysqli_select_db($conn,'cse442_542_2018_summer_team04_db')){
  echo 'Database not selected';
}


$username = "";
$password = "";
$coursecode = "";
$errors = array();

if(isset($_POST['register'])){

		$username = mysqli_real_escape_string($conn,$_POST['username']);	
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$coursecode = mysqli_real_escape_string($conn,$_POST['coursecode']);

	if(empty($username)){

		array_push($errors, "Username is required");
	}

	if(empty($password)){

		array_push($errors, "Password is required");
	}

	if(empty($coursecode)){

		array_push($errors, "Course code is required");
	}

	$user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";

	  $result = mysqli_query($conn, $user_check_query);
	  $user = mysqli_fetch_assoc($result);
	  
	  if ($user) { // if user exists
	    if ($user['username'] === $username) {
	      array_push($errors, "Username already exists");
	    }
	  }


	if(count($errors) == 0){

		$password = md5(md5($password));

		$sql = "INSERT INTO users(username,password,coursecode) VALUES ('$username','$password','$coursecode')";

		mysqli_query($conn, $sql);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You have logged in successfully!";
		header('location: index.php');

	}
}


if(isset($_POST['login'])){

		$username = mysqli_real_escape_string($conn,$_POST['username']);	
		$password = mysqli_real_escape_string($conn,$_POST['password']);




	if(empty($username)){

		array_push($errors, "Username is required");
	}

	if(empty($password)){

		array_push($errors, "Password is required");
	}

	if(count($errors) == 0){

		$password =md5(md5($password));
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$res = mysqli_query($conn,$query);

		if(mysqli_num_rows($res) == 1){

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You have logged in successfully!";
		header('location: index.php');
		}else{

			array_push($errors, "Your credentials do not match");
		}

	}


}




if(isset($_GET['logout'])){

	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');

}



?>