// function showBtn(){
//   var course = document.getElementById("exampleCourseInput").value;
//   var ta = document.getElementById("exampleNameInput").value;
//   if(course.length>0 && ta.length>0){
//
//       console.log("EMPTY");
//   }
// }


// Function to add TA upon clicking button and store into database
function addTA() {
  // Get the form
   var form = document.getElementById("addCourse");
   if (form.style.display == "none"){
     form.style.display = "block";

   } else {
     form.style.display = "none";

   }

}


//Function to review Feedback
function getFeedback() {

}






//Function to Logout
function logout() {


    // ADDING EDIT OPTION
    // var txt2 = document.createElement("button");
    // $(txt2).addClass("btn btn-secondary");
    // txt2.innerHTML = "Edit" + txt2;;
    // txt3.innerHTML += txt2;

    //Create an input type dynamically.
  // var element = document.createElement("input");
  //
  // //Assign different attributes to the element.
  // element.setAttribute("type", type);
  // element.setAttribute("value", type);
  // element.setAttribute("name", type);
  //
  //
  // //Append the element in page (in span).
  // dashboard.appendChild(element);

}

function createModal(data){
  var dashboard = document.getElementById("dashboard"); // Get DOM element
  // var txt3 = document.createElement("div");  // Create element with DOM
  // $(txt3).addClass("col-sm-4 course"); // Add styling class to div
  // txt3.innerHTML = data; // Add text inside div

  var link = document.createElement("a");
  $(link).addClass("col-sm-4 course");
  link.setAttribute("href","http://www-student.cse.buffalo.edu/CSE442-542/2018-Summer/team04/sprint3/reviews.php");
  link.innerHTML = data;

  //Create an input type dynamically.
// var element = document.createElement("input");
//
// //Assign different attributes to the element.
// element.setAttribute("type", type);
// element.setAttribute("value", type);
// element.setAttribute("name", type);
//
//
// //Append the element in page (in span).
// dashboard.appendChild(element);

  $(dashboard).after(link); // Insert txt3 after id =  dashboard in DOM

}


// Function to post add Course form with AJAX
$(document).ready(function () {
    $('#btnSubmit').click(function(){
      var course = document.getElementById("exampleCourseInput").value;
      var ta = document.getElementById("exampleNameInput").value;
      if (course.length<= 0 ){
        alert("Enter Course");
          return false;
      }
      if (ta.length<= 0){
        alert("Enter TA name");
          return false;
      }
      $.post("addCourseForm.php", //action to post to

        {course: $('#exampleCourseInput').val(), name: $('#exampleNameInput').val()}, //data to post

        function(data){ //function to do after post
          createModal(data);


          // $('#response').html(data);

        }
      );
    });

});


//Function to get profile image and store it
