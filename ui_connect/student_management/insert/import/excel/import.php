<?php
include 'db.php';
if(isset($_POST["Import"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	    		
			    /*-- titleSet for importExcel [S]--*/
			    $query_titleSetii = "SELECT * FROM title WHERE title.title_name = '$emapData[0]' ";
			    $titleSetii = mysqli_query($conn, $query_titleSetii) or die(mysqli_error($conn));
			    $row_titleSetii = mysqli_fetch_assoc($titleSetii);
			    $totalRows_titleSetii = mysqli_num_rows($titleSetii);
			    /*-- titleSet for importExcel [E]--*/

			    $emapData[0] = $row_titleSetii['title_id']; // 'MR.' == '1' or 'MS.' == '2'



			    /*-- statusSet for importExcel [S]--*/
				$query_statusSetii = "SELECT * FROM student_status WHERE student_status.status_desc = '$emapData[6]' ";
				$statusSetii = mysqli_query($conn, $query_statusSetii) or die(mysqli_error());
				$row_statusSetii = mysqli_fetch_assoc($statusSetii);
				$totalRows_statusSetii = mysqli_num_rows($statusSetii);
			    /*-- statusSet for importExcel [E]--*/

			    $emapData[6] = $row_statusSetii['status_id']; 



				/*-- education_infoSet [S]--*/
				$query_studentSet = "SELECT * FROM student_info
					ORDER BY student_info.s_id DESC";
				$studentSet = mysqli_query($conn, $query_studentSet) or die(mysqli_error());
				$row_studentSet = mysqli_fetch_assoc($studentSet);
				$totalRows_studentSet = mysqli_num_rows($studentSet);
			    /*-- education_infoSet [E]--*/

			    $stu_sid = $row_studentSet['s_id']+1;




	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into student_info (`title_title_id`, `s_fname`, `s_lname`, `thai_fname`, `thai_lname`, `s_dob`, `status_id`, `remark`) 
	            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]', '$stu_sid' ) ;";


	          //It wiil insert a row to our subject table from our csv file`
	           $sql_edu = "INSERT into education_info (`degree_id`, `major_id`, `uni_id`, `collage_id`, `intitute_id`, `s_id`) 
	            	values('1', '2', '1', '1', '1', '$stu_sid') ;";


	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql) or die(mysqli_error($conn));
	          $result_edu = mysqli_query( $conn, $sql_edu) or die(mysqli_error($conn));
				if(! $result || ! $result)
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						</script>";
				
				}


	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
	        
			 

			 //close of connection
			mysqli_close($conn); 
				
		 	
			
		 }
	}	 
?>		 