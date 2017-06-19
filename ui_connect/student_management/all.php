

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="onProcess">
                      <h2>Recent All Student Lists</h2>
                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="allInput" onkeyup="allFn()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="allTable">
                        <tr>
                          
                          <th style="width:5%;">Title</th>
                          <th style="width:10%;">First Name</th>
                          <th style="width:10%;">Last Name</th>
                          <th style="width:11%;">Degree</th>
                          <th style="width:24%;">Major</th>
                          <th style="width:30%;">University</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td><?php echo $row_studentSet_all['title_name']; ?></td>
                              <td><?php echo $row_studentSet_all['s_fname']; ?></td>
                              <td><?php echo $row_studentSet_all['s_lname']; ?></td>
                              <td><?php echo $row_studentSet_all['degree_name']; ?></td>
                              <td><?php echo $row_studentSet_all['major_name']; ?></td>
                              <td><?php echo $row_studentSet_all['uni_name']; ?>
                                    <?php echo $row_studentSet_all['collage_name']; ?></td>
                              <td><a href="editting/stu-update-full.php?s_id=<?php echo $row_studentSet_all['s_id']; ?>"><i class="fa fa-pencil w3-margin-right"></i></a></td>  
                             <!--<td><a onclick="document.getElementById('stu-edit').style.display='block'" ><i class="fa fa-pencil w3-margin-right"></i></a></td>  -->
                              <td><a href="student_delete.php?s_id=<?php echo $row_studentSet_all['s_id']; ?>"><i class="fa fa-trash w3-margin-right"></i></a></td> 
                            </tr> 
                        <?php } while ($row_studentSet_all = mysqli_fetch_assoc($studentSet_all)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_studentSet_all=%d%s", $currentPage, 0, $queryString_studentSet_all); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($all_page=0;$all_page<=$totalPages_studentSet_all;$all_page++){
                                echo '<a href="?pageNum_studentSet_all=',$all_page,'">',($all_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_studentSet_all=%d%s", $currentPage, $totalPages_studentSet_all, $queryString_studentSet_all); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
 	</div>
</div>        
         
    <script>
		function allFn() {
		  var input, filter, table, tr, td, i,j;
		  input = document.getElementById("allInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("allTable");
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

<?php
mysqli_free_result($studentSet_all);
?>
