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
			    $query_titleSetii = "SELECT * FROM title WHERE title.title_name = '$emapData[1]' ";
			    $titleSetii = mysqli_query($conn, $query_titleSetii) or die(mysqli_error($conn));
			    $row_titleSetii = mysqli_fetch_assoc($titleSetii);
			    $totalRows_titleSetii = mysqli_num_rows($titleSetii);
			    /*-- titleSet for importExcel [E]--*/

			    $emapData[1] = $row_titleSetii['title_id']; // 'MR.' == '1' or 'MS.' == '2'



			    /*-- statusSet for importExcel [S]--*/
				$query_statusSetii = "SELECT * FROM student_status WHERE student_status.status_desc = '$emapData[7]' ";
				$statusSetii = mysqli_query($conn, $query_statusSetii) or die(mysqli_error());
				$row_statusSetii = mysqli_fetch_assoc($statusSetii);
				$totalRows_statusSetii = mysqli_num_rows($statusSetii);
			    /*-- statusSet for importExcel [E]--*/

			    $emapData[7] = $row_statusSetii['status_id']; 



				/*-- student_infoSet [S]--*/
				$query_studentSet = "SELECT * FROM student_info
					ORDER BY student_info.s_id DESC";
				$studentSet = mysqli_query($conn, $query_studentSet) or die(mysqli_error());
				$row_studentSet = mysqli_fetch_assoc($studentSet);
				$totalRows_studentSet = mysqli_num_rows($studentSet);
			    /*-- student_infoSet [E]--*/




				/*-- degree_infoSet [S]--*/
				$query_degreeSet = "SELECT * FROM degree_info WHERE degree_name = '$emapData[8]' ";
				$degreeSet = mysqli_query($conn, $query_degreeSet) or die(mysqli_error($conn));
				$row_degreeSet = mysqli_fetch_assoc($degreeSet);
				$totalRows_degreeSet = mysqli_num_rows($degreeSet);
			    /*-- degree_infoSet [E]--*/

			    $emapData[8] = $row_degreeSet['degree_id'];


				/*-- education_infoSet [S]--*/
				$query_majorSet = "SELECT * FROM major_info WHERE major_name = '$emapData[9]' ";
				$majorSet = mysqli_query($conn, $query_majorSet) or die(mysqli_error());
				$row_majorSet = mysqli_fetch_assoc($majorSet);
				$totalRows_majorSet = mysqli_num_rows($majorSet);
			    /*-- education_infoSet [E]--*/

			    $emapData[9] = $row_majorSet['major_id'];



				/*-- instituteSet [S]--*/
				$query_insSet = "SELECT * FROM institute WHERE ins_name = '$emapData[10]' ";
				$insSet = mysqli_query($conn, $query_insSet) or die(mysqli_error());
				$row_insSet = mysqli_fetch_assoc($insSet);
				$totalRows_insSet = mysqli_num_rows($insSet);
			    /*-- instituteSet [E]--*/
			    	
			    $emapData[10] = $row_insSet['ins_id'];



				/*-- refference form applicationSet [S]--*/
				$query_appSet = "SELECT * FROM application 
						ORDER BY application.application_id DESC";
				$appSet = mysqli_query($conn, $query_appSet) or die(mysqli_error());
				$row_appSet = mysqli_fetch_assoc($appSet);
				$totalRows_appSet = mysqli_num_rows($appSet);
				/*-- refference form applicationSet [E]--*/


				$query_depSet = "SELECT * FROM department_info WHERE dep_name = '$emapData[14]' ";
				$depSet = mysqli_query($conn, $query_depSet) or die(mysqli_error());
				$row_depSet = mysqli_fetch_assoc($depSet);
				$totalRows_depSet = mysqli_num_rows($depSet);

			    $emapData[14] = $row_depSet['dep_id'];	


				$query_tspSet = "SELECT * FROM trainee_transportation WHERE transportation_point = '$emapData[25]' ";
				$tspSet = mysqli_query($conn, $query_tspSet) or die(mysqli_error());
				$row_tspSet = mysqli_fetch_assoc($tspSet);
				$totalRows_tspSet = mysqli_num_rows($tspSet);

			    $emapData[25] = $row_tspSet['transportation_id'];	



				$query_locSet = "SELECT * FROM location WHERE location_name = '$emapData[15]' ";
				$locSet = mysqli_query($conn, $query_locSet) or die(mysqli_error());
				$row_locSet = mysqli_fetch_assoc($locSet);
				$totalRows_locSet = mysqli_num_rows($locSet);	

			    $emapData[15] = $row_locSet['location_id'];	

