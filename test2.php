<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#country').on('change',function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'POST',
                    url:'ajaxData2.php',
                    data:'country_id='+countryID,
                    success:function(html){
                        $('#state').html(html);
                        $('#city').html('<option value="">Select state first</option>');
                    }
                });
            }else{
                $('#state').html('<option value="">Select country first</option>');
                $('#city').html('<option value="">Select state first</option>');
            }
        });

        $('#state').on('change',function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    type:'POST',
                    url:'ajaxData2.php',
                    data:'state_id='+stateID,
                    success:function(html){
                        $('#city').html(html);
                    }
                });
            }else{
                $('#city').html('<option value="">Select state first</option>');
            }
        });
    });
    </script>
  </head>
  <body>
    <?php
    //Include the database configuration file
    include 'dbConfig.php';

    //Fetch all the country data
    $query = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select id="country">
        <option value="">Select Country</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
            }
        }else{
            echo '<option value="">Country not available</option>';
        }
        ?>
    </select>

    <select id="state">
        <option value="">Select country first</option>
    </select>

    <select id="city">
        <option value="">Select state first</option>
    </select>

  </body>
</html>
