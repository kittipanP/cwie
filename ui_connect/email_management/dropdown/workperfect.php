<?php
$link = mysqli_connect('localhost', 'root' , 'Ag5509066', 'urr_dbv');/*DB connection*/

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <script src="../../../libs/js/jquery.min.js"></script>
<script type="text/javascript">
    //type shows status
$(document).ready(function(){ 
    $('#type').on('change',function(){
        var typeID = $(this).val();
        if(typeID){
            $.ajax({
                type:'POST',
                url:'ajaxDatawork.php',
                data:'type_id='+typeID,
                success:function(html){
                    $('#status').html(html);
                    $('#id').html('<option value="">Select Status first</option>'); 
                }
            }); 
        }else{
            //$('#status').html('<option value="">Select Type first</option>');
            //$('#id').html('<option value="">Select Status first</option>'); 
        }
    });
    //Status show id
    $('#status').on('change',function(){
        var statusID = $(this).val();
        if(statusID){
            $.ajax({
                type:'POST',
                url:'ajaxDatawork.php',
                data:'status_id='+statusID,
                success:function(html){
                    $('#id').html(html);
                }
            }); 
        }else{
           // $('#id').html('<option value="">Select Status first</option>'); 
        }
    });
    //ID show names
    $('#id').on('change',function(){
        var idId = $(this).val();
        if(idId){
            $.ajax({
                type:'POST',
                url:'ajaxDatawork.php',
                data:'trainee_id='+idId,
                success:function(html){
                    $('#fname').html(html);
                }
            }); 
        }else{
           // $('#id').html('<option value="">Select Status first</option>'); 
        }
    });
    
 
});
</script>
</head>
<body>
    
</body>
</html>

