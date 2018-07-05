<?php include('connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Login</title>
    <style type="text/css">
      
      .container{
        margin-top: 150px;
      }

 .sidenav {
    background-color: rgba(0,91,187,0.9);
    width: 100%;
    border-bottom: 1px solid rgba(0,0,0,0.9);
    color: white;
    position:fixed;
    top:0;
}
    </style>
</head>

<body>

<div class="cointainer-fluid">
    <div class="col-sm-3 sidenav">
      <h2>TA Review</h2>
      <ul class="nav nav-pills nav-stacked">
    </div>
  </div>

<div class="container">
<div class="row">
            <h1 style="text-align: center;">Login</h1>
            <div style="width: 30%; margin: 25px auto;">
  
<form method="post" action="login.php">

 <div class="text-danger text-center"> <?php include('errors.php'); ?> </div>

  <div class="form-group">
    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Enter your username">
  </div>

  <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Enter your password">
  </div>

  <div class="form-group">
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
  </div>

</form>

</div>
</div>
</div>
</body>