
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
    $maxRows_depforMain = 100;
    $pageNum_depforMain = 0;
    if (isset($_GET['pageNum_depforMain'])) {
      $pageNum_depforMain = $_GET['pageNum_depforMain'];
    }
    $startRow_depforMain = $pageNum_depforMain * $maxRows_depforMain;
    
    mysqli_select_db($MyConnect, $database_MyConnect);
      $query_depforMaain = "SELECT department_info.dep_name, department_info.cost_centre, department_info.dep_ext FROM department_info
      ORDER BY  department_info.dep_id DESC";
    $query_limit_depforMain = sprintf("%s LIMIT %d, %d", $query_depforMaain, $startRow_depforMain, $maxRows_depforMain);
    $stuSet_depforMain = mysqli_query($MyConnect, $query_limit_depforMain) or die(mysqli_error());
    $row_depforMain = mysqli_fetch_assoc($stuSet_depforMain);
    
    if (isset($_GET['totalRows_depforMain'])) {
      $totalRows_depforMain = $_GET['totalRows_depforMain'];
    } else {
      $all_stuSet_depforMain = mysqli_query(dbconnect(), $query_depforMaain);
      $totalRows_depforMain = mysqli_num_rows($all_stuSet_depforMain);
    }
    $totalPages_stuSet_depforMain = ceil($totalRows_depforMain/$maxRows_depforMain)-1;
    
    $queryString_stuSet_depforMain = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
      if (stristr($param, "pageNum_depforMain") == false && 
        stristr($param, "totalRows_depforMain") == false) {
        array_push($newParams, $param);
      }
      }
      if (count($newParams) != 0) {
      $queryString_stuSet_depforMain = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_stuSet_depforMain = sprintf("&totalRows_depforMain=%d%s", $totalRows_depforMain, $queryString_stuSet_depforMain);
?>


<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="">


                  <div align="right">
                      <a onclick="document.getElementById('dep-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Department</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>
                  </div> 

                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="depInput" onkeyup="depKey()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="depTable">
                        <tr>
                          
                          <th style="width:5%;">No</th>
                          <th style="width:65%;">Department Name</th>
                          <th style="width:10%;">Cost Centre</th>
                          <th style="width:10%;">Extention</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td>No</td>
                              <td><?php echo $row_depforMain['dep_name']; ?></td>
                              <td><?php echo $row_depforMain['cost_centre']; ?></td>
                              <td><?php echo $row_depforMain['dep_ext']; ?></td>
                              <td><a class="btn btn-default w3-hover-blue" href="../main-connect-ui/stu-update-all.php?dep_id=<?php echo $row_depforMain['dep_id']; ?>"><i class="fa fa-pencil"></i></a></td>
                              <td><a  class="btn btn-default w3-hover-red" id="delete_product" data-id="<?php echo $row_depforMain['dep_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash "></i></a></td>
                              <!--
                              <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $product_id; ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
                              -->
                            </tr> 
                        <?php } while ($row_depforMain = mysqli_fetch_assoc($stuSet_depforMain)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_depforMain=%d%s", $currentPage, 0, $queryString_stuSet_depforMain); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($depforMain_page=0;$depforMain_page<=$totalPages_stuSet_depforMain;$depforMain_page++){
                                echo '<a href="?pageNum_depforMain=',$depforMain_page,'">',($depforMain_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_depforMain=%d%s", $currentPage, $totalPages_stuSet_depforMain, $queryString_stuSet_depforMain); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

</div>        
        
    <script>

    function depKey() {
      var input, filter, table, tr, td, i,j;
      input = document.getElementById("depInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("depTable");
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
//mysqli_free_result($stuSet_depforMain);
?> -->
