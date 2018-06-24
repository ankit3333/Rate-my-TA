<!DOCTYPE html>
<html lang="en">
<head>
  <title>TA Review</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <!-- Linking custom JS file for this page  -->
  <script src ="Prof_Panel2.js" type="text/javascript"></script>
  <style>
    #addCourse{
      display: none;
    }
    .course{
      background-color:grey;
      border-style: solid;
      padding-left: 10px;
      color: black;

    }
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}

    /* Set gray background color and 100% height */

    .sidenav {
      background-color: rgba(0,91,187,0.9);
      width: 100%;
      border-bottom: 1px solid rgba(0,0,0,0.9);
      color: white;

    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
  </style>
</head>
<body>
  <!-- HEADER -->
  <div class="cointainer-fluid">
    <div class="col-sm-3 sidenav">
    <h4>Admin: TA Review</h4>
    <ul class="nav nav-pills ">
      <!-- <li class="active"><a href="#section1">Home</a></li> -->
      <li><button type="button" class="btn btn-primary" onclick="addTA()">Add Course</button></li>
      <!-- <li><button type="button" class="btn btn-primary" onclick="logout()">Logout</button></li> -->
    </ul><br>
    </div>
  </div>


<div class="container">
  <div class="row content">
    <div class="col-sm-9" id= "addCourse">
      <h4>Add TA</h4>

        <div class="form-group">
          <label for="exampleInputPassword1">Course</label>
          <input type="text" class="form-control" id="exampleCourseInput" placeholder="EX. CSE 116" name="course" required>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Full Name of TA</label>
          <input type="text" class="form-control" id="exampleNameInput" placeholder="EX. Nick" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary" id= "btnSubmit" name="submit">Submit</button>
    </div>





  <div class=" col-sm-9 dropdown">
    <h4>DashBoard</h4>
    <div class="container text-center">
      <div class="row" id ="dashboard">


      </div>  <!-- END OF ROW -->

    </div>
</div>




  </div>

</div>


<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
