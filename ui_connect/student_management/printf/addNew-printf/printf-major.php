
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
    $maxRows_majorforMain = 100;
    $pageNum_majorforMain = 0;
    if (isset($_GET['pageNum_majorforMain'])) {
      $pageNum_majorforMain = $_GET['pageNum_majorforMain'];
    }
    $startRow_majorforMain = $pageNum_majorforMain * $maxRows_majorforMain;
    
    mysqli_select_db($MyConnect, $database_MyConnect);
      $query_majorforMaain = "SELECT major_name FROM major_info
      ORDER BY major_id DESC";
    $query_limit_majorforMain = sprintf("%s LIMIT %d, %d", $query_majorforMaain, $startRow_majorforMain, $maxRows_majorforMain);
    $stuSet_majorforMain = mysqli_query($MyConnect, $query_limit_majorforMain) or die(mysqli_error());
    $row_majorforMain = mysqli_fetch_assoc($stuSet_majorforMain);
    
    if (isset($_GET['totalRows_majorforMain'])) {
      $totalRows_majorforMain = $_GET['totalRows_majorforMain'];
    } else {
      $all_stuSet_majorforMain = mysqli_query(dbconnect(), $query_majorforMaain);
      $totalRows_majorforMain = mysqli_num_rows($all_stuSet_majorforMain);
    }
    $totalPages_stuSet_majorforMain = ceil($totalRows_majorforMain/$maxRows_majorforMain)-1;
    
    $queryString_stuSet_majorforMain = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
      if (stristr($param, "pageNum_majorforMain") == false && 
        stristr($param, "totalRows_majorforMain") == false) {
        array_push($newParams, $param);
      }
      }
      if (count($newParams) != 0) {
      $queryString_stuSet_majorforMain = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_stuSet_majorforMain = sprintf("&totalRows_majorforMain=%d%s", $totalRows_majorforMain, $queryString_stuSet_majorforMain);
?>


<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="">

                      <div align="right">
                      <a onclick="document.getElementById('major-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Major</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>
                      </div>


                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="majorInput" onkeyup="majorKey()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="majorTable">
                        <tr>
                          
                          <th style="width:5%;">no.</th>
                          <th style="width:85%;">Major Name</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td>No</td>
                              <td><?php echo $row_majorforMain['major_name']; ?></td>
                              <td><a class="btn btn-default w3-hover-blue" href="../main-connect-ui/stu-update-all.php?major_id=<?php echo $row_majorforMain['major_id']; ?>"><i class="fa fa-pencil"></i></a></td>
                              <td><a  class="btn btn-default w3-hover-red" id="delete_product" data-id="<?php echo $row_majorforMain['major_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash "></i></a></td>
                              <!--
                              <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $product_id; ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
                              -->
                            </tr> 
                        <?php } while ($row_majorforMain = mysqli_fetch_assoc($stuSet_majorforMain)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_majorforMain=%d%s", $currentPage, 0, $queryString_stuSet_majorforMain); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($majorforMain_page=0;$majorforMain_page<=$totalPages_stuSet_majorforMain;$majorforMain_page++){
                                echo '<a href="?pageNum_majorforMain=',$majorforMain_page,'">',($majorforMain_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_majorforMain=%d%s", $currentPage, $totalPages_stuSet_majorforMain, $queryString_stuSet_majorforMain); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

</div>        
        
    <script>

    function majorKey() {
      var input, filter, table, tr, td, i,j;
      input = document.getElementById("majorInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("majorTable");
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
//mysqli_free_result($stuSet_majorforMain);
?> -->
