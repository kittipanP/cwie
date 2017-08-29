
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
    $maxRows_insforMain = 100;
    $pageNum_insforMain = 0;
    if (isset($_GET['pageNum_insforMain'])) {
      $pageNum_insforMain = $_GET['pageNum_insforMain'];
    }
    $startRow_insforMain = $pageNum_insforMain * $maxRows_insforMain;
    
    mysqli_select_db($MyConnect, $database_MyConnect);
      $query_insforMaain = "SELECT institute.ins_name, institute_type.itp_name, country_list.country_name FROM institute
      INNER JOIN institute_type ON institute_type.itp_id = institute.ins_type
      INNER JOIN country_list ON country_list.country_id = institute.ins_country
      ORDER BY  institute.ins_id DESC";
    $query_limit_insforMain = sprintf("%s LIMIT %d, %d", $query_insforMaain, $startRow_insforMain, $maxRows_insforMain);
    $stuSet_insforMain = mysqli_query($MyConnect, $query_limit_insforMain) or die(mysqli_error());
    $row_insforMain = mysqli_fetch_assoc($stuSet_insforMain);
    
    if (isset($_GET['totalRows_insforMain'])) {
      $totalRows_insforMain = $_GET['totalRows_insforMain'];
    } else {
      $all_stuSet_insforMain = mysqli_query(dbconnect(), $query_insforMaain);
      $totalRows_insforMain = mysqli_num_rows($all_stuSet_insforMain);
    }
    $totalPages_stuSet_insforMain = ceil($totalRows_insforMain/$maxRows_insforMain)-1;
    
    $queryString_stuSet_insforMain = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
      if (stristr($param, "pageNum_insforMain") == false && 
        stristr($param, "totalRows_insforMain") == false) {
        array_push($newParams, $param);
      }
      }
      if (count($newParams) != 0) {
      $queryString_stuSet_insforMain = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_stuSet_insforMain = sprintf("&totalRows_insforMain=%d%s", $totalRows_insforMain, $queryString_stuSet_insforMain);
?>


<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="">


                  <div align="right">
                      <a onclick="document.getElementById('ins-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Institute</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>
                  </div> 
                  
                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="insInput" onkeyup="insKey()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="insTable">
                        <tr>
                          
                          <th style="width:5%;">No</th>
                          <th style="width:65%;">Institute Name</th>
                          <th style="width:10%;">Institute Type</th>
                          <th style="width:10%;">Country</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td>No</td>
                              <td><?php echo $row_insforMain['ins_name']; ?></td>
                              <td><?php echo $row_insforMain['itp_name']; ?></td>
                              <td><?php echo $row_insforMain['country_name']; ?></td>
                              <td><a class="btn btn-default w3-hover-blue" href="../main-connect-ui/stu-update-all.php?ins_id=<?php echo $row_insforMain['ins_id']; ?>"><i class="fa fa-pencil"></i></a></td>
                              <td><a  class="btn btn-default w3-hover-red" id="delete_product" data-id="<?php echo $row_insforMain['ins_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash "></i></a></td>
                              <!--
                              <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $product_id; ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
                              -->
                            </tr> 
                        <?php } while ($row_insforMain = mysqli_fetch_assoc($stuSet_insforMain)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_insforMain=%d%s", $currentPage, 0, $queryString_stuSet_insforMain); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($insforMain_page=0;$insforMain_page<=$totalPages_stuSet_insforMain;$insforMain_page++){
                                echo '<a href="?pageNum_insforMain=',$insforMain_page,'">',($insforMain_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_insforMain=%d%s", $currentPage, $totalPages_stuSet_insforMain, $queryString_stuSet_insforMain); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

</div>        
        
    <script>

    function insKey() {
      var input, filter, table, tr, td, i,j;
      input = document.getElementById("insInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("insTable");
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
//mysqli_free_result($stuSet_insforMain);
?> -->
