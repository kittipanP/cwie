<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["ins_id"])) {
  //$query ="SELECT * FROM intitute_type WHERE intitute_id = '" . $_POST["ins_id"] . "'";
  $results = $db_handle->runQuery($query);
?> 
  <?php if($_POST["ins_id"]=='2'){?>
    <option value=""><i class="fa fa-thumbs-up w3-margin-right"></i>Cannot Select University </option>    
    <?php }elseif($_POST["ins_id"]=='1'){?> 
    <option value="">Select University</option>
  <?php
    do {  
    ?>
    <option value="<?php echo htmlentities($row_universitySet['uni_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_universitySet['uni_name']?></option>
    <?php
    } while ($row_universitySet = mysqli_fetch_assoc($universitySet));
      $rows = mysqli_num_rows($universitySet);
      if($rows > 0) {
          mysqli_data_seek($universitySet, 0);
          $row_universitySet = mysqli_fetch_assoc($universitySet);
      }
    ?><?php }else{ ?>
  <option value="">Select Institute Type First</option> 
  <?php }
} ?>







