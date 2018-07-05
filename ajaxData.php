<?php
//Include the database configuration file
include 'dbConfig.php';

if(!empty($_POST["professor"])){
    //Fetch all state data
    $query = $db->query("SELECT * FROM course WHERE professor = ".$_POST['professor']." AND status = 1 ORDER BY coursecode ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //State option list
    if($rowCount > 0){
        echo '<option value="">Select course</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['course'].'">'.$row['course'].'</option>';

        }
    }else{
        echo '<option value="">course not available</option>';
    }
}

?>
