<?php
$link = mysqli_connect('localhost', 'root' , 'Ag5509066', 'urr_dbv');/*DB connection*/

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script src="jquery.min.js"></script>
<script type="text/javascript">
    //type shows status
$(document).ready(function(){
    $('#type').on('change',function(){
        var typeID = $(this).val();
        if(typeID){
            $.ajax({
                type:'POST',
                url:'ajaxDataworkV2.php',
                data:'type_id='+typeID,
                success:function(html){
                    $('#status').html(html);
                    $('#id').html('<option value="">Select Status first</option>'); 
                }
            }); 
        }else{
            $('#status').html('<option value="">Select Type first</option>');
            $('#id').html('<option value="">Select Status first</option>'); 
        }
    });
    //Status show id
    $('#status').on('change',function(){
        var statusID = $(this).val();
        if(statusID){
            $.ajax({
                type:'POST',
                url:'ajaxDataworkV2.php',
                data:'status_id='+statusID,
                success:function(html){
                    $('#id').html(html);
                }
            }); 
        }else{
          $('#id').html('<option value="">Select Status first</option>'); 
        }
    });
    //ID show names
    $('#id').on('change',function(){
        var idId = $(this).val();
        if(idId){
            $.ajax({
                type:'POST',
                url:'ajaxDataworkV2.php',
                data:'s_id='+idId,
                success:function(html){
                    $('#fname').html(html);
                }
            }); 
        }else{
          $('#id').html('<option value="">Select Status first</option>'); 
        }
    });
    
    $('#id').on('change',function(){
        var idId = $(this).val();
        if(idId){
            $.ajax({
                type:'POST',
                url:'ajaxDataworkV2.php',
                data:'s_id='+idId,
                success:function(html){
                    $('#lname').html(html);
                }
            }); 
        }else{
          $('#id').html('<option value="">Select Status first</option>'); 
        }
    });
    
});
</script>
</head>
<body>
    <div class="select-boxes">
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
    
    <select name="status" id="status">
        <option value="">Select Status</option>
    </select>
        
    
    <select name="id" id="id">
        <option value="">Select ID</option>
    </select>
        
   
      <input type="text" name="name" id="fname" disabled="disabled"  value= "First Name"/>      
   
<!--<select name="fname" id="fname">
        <option value="">First Name</option>
    </select>-->
        
    <select name="lname" id="lname">
        <option value="">Last Name</option>
    </select>    
    </div>
</body>
</html>

