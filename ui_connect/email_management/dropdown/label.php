<?php
$link = mysqli_connect('localhost', 'root' , 'Ag5509066', 'urr_dbv');/*DB connection*/
?>
<!DOCTYPE html>
<html>
    
    <head>
        <script src="script.js"></script>
        
        
    </head>
<body>
    
    <?php
   
    
    //Get all country data
    $query = mysqli_query($link, "SELECT * FROM student_type");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="type" id="type">
        <option value="">Select Type</option>        
		<?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['type_id'].'">'.$row['type_name'].'</option>';
            }
        }else{
            echo '<option value="">Type not available</option>';
        }
        ?>
    </select>
    
    <input type="text" name="name" id="showoption" disabled="disabled" value="Status" />      
   
<script>
    $(document).ready( function ()
{
  /* we are assigning change event handler for select box */
	/* it will run when selectbox options are changed */
	$('#type').change(function()
	{
		/* setting currently changed option value to option variable */
		var option = $(this).val();
		/* setting input box value to selected option value */
		$('#showoption').val(option);
	});
});
    
</script> 
    
    
</body> 

</html>