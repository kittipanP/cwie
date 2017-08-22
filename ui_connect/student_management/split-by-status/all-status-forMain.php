
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
    $maxRows_allforMain = 10;
    $pageNum_allforMain = 0;
    if (isset($_GET['pageNum_allforMain'])) {
      $pageNum_allforMain = $_GET['pageNum_allforMain'];
    }
    $startRow_allforMain = $pageNum_allforMain * $maxRows_allforMain;
    
    mysqli_select_db($MyConnect, $database_MyConnect);
      $query_allforMaain = "SELECT student_info.s_id, title.title_name, student_info.s_fname, student_info.s_lname, student_status.status_desc, major_info.major_name, degree_info.degree_name
      FROM student_info
      INNER JOIN title ON title.title_id = student_info.title_title_id
      INNER JOIN student_status ON student_status.status_id = student_info.status_id
      LEFT JOIN education_info ON student_info.s_id = education_info.s_id
      LEFT JOIN major_info ON major_info.major_id = education_info.major_id
      LEFT JOIN degree_info ON degree_info.degree_id = education_info.degree_id
      ORDER BY student_info.s_id DESC";
    $query_limit_allforMain = sprintf("%s LIMIT %d, %d", $query_allforMaain, $startRow_allforMain, $maxRows_allforMain);
    $stuSet_allforMain = mysqli_query($MyConnect, $query_limit_allforMain) or die(mysqli_error());
    $row_stuSet_allforMain = mysqli_fetch_assoc($stuSet_allforMain);
    
    if (isset($_GET['totalRows_allforMain'])) {
      $totalRows_allforMain = $_GET['totalRows_allforMain'];
    } else {
      $all_stuSet_allforMain = mysqli_query(dbconnect(), $query_allforMaain);
      $totalRows_allforMain = mysqli_num_rows($all_stuSet_allforMain);
    }
    $totalPages_stuSet_allforMain = ceil($totalRows_allforMain/$maxRows_allforMain)-1;
    
    $queryString_stuSet_allforMain = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
      if (stristr($param, "pageNum_allforMain") == false && 
        stristr($param, "totalRows_allforMain") == false) {
        array_push($newParams, $param);
      }
      }
      if (count($newParams) != 0) {
      $queryString_stuSet_allforMain = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_stuSet_allforMain = sprintf("&totalRows_allforMain=%d%s", $totalRows_allforMain, $queryString_stuSet_allforMain);
?>





<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="onProcess">
                      <h2>Recent All Student Lists</h2>
                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="onProcessiiInput" onkeyup="onProcessFnii()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="onProcessiiTable">
                        <tr>
                          
                          <th style="width:5%;">Title</th>
                          <th style="width:10%;">First Name</th>
                          <th style="width:10%;">Last Name</th>
                          <th style="width:11%;">Degree</th>
                          <th style="width:24%;">Major</th>
                          <th style="width:30%;">Institute</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td><?php echo $row_stuSet_allforMain['title_name']; ?></td>
                              <td><?php echo $row_stuSet_allforMain['s_fname']; ?></td>
                              <td><?php echo $row_stuSet_allforMain['s_lname']; ?></td>
                              <td><?php echo $row_stuSet_allforMain['degree_name']; ?></td>
                              <td><?php echo $row_stuSet_allforMain['major_name']; ?></td>
                              <td><?php //echo $row_stuSet_allforMain['uni_name']; ?>
                                    <?php //echo $row_stuSet_allforMain['collage_name']; ?></td>
                              <td><a class="btn btn-default w3-hover-blue" href="../main-connect-ui/stu-update-all.php?s_id=<?php echo $row_stuSet_allforMain['s_id']; ?>"><i class="fa fa-pencil"></i></a></td>
                              <td><a  class="btn btn-default w3-hover-red" id="delete_product" data-id="<?php echo $row_stuSet_allforMain['s_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash "></i></a></td>
                              <!--
                              <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $product_id; ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
                              -->
                            </tr> 
                        <?php } while ($row_stuSet_allforMain = mysqli_fetch_assoc($stuSet_allforMain)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_allforMain=%d%s", $currentPage, 0, $queryString_stuSet_allforMain); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($allforMain_page=0;$allforMain_page<=$totalPages_stuSet_allforMain;$allforMain_page++){
                                echo '<a href="?pageNum_allforMain=',$allforMain_page,'">',($allforMain_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_allforMain=%d%s", $currentPage, $totalPages_stuSet_allforMain, $queryString_stuSet_allforMain); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

</div>        
    <!--     
    <script>

    function onProcessFnii() {
      var input, filter, table, tr, td, i,j;
      input = document.getElementById("onProcessiiInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("onProcessiiTable");
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
  </script> -->

<!--
<?php
//mysqli_free_result($stuSet_allforMain);
?> -->
