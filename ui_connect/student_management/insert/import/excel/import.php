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



				/*-- student_infoSet [S]--*/
				$query_studentSet = "SELECT * FROM student_info
					ORDER BY student_info.s_id DESC";
				$studentSet = mysqli_query($conn, $query_studentSet) or die(mysqli_error());
				$row_studentSet = mysqli_fetch_assoc($studentSet);
				$totalRows_studentSet = mysqli_num_rows($studentSet);
			    /*-- student_infoSet [E]--*/

			    $stu_sid = $row_studentSet['s_id']+1;



				/*-- degree_infoSet [S]--*/
				$query_degreeSet = "SELECT * FROM degree_info WHERE degree_name = '$emapData[7]' ";
				$degreeSet = mysqli_query($conn, $query_degreeSet) or die(mysqli_error($conn));
				$row_degreeSet = mysqli_fetch_assoc($degreeSet);
				$totalRows_degreeSet = mysqli_num_rows($degreeSet);
			    /*-- degree_infoSet [E]--*/

			    $emapData[7] = $row_degreeSet['degree_id'];


				/*-- education_infoSet [S]--*/
				$query_majorSet = "SELECT * FROM major_info WHERE major_name = '$emapData[8]' ";
				$majorSet = mysqli_query($conn, $query_majorSet) or die(mysqli_error());
				$row_majorSet = mysqli_fetch_assoc($majorSet);
				$totalRows_majorSet = mysqli_num_rows($majorSet);
			    /*-- education_infoSet [E]--*/

			    $emapData[8] = $row_majorSet['major_id'];



				/*-- instituteSet [S]--*/
				$query_insSet = "SELECT * FROM institute WHERE ins_name = '$emapData[9]' ";
				$insSet = mysqli_query($conn, $query_insSet) or die(mysqli_error());
				$row_insSet = mysqli_fetch_assoc($insSet);
				$totalRows_insSet = mysqli_num_rows($insSet);
			    /*-- instituteSet [E]--*/
			    	
			    $emapData[9] = $row_insSet['ins_id'];



				/*-- applicationSet [S]--*/
//				$query_appSet = "SELECT * FROM application WHERE application_dateS = '$emapData[xx]' ";
//				$Set = mysqli_query($conn, $query_Set) or die(mysqli_error());
//				$row_Set = mysqli_fetch_assoc($Set);
//				$totalRows_Set = mysqli_num_rows($Set);
			    /*-- Set [E]--*/

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






	          //It wiil insert a row to our student_info table from our csv file`
	           $sql = "INSERT into student_info (`title_title_id`, `s_fname`, `s_lname`, `thai_fname`, `thai_lname`, `s_dob`, `status_id`) 
	            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]' ) ;";
 

	          //It wiil insert a row to our education_info table from our csv file`
	           $sql_edu = "INSERT into education_info (`degree_id`, `major_id`, `edu_institute`, `s_id`) 
	            	values('$emapData[7]', '$emapData[8]', '$emapData[9]', '$stu_sid') ;";


	          //It wiil insert a row to our application table from our csv file`
	           $sql_app = "INSERT into application (`s_id`, `application_dateS`, `application_dateE`) 
	            	values('$stu_sid','$emapData[10]','$emapData[11]' ) ;";

			    	
/*

	          //It wiil insert a row to our xxx table from our csv file`
	           $sql = "INSERT into xx (`xx`, `xx`, `xx`, `xx`, `xx`, `xx`, `xx`) 
	            	values('$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]' ) ;";
*/


	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql) or die(mysqli_error($conn));
	          $result_edu = mysqli_query( $conn, $sql_edu) or die(mysqli_error($conn));
          	  $result_app = mysqli_query( $conn, $sql_app) or die(mysqli_error($conn));

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