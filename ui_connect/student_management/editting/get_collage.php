<?php
//require_once("dbcontroller.php");
//$db_handle = new DBController();
if(!empty($_POST["ins_idii"])) {
	//$query ="SELECT * FROM intitute_type WHERE intitute_id = '" . $_POST["ins_idii"] . "'";
	$results = $db_handle->runQuery($query);
?>  
	
   	<?php if($_POST["ins_idii"]=='1'){?>
    <option value="">Cannot Select Collage!!!!</option>
    <?php }elseif($_POST["ins_idii"]=='2'){?> 
    <option value="">Select Collage</option>
    <?php
	do {  
	?>
	  <option value="<?php echo $row_collageSet['collage_id']?>"><?php echo $row_collageSet['collage_name']?></option>
	  <?php
	} while ($row_collageSet = mysqli_fetch_assoc($collageSet));
	  $rows = mysqli_num_rows($collageSet);
	  if($rows > 0) {
		  mysqli_data_seek($collageSet, 0);
		  $row_collageSet = mysqli_fetch_assoc($collageSet);
	  }
	?>
    
    <?php }
} ?>







