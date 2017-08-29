
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string(dbconnect(), $theValue) : mysqli_escape_string(dbconnect(), $theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


require_once('../../../Connections/MyConnect.php');
    $maxRows_spvforMain = 100;
    $pageNum_spvforMain = 0;
    if (isset($_GET['pageNum_spvforMain'])) {
      $pageNum_spvforMain = $_GET['pageNum_spvforMain'];
    }
    $startRow_spvforMain = $pageNum_spvforMain * $maxRows_spvforMain;
    
    mysqli_select_db($MyConnect, $database_MyConnect);
      $query_spvforMaain = "SELECT spv_fname, spv_lname, spv_job, spv_email, spv_ext, spv_mobile, department_info.dep_name FROM supervisor_info
      INNER JOIN department_info ON department_info.dep_id = supervisor_info.spv_dept
      ORDER BY supervisor_info.spv_id DESC";
    $query_limit_spvforMain = sprintf("%s LIMIT %d, %d", $query_spvforMaain, $startRow_spvforMain, $maxRows_spvforMain);
    $stuSet_spvforMain = mysqli_query($MyConnect, $query_limit_spvforMain) or die(mysqli_error());
    $row_spvforMain = mysqli_fetch_assoc($stuSet_spvforMain);
    
    if (isset($_GET['totalRows_spvforMain'])) {
      $totalRows_spvforMain = $_GET['totalRows_spvforMain'];
    } else {
      $all_stuSet_spvforMain = mysqli_query(dbconnect(), $query_spvforMaain);
      $totalRows_spvforMain = mysqli_num_rows($all_stuSet_spvforMain);
    }
    $totalPages_stuSet_spvforMain = ceil($totalRows_spvforMain/$maxRows_spvforMain)-1;
    
    $queryString_stuSet_spvforMain = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
      if (stristr($param, "pageNum_spvforMain") == false && 
        stristr($param, "totalRows_spvforMain") == false) {
        array_push($newParams, $param);
      }
      }
      if (count($newParams) != 0) {
      $queryString_stuSet_spvforMain = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_stuSet_spvforMain = sprintf("&totalRows_spvforMain=%d%s", $totalRows_spvforMain, $queryString_stuSet_spvforMain);
?>


<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="">


                  <!-- Add Suppervisor -->
                  <div align="right">
                      <a onclick="document.getElementById('spv-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Suppervisor</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>
                  </div>


                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="spvInput" onkeyup="spvKey()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="spvTable">
                        <tr>
                          
                          <th style="width:3%;">No</th>
                          <th style="width:10%;">First Name</th>
                          <th style="width:10%;">Last Name</th>
                          <th style="width:10%;">Position</th>
                          <th style="width:30%;">E-mail</th>
                          <th style="width:7%;">Ext.</th>
                          <th style="width:10%;">Mobile</th>
                          <th style="width:10%;">Department</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td>No</td>
                              <td><?php echo $row_spvforMain['spv_fname']; ?></td>
                              <td><?php echo $row_spvforMain['spv_lname']; ?></td>
                              <td><?php echo $row_spvforMain['spv_job']; ?></td>
                              <td><?php echo $row_spvforMain['spv_email']; ?></td>
                              <td><?php echo $row_spvforMain['spv_ext']; ?></td>
                              <td><?php echo $row_spvforMain['spv_mobile']; ?></td>
                              <td><?php echo $row_spvforMain['dep_name']; ?></td>
                              <td><a class="btn btn-default w3-hover-blue" href="../main-connect-ui/stu-update-all.php?spv_id=<?php echo $row_spvforMain['spv_id']; ?>"><i class="fa fa-pencil"></i></a></td>
                              <td><a  class="btn btn-default w3-hover-red" id="delete_product" data-id="<?php echo $row_spvforMain['spv_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash "></i></a></td>
                              <!--
                              <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $product_id; ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
                              -->
                            </tr> 
                        <?php } while ($row_spvforMain = mysqli_fetch_assoc($stuSet_spvforMain)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_spvforMain=%d%s", $currentPage, 0, $queryString_stuSet_spvforMain); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($spvforMain_page=0;$spvforMain_page<=$totalPages_stuSet_spvforMain;$spvforMain_page++){
                                echo '<a href="?pageNum_spvforMain=',$spvforMain_page,'">',($spvforMain_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_spvforMain=%d%s", $currentPage, $totalPages_stuSet_spvforMain, $queryString_stuSet_spvforMain); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

</div>        
        
    <script>

    function spvKey() {
      var input, filter, table, tr, td, i,j;
      input = document.getElementById("spvInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("spvTable");
      tr = table.getElementsByTagName("tr");
      
      
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          } else {
          tr[i].style.display = "none";
          }
        }
        }
      
    }
  </script> 

<!--
<?php
//mysqli_free_result($stuSet_spvforMain);
?> -->
