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
  <script src ="Student_Panel.js" type="text/javascript"></script>

  <!-- Google recaptcha -->
  <script src='https://www.google.com/recaptcha/api.js'></script>

  <style>
    html,body {padding:0;margin:0;}
    .rate{
      font: 14px Arial;
    }
    label{
        font: 20px Arial;
    }


/* .wrap {
  font:12px Arial, san-serif;
} */
h1.likert-header {
  padding-left:4.25%;
  margin:20px 0 0;
}
form .statement {
  display:block;
  font-size: 20px Arial;
  font-weight: bold;
  padding: 30px 0 0 4.25%;
  margin-bottom:10px;
}
form .likert {
  list-style:none;
  width:100%;
  margin:0;
  padding:0 0 35px;
  display:block;
  border-bottom:2px solid #efefef;
}
form .likert:last-of-type {border-bottom:0;}
form .likert:before {
  content: '';
  position:relative;
  top:11px;
  left:9.5%;
  display:block;
  background-color:#efefef;
  height:4px;
  width:78%;
}
form .likert li {
  display:inline-block;
  width:19%;
  text-align:center;
  vertical-align: top;
}
form .likert li input[type=radio] {
  display:block;
  position:relative;
  top:0;
  left:50%;
  margin-left:-6px;
}
form .likert li label {width:100%;}
form .buttons {
  margin:30px 0;
  padding:0 4.25%;
  text-align:right
}
form .buttons button {
  padding: 5px 10px;
  background-color: #67ab49;
  border: 0;
  border-radius: 3px;
}
form .buttons .clear {background-color: #e9e9e9;}
form .buttons .submit {background-color: #67ab49;}
form .buttons .clear:hover {background-color: #ccc;}
form .buttons .submit:hover {background-color: #14892c;}
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
      background-color: grey;
      width: 100%;
      border-bottom: 1px solid rgba(0,0,0,0.9);
      color: white;
    }
    .dropdown-menu{
      width: 70%
      height: 30%
    }
     #myTA1, #myTA2, #myTA3, #myTA4{
      display: none;
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



 <script>
 //global variable
//works="true";
function populate(s1,s2){
 var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";
 /*
 if(s1.value =="Select One"|| s1.value=="" || s2.value=="Select One" || s2.value==""){
works="false";
}
*/


  if(s1.value == "CSE 116"){
    var optionArray = ["|","unknown|Unknown","nick|Nick","jay|Jay"];
  } else if(s1.value == "CSE 442"){
    var optionArray = ["|","unknown|Unknown","sean|Sean","tiffany|Tiffany"];
  }

  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
  }
  function myFunction() {
      var checkBox = document.getElementById("myCheck");
      var div1 = document.getElementById("des");
      if (checkBox.checked == true){
        div1.style.display = "block";
      } else {
        div1.style.display = "none";
      }
      }
     
     

  <!-- Checks to see if course and TA were selected  confirmation message if true, error message otherwise not working -->

function confirmation(){
  alert("Your feedback was submitted successfully");
    return true;

  }
/*
  function confirmation(){
if(works=="false"){
alert("Please fill out all required forms");
}
 if(works=="true"){
  alert("Your feedback was submitted successfully");
    return true;

  }
}
  */

</script>
</head>


<body>
  <div class="cointainer-fluid">
    <div class="col-sm-3 sidenav">
      <h2>TA Review</h2>
      <ul class="nav nav-pills nav-stacked">
    </div>
  </div>

<div class="container" style="padding-left: 10%">
  <div class="row content">
    <!-- <div class="col-sm-3 sidenav">
      <h2>TA Review</h2>
      <ul class="nav nav-pills nav-stacked">
    </div> -->



    <div class="col-sm-9">
      <br>
      <h2>Feedback Form</h2>
 <hr>


      <form action="form.php" method="post">

         <label>Select Course:</label>

         <select required id="course" name="course" onchange="populate(this.id,'TAname')">

         <option value="">Select One</option>

         <option value="CSE 116">CSE 116</option>

         <option value="CSE 442">CSE 442</option>
</select>

         <br>
         <br>

         <label >Select Teaching Assistant:</label>



         <select required id="TAname" name="TAname" >

          <option value="">Select One</option>

         </select>
</br>
</br>
Select the box if you does not know TA's name and willing to leave a descrption :  <input type="checkbox" id="myCheck"  onclick="myFunction()">
         <div id="des" class="form-group">
          <label for="exampleTextarea">TA Description</label>
          <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Enter your description here" name="description"></textarea>
        </div>


      <div class="wrap">

          <label class="statement">Your overall experince with TA:</label>

          <ul class='likert'>
            <li>
              <input required type="radio" name="experience" value="Excellent">
              <label class="rate">Excellent</label>
            </li>
            <li>
              <input required type="radio" name="experience" value="Good">
              <label class="rate">Good</label>
            </li>

            <li>
              <input required type="radio" name="experience" value="Fair">
              <label class="rate">Fair</label>
            </li>
            <li>
              <input required type="radio" name="experience" value="Poor">
              <label class="rate">Poor</label>
            </li>
          </ul>
          <hr>
      </div>



      <br>

        <div class="form-group">
          <label for="exampleTextarea">Comments</label>
          <textarea required input type="text"  class="form-control" id="exampleTextarea" rows="3" placeholder="Enter your comments here" name="comment"></textarea>
        </div>

        <br>

        <div id="div1"  class="form-group">
          <label >Name (Optional)</label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" name="name">
        </div>

        <br>

        <div id="div2" class="form-group">
          <label >Email address (Optional)</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>

        <br>

        <div id="div2" class="form-group">
          <label >Phone Number (Optional)</label>
          <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number" name="pno">
        </div>

        <br>

             <button  type="submit"  class="btn btn-primary" >Submit</button>


      </form>
      <hr>
    </div>

  </div>


</div>
<div class="cointainer-fluid" style="background-color: grey; height: 40%;">

    <h4 style="text-align: center;">Proudly Created By CodeBusters</h4>

</div>


</body>
</html>
