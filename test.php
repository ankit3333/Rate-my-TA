<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#professor').on('change',function(){
        var professorID = $(this).val();
        if(professorID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'professor='+professorID,
                function(data){
                    $('#coursecode').html(data);

                }
            });
        }else{
            $('#coursecode').html('<option value="">"Select course first"</option>');

        }
    });

});


</script>
<script type="text/javascript">
function slected_Value(id) {
  var element = document.getElementById(id);
  var value = element.options[element.selectedIndex].text;
  return value
}

</script>
</head>

<body>


<?php
include 'dbconfig.php';

$subjectProfessor = "SELECT professor FROM course";
// Need to change professor name dynamically inorder to get right courses
$subjectCourse = "SELECT coursecode FROM course WHERE professor= 'HERTZ'";

$subject = mysql_query( $subjectCourse, $conn );
$professor = mysql_query( $subjectProfessor, $conn );
?>
<h2> TA Review </h2>

<!-- <form method="post" action="feedbackform.php"> -->

<label >Feedback</label>

<select name="professor" id="professor">

  <option>---Select Professor---</option>

  <?php while($subjectData = mysql_fetch_array($professor)){ ?>

  <option value="<?php echo $subjectData['professor'];?>"> <?php echo $subjectData[0];?>

  </option>

  <?php }?>

</select>

<select name="coursecode" id="coursecode">

  <option>---Select Course---</option>

  <?php while($subjectData = mysql_fetch_array($subject)){ ?>

  <option value="<?php echo $subjectData['course'];?>"> <?php echo $subjectData[0];?></option>

  <?php }?>

</select>




<!-- </form> -->

</body>
</html>
