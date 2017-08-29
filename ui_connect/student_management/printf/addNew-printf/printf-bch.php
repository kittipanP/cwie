
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
    $maxRows_bchforMain = 100;
    $pageNum_bchforMain = 0;
    if (isset($_GET['pageNum_bchforMain'])) {
      $pageNum_bchforMain = $_GET['pageNum_bchforMain'];
    }
    $startRow_bchforMain = $pageNum_bchforMain * $maxRows_bchforMain;
    
    mysqli_select_db($MyConnect, $database_MyConnect);
      $query_bchforMaain = "SELECT bnk_banch.bch_name, province.province_name FROM bnk_banch
      INNER JOIN province ON province.province_id = bnk_banch.province_id
      ORDER BY  bnk_banch.bch_id DESC";
    $query_limit_bchforMain = sprintf("%s LIMIT %d, %d", $query_bchforMaain, $startRow_bchforMain, $maxRows_bchforMain);
    $stuSet_bchforMain = mysqli_query($MyConnect, $query_limit_bchforMain) or die(mysqli_error());
    $row_bchforMain = mysqli_fetch_assoc($stuSet_bchforMain);
    
    if (isset($_GET['totalRows_bchforMain'])) {
      $totalRows_bchforMain = $_GET['totalRows_bchforMain'];
    } else {
      $all_stuSet_bchforMain = mysqli_query(dbconnect(), $query_bchforMaain);
      $totalRows_bchforMain = mysqli_num_rows($all_stuSet_bchforMain);
    }
    $totalPages_stuSet_bchforMain = ceil($totalRows_bchforMain/$maxRows_bchforMain)-1;
    
    $queryString_stuSet_bchforMain = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
      if (stristr($param, "pageNum_bchforMain") == false && 
        stristr($param, "totalRows_bchforMain") == false) {
        array_push($newParams, $param);
      }
      }
      if (count($newParams) != 0) {
      $queryString_stuSet_bchforMain = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_stuSet_bchforMain = sprintf("&totalRows_bchforMain=%d%s", $totalRows_bchforMain, $queryString_stuSet_bchforMain);
?>


<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="">

                  <div align="right">
                      <a onclick="document.getElementById('bch-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Branch</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>
                  </div> 

                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="bchInput" onkeyup="bchKey()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="bchTable">
                        <tr>
                          
                          <th style="width:5%;">No</th>
                          <th style="width:45%;">Banch Name</th>
                          <th style="width:40%;">Province</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td>No</td>
                              <td><?php echo $row_bchforMain['bch_name']; ?></td>
                              <td><?php echo $row_bchforMain['province_name']; ?></td>
                              <td><a class="btn btn-default w3-hover-blue" href="../main-connect-ui/stu-update-all.php?bch_id=<?php echo $row_bchforMain['bch_id']; ?>"><i class="fa fa-pencil"></i></a></td>
                              <td><a  class="btn btn-default w3-hover-red" id="delete_product" data-id="<?php echo $row_bchforMain['bch_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash "></i></a></td>
                              <!--
                              <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $product_id; ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
                              -->
                            </tr> 
                        <?php } while ($row_bchforMain = mysqli_fetch_assoc($stuSet_bchforMain)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_bchforMain=%d%s", $currentPage, 0, $queryString_stuSet_bchforMain); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($bchforMain_page=0;$bchforMain_page<=$totalPages_stuSet_bchforMain;$bchforMain_page++){
                                echo '<a href="?pageNum_bchforMain=',$bchforMain_page,'">',($bchforMain_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_bchforMain=%d%s", $currentPage, $totalPages_stuSet_bchforMain, $queryString_stuSet_bchforMain); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

</div>        
        
    <script>

    function bchKey() {
      var input, filter, table, tr, td, i,j;
      input = document.getElementById("bchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("bchTable");
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
//mysqli_free_result($stuSet_bchforMain);
?> -->