///			    $emapData[xxx] = $row_xxx['xxxx'];



				/*-- Set [S]--*/
/*				$query_Set = "SELECT * FROM xxx WHERE xxx = '$emapData[xx]' ";
				$Set = mysqli_query($conn, $query_Set) or die(mysqli_error());
				$row_Set = mysqli_fetch_assoc($Set);
				$totalRows_Set = mysqli_num_rows($Set);
			    /*-- Set [E]--*/
/*
			    $emapData[xxx] = $row_xxx['xxxx'];

*/




			    $stu_sid = $row_studentSet['s_id']+1;
			    $app_id = $row_appSet['application_id']+1;



	          //It wiil insert a row to our student_info table from our csv file`
	           $sql = "INSERT into student_info (`title_title_id`, `s_fname`, `s_lname`, `thai_fname`, `thai_lname`, `s_dob`, `status_id`) 
	            	values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]' ) ;";
 

	          //It wiil insert a row to our education_info table from our csv file`
	           $sql_edu = "INSERT into education_info (`degree_id`, `major_id`, `edu_institute`, `s_id`) 
	            	values('$emapData[8]', '$emapData[9]', '$emapData[10]', '$stu_sid') ;";


	          //It wiil insert a row to our application table from our csv file`
	           $sql_app = "INSERT into application (`s_id`, `application_dateS`, `application_dateE`) 
	            	values('$stu_sid','$emapData[11]','$emapData[12]' ) ;";
		 				
		 				$sql_res = "INSERT into resume (`resume_id`) 
			            	values('$app_id') ;";

		 				$sql_tsc = "INSERT into transcript (`transcript_id`) 
			            	values('$app_id') ;";

		 				$sql_vdo = "INSERT into video (`video_id`) 
			            	values('$app_id') ;";

		 				$sql_vsa = "INSERT into visa (`visa_id`) 
			            	values('$app_id') ;";

		 				$sql_oth = "INSERT into other_doc (`idother_id`) 
			            	values('$app_id') ;";

	           $sql_tni = "INSERT into trainee_info (`trainee_code`, `s_id`, `dep_id`, `transportation_id`, `location_id`) 
	            	values('$emapData[0]','$stu_sid','$emapData[14]','$emapData[25]','$emapData[15]' ) ;"; 

				    	
/*

	          //It wiil insert a row to our xxx table from our csv file`
	           $sql = "INSERT into xx (`xx`, `xx`, `xx`, `xx`, `xx`, `xx`, `xx`) 
	            	values('$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]' ) ;";
*/


	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql) or die(mysqli_error($conn));
	          $result_edu = mysqli_query( $conn, $sql_edu) or die(mysqli_error($conn));
          	  $result_app = mysqli_query( $conn, $sql_app) or die(mysqli_error($conn));
          	  		$result_res = mysqli_query( $conn, $sql_res) or die(mysqli_error());
          	  		$result_tsc = mysqli_query( $conn, $sql_tsc) or die(mysqli_error());
          	  		$result_vdo = mysqli_query( $conn, $sql_vdo) or die(mysqli_error());
          	  		$result_vsa = mysqli_query( $conn, $sql_vsa) or die(mysqli_error());
          	  		$result_oth = mysqli_query( $conn, $sql_oth) or die(mysqli_error());
          	  $result_tni = mysqli_query( $conn, $sql_tni) or die(mysqli_error($conn));

/*
              $result_xx = mysqli_query( $conn, $xxxx) or die(mysqli_error($conn));
*/

				if(! $result || ! $result_edu)
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File or check your file format.\");
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