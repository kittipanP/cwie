
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
    $maxRows_lgforMain = 100;
    $pageNum_lgforMain = 0;
    if (isset($_GET['pageNum_lgforMain'])) {
      $pageNum_lgforMain = $_GET['pageNum_lgforMain'];
    }
    $startRow_lgforMain = $pageNum_lgforMain * $maxRows_lgforMain;
    
    mysqli_select_db($MyConnect, $database_MyConnect);
      $query_lgforMaain = "SELECT language.lg_name FROM language
      ORDER BY language.lg_id DESC";
    $query_limit_lgforMain = sprintf("%s LIMIT %d, %d", $query_lgforMaain, $startRow_lgforMain, $maxRows_lgforMain);
    $stuSet_lgforMain = mysqli_query($MyConnect, $query_limit_lgforMain) or die(mysqli_error());
    $row_lgforMain = mysqli_fetch_assoc($stuSet_lgforMain);
    
    if (isset($_GET['totalRows_lgforMain'])) {
      $totalRows_lgforMain = $_GET['totalRows_lgforMain'];
    } else {
      $all_stuSet_lgforMain = mysqli_query(dbconnect(), $query_lgforMaain);
      $totalRows_lgforMain = mysqli_num_rows($all_stuSet_lgforMain);
    }
    $totalPages_stuSet_lgforMain = ceil($totalRows_lgforMain/$maxRows_lgforMain)-1;
    
    $queryString_stuSet_lgforMain = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
      if (stristr($param, "pageNum_lgforMain") == false && 
        stristr($param, "totalRows_lgforMain") == false) {
        array_push($newParams, $param);
      }
      }
      if (count($newParams) != 0) {
      $queryString_stuSet_lgforMain = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_stuSet_lgforMain = sprintf("&totalRows_lgforMain=%d%s", $totalRows_lgforMain, $queryString_stuSet_lgforMain);
?>


<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="">


                  <div align="right">
                      <a onclick="document.getElementById('lg-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Language</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>
                  </div>  

                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="lgInput" onkeyup="lgKey()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="lgTable">
                        <tr>
                          
                          <th style="width:5%;">No</th>
                          <th style="width:85%;">Language</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td>No</td>
                              <td><?php echo $row_lgforMain['lg_name']; ?></td>
                              <td><a class="btn btn-default w3-hover-blue" href="../main-connect-ui/stu-update-all.php?lg_id=<?php echo $row_lgforMain['lg_id']; ?>"><i class="fa fa-pencil"></i></a></td>
                              <td><a  class="btn btn-default w3-hover-red" id="delete_product" data-id="<?php echo $row_lgforMain['lg_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash "></i></a></td>
                              <!--
                              <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $product_id; ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
                              -->
                            </tr> 
                        <?php } while ($row_lgforMain = mysqli_fetch_assoc($stuSet_lgforMain)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_lgforMain=%d%s", $currentPage, 0, $queryString_stuSet_lgforMain); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($lgforMain_page=0;$lgforMain_page<=$totalPages_stuSet_lgforMain;$lgforMain_page++){
                                echo '<a href="?pageNum_lgforMain=',$lgforMain_page,'">',($lgforMain_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_lgforMain=%d%s", $currentPage, $totalPages_stuSet_lgforMain, $queryString_stuSet_lgforMain); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

</div>        
        
    <script>

    function lgKey() {
      var input, filter, table, tr, td, i,j;
      input = document.getElementById("lgInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("lgTable");
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
//mysqli_free_result($stuSet_lgforMain);
?> -->
