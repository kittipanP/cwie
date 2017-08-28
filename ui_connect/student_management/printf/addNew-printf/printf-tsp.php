
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
    $maxRows_tspforMain = 100;
    $pageNum_tspforMain = 0;
    if (isset($_GET['pageNum_tspforMain'])) {
      $pageNum_tspforMain = $_GET['pageNum_tspforMain'];
    }
    $startRow_tspforMain = $pageNum_tspforMain * $maxRows_tspforMain;
    
    mysqli_select_db($MyConnect, $database_MyConnect);
      $query_tspforMaain = "SELECT trainee_transportation.transportation_line FROM trainee_transportation
      ORDER BY trainee_transportation.transportation_id DESC";
    $query_limit_tspforMain = sprintf("%s LIMIT %d, %d", $query_tspforMaain, $startRow_tspforMain, $maxRows_tspforMain);
    $stuSet_tspforMain = mysqli_query($MyConnect, $query_limit_tspforMain) or die(mysqli_error());
    $row_tspforMain = mysqli_fetch_assoc($stuSet_tspforMain);
    
    if (isset($_GET['totalRows_tspforMain'])) {
      $totalRows_tspforMain = $_GET['totalRows_tspforMain'];
    } else {
      $all_stuSet_tspforMain = mysqli_query(dbconnect(), $query_tspforMaain);
      $totalRows_tspforMain = mysqli_num_rows($all_stuSet_tspforMain);
    }
    $totalPages_stuSet_tspforMain = ceil($totalRows_tspforMain/$maxRows_tspforMain)-1;
    
    $queryString_stuSet_tspforMain = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
      if (stristr($param, "pageNum_tspforMain") == false && 
        stristr($param, "totalRows_tspforMain") == false) {
        array_push($newParams, $param);
      }
      }
      if (count($newParams) != 0) {
      $queryString_stuSet_tspforMain = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_stuSet_tspforMain = sprintf("&totalRows_tspforMain=%d%s", $totalRows_tspforMain, $queryString_stuSet_tspforMain);
?>


<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="">


                        <div align="right">
                            <a onclick="document.getElementById('tsp-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Transportation Line</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                            </a>
                        </div>

                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="tspInput" onkeyup="tspKey()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="tspTable">
                        <tr>
                          
                          <th style="width:5%;">No</th>
                          <th style="width:85%;">Transportation Line</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td>No</td>
                              <td><?php echo $row_tspforMain['transportation_line']; ?></td>
                              <td><a class="btn btn-default w3-hover-blue" href="../main-connect-ui/stu-update-all.php?tsp_id=<?php echo $row_tspforMain['tsp_id']; ?>"><i class="fa fa-pencil"></i></a></td>
                              <td><a  class="btn btn-default w3-hover-red" id="delete_product" data-id="<?php echo $row_tspforMain['tsp_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash "></i></a></td>
                              <!--
                              <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $product_id; ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
                              -->
                            </tr> 
                        <?php } while ($row_tspforMain = mysqli_fetch_assoc($stuSet_tspforMain)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_tspforMain=%d%s", $currentPage, 0, $queryString_stuSet_tspforMain); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($tspforMain_page=0;$tspforMain_page<=$totalPages_stuSet_tspforMain;$tspforMain_page++){
                                echo '<a href="?pageNum_tspforMain=',$tspforMain_page,'">',($tspforMain_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_tspforMain=%d%s", $currentPage, $totalPages_stuSet_tspforMain, $queryString_stuSet_tspforMain); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

</div>        
        
    <script>

    function tspKey() {
      var input, filter, table, tr, td, i,j;
      input = document.getElementById("tspInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("tspTable");
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
//mysqli_free_result($stuSet_tspforMain);
?> -->
