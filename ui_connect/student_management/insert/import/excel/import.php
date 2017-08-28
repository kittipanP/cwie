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

			    //$fullname = $emapData[2];
			    list($fname, $lname) = explode(" ", $emapData[2]); // split fname and lname form fullname by using explode(); when find " "

			    //$fullnameTH = $emapData[3];
			    list($fnameTH, $lnameTH) = explode(" ", $emapData[3]); //split fnameTH and lnameTH form fullnameTH by using explode(); when find " "


			    /*-- statusSet for importExcel [S]--*/
				$query_statusSetii = "SELECT * FROM student_status WHERE student_status.status_desc = '$emapData[5]' ";
				$statusSetii = mysqli_query($conn, $query_statusSetii) or die(mysqli_error());
				$row_statusSetii = mysqli_fetch_assoc($statusSetii);
				$totalRows_statusSetii = mysqli_num_rows($statusSetii);
			    /*-- statusSet for importExcel [E]--*/

			    $emapData[5] = $row_statusSetii['status_id']; 



				/*-- student_infoSet [S]--*/
				$query_studentSet = "SELECT * FROM student_info
					ORDER BY student_info.s_id DESC";
				$studentSet = mysqli_query($conn, $query_studentSet) or die(mysqli_error());
				$row_studentSet = mysqli_fetch_assoc($studentSet);
				$totalRows_studentSet = mysqli_num_rows($studentSet);
			    /*-- student_infoSet [E]--*/


				/*-- trainee_infoSet [S]--*/
				$query_tniSet = "SELECT * FROM trainee_info
					ORDER BY trainee_info.trainee_id DESC";
				$tniSet = mysqli_query($conn, $query_tniSet) or die(mysqli_error());
				$row_tniSet = mysqli_fetch_assoc($tniSet);
				$totalRows_tniSet = mysqli_num_rows($tniSet);
			    /*-- trainee_infoSet [E]--*/




				/*-- degree_infoSet [S]--*/
				$query_degreeSet = "SELECT * FROM degree_info WHERE degree_name = '$emapData[6]' ";
				$degreeSet = mysqli_query($conn, $query_degreeSet) or die(mysqli_error($conn));
				$row_degreeSet = mysqli_fetch_assoc($degreeSet);
				$totalRows_degreeSet = mysqli_num_rows($degreeSet);
			    /*-- degree_infoSet [E]--*/

			    $emapData[6] = $row_degreeSet['degree_id'];


				/*-- education_infoSet [S]--*/
				$query_majorSet = "SELECT * FROM major_info WHERE major_name = '$emapData[7]' ";
				$majorSet = mysqli_query($conn, $query_majorSet) or die(mysqli_error());
				$row_majorSet = mysqli_fetch_assoc($majorSet);
				$totalRows_majorSet = mysqli_num_rows($majorSet);
			    /*-- education_infoSet [E]--*/

			    $emapData[7] = $row_majorSet['major_id'];



				/*-- instituteSet [S]--*/
				$query_insSet = "SELECT * FROM institute WHERE ins_name = '$emapData[8]' ";
				$insSet = mysqli_query($conn, $query_insSet) or die(mysqli_error());
				$row_insSet = mysqli_fetch_assoc($insSet);
				$totalRows_insSet = mysqli_num_rows($insSet);
			    /*-- instituteSet [E]--*/
			    	
			    $emapData[8] = $row_insSet['ins_id'];



				/*-- refference form applicationSet [S]--*/
				$query_appSet = "SELECT * FROM application 
						ORDER BY application.application_id DESC";
				$appSet = mysqli_query($conn, $query_appSet) or die(mysqli_error());
				$row_appSet = mysqli_fetch_assoc($appSet);
				$totalRows_appSet = mysqli_num_rows($appSet);
				/*-- refference form applicationSet [E]--*/


				$query_depSet = "SELECT * FROM department_info WHERE dep_name = '$emapData[12]' ";
				$depSet = mysqli_query($conn, $query_depSet) or die(mysqli_error());
				$row_depSet = mysqli_fetch_assoc($depSet);
				$totalRows_depSet = mysqli_num_rows($depSet);

			    $emapData[12] = $row_depSet['dep_id'];	


				$query_tspSet = "SELECT * FROM trainee_transportation WHERE transportation_point = '$emapData[23]' ";
				$tspSet = mysqli_query($conn, $query_tspSet) or die(mysqli_error());
				$row_tspSet = mysqli_fetch_assoc($tspSet);
				$totalRows_tspSet = mysqli_num_rows($tspSet);

			    $emapData[23] = $row_tspSet['transportation_id'];	



				$query_locSet = "SELECT * FROM location WHERE location_name = '$emapData[13]' ";
				$locSet = mysqli_query($conn, $query_locSet) or die(mysqli_error());
				$row_locSet = mysqli_fetch_assoc($locSet);
				$totalRows_locSet = mysqli_num_rows($locSet);	

			    $emapData[13] = $row_locSet['location_id'];	

///			    $emapData[xxx] = $row_xxx['xxxx'];



				/*-- bank_branchSet [S]--*/
				$query_bchSet = "SELECT * FROM bnk_banch WHERE bch_name = '$emapData[16]' ";
				$bchSet = mysqli_query($conn, $query_bchSet) or die(mysqli_error($conn));
				$row_bchSet = mysqli_fetch_assoc($bchSet);
				$totalRows_bchSet = mysqli_num_rows($bchSet);
			    /*-- bank_branchSet [E]--*/

			    $emapData[16] = $row_bchSet['bch_id'];


				/*-- bank_has_banchSet [S]--*/
				$query_bhbSet = "SELECT * FROM bank_has_banch
					ORDER BY bank_has_banch.bnk_has_bch_id DESC";
				$bhbSet = mysqli_query($conn, $query_bhbSet) or die(mysqli_error());
				$row_bhbSet = mysqli_fetch_assoc($bhbSet);
				$totalRows_bhbSet = mysqli_num_rows($bhbSet);
			    /*-- bank_has_banchSet [E]--*/


				/*--  [S]--*/
				$query_scdSet = "SELECT * FROM student_contact_details
					ORDER BY student_contact_details.contact_id DESC";
				$scdSet = mysqli_query($conn, $query_scdSet) or die(mysqli_error());
				$row_scdSet = mysqli_fetch_assoc($scdSet);
				$totalRows_scdSet = mysqli_num_rows($scdSet);
			    /*--  [E]--*/

				/*-- supervisor_infoSet [S]--*/
				$query_spvSet = "SELECT * FROM supervisor_info WHERE spv_fname = '$emapData[11]' ";
				$spvSet = mysqli_query($conn, $query_spvSet) or die(mysqli_error($conn));
				$row_spvSet = mysqli_fetch_assoc($spvSet);
				$totalRows_spvSet = mysqli_num_rows($spvSet);
			    /*-- supervisor_infoSet [E]--*/

			    $emapData[11] = $row_spvSet['spv_id'];


				/*-- building_infoSet [S]--*/
				$query_bdgSet = "SELECT * FROM building_info WHERE bldg_name = '$emapData[14]' ";
				$bdgSet = mysqli_query($conn, $query_bdgSet) or die(mysqli_error($conn));
				$row_bdgSet = mysqli_fetch_assoc($bdgSet);
				$totalRows_bdgSet = mysqli_num_rows($bdgSet);
			    /*-- building_infoSet [E]--*/

			    $emapData[14] = $row_bdgSet['bldg_id'];


				/*-- bank_has_banchSet [S]--*/
				$query_pjcSet = "SELECT * FROM trainee_project
					ORDER BY trainee_project.project_id DESC";
				$pjcSet = mysqli_query($conn, $query_pjcSet) or die(mysqli_error());
				$row_pjcSet = mysqli_fetch_assoc($pjcSet);
				$totalRows_pjcSet = mysqli_num_rows($pjcSet);
			    /*-- bank_has_banchSet [E]--*/



				/*--  [S]--*/
				$query_couSet = "SELECT * FROM training_course WHERE training_course.course_name = '$emapData[24]' ";
				$couSet = mysqli_query($conn, $query_couSet) or die(mysqli_error($conn));
				$row_couSet = mysqli_fetch_assoc($couSet);
				$totalRows_couSet = mysqli_num_rows($couSet);


				$query_couSetii = "SELECT * FROM training_course WHERE course_name = '$emapData[25]' ";
				$couSetii = mysqli_query($conn, $query_couSetii) or die(mysqli_error($conn));
				$row_couSetii = mysqli_fetch_assoc($couSetii);
				$totalRows_couSetii = mysqli_num_rows($couSetii);


				$query_couSetiii = "SELECT * FROM training_course WHERE course_name = '$emapData[26]' ";
				$couSetiii = mysqli_query($conn, $query_couSetiii) or die(mysqli_error($conn));
				$row_couSetiii = mysqli_fetch_assoc($couSetiii);
				$totalRows_couSetiii = mysqli_num_rows($couSetiii);
			    /*--  [E]--*/

			    $emapData[24] = $row_couSet['course_id'];
			    $emapData[25] = $row_couSetii['course_id'];
			    $emapData[26] = $row_couSetiii['course_id'];



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
			    	$tni_id	= $row_tniSet['trainee_id']+1;
			    		$bhb_id = $row_bhbSet['bnk_has_bch_id']+1;
			    			$bnk_id = '1';
			    		$pjc_id = $row_pjcSet['project_id']+1;
			    	$scd_id = $row_scdSet['contact_id']+1;




	    //It wiil insert a row to our student_info table from our csv file`
	    $sql = "INSERT into student_info (`title_title_id`, `s_fname`, `s_lname`, `thai_fname`, `thai_lname`, `s_dob`, `status_id`,`date_of_birth`, `citizen_id`) 
	           	values('$emapData[1]','$fname','$lname','$fnameTH','$lnameTH','$emapData[4]','$emapData[5]','$emapData[21]','$emapData[22]' ) ;";
 

	          //It wiil insert a row to our education_info table from our csv file`
	           $sql_edu = "INSERT into education_info (`degree_id`, `major_id`, `edu_institute`, `s_id`) 
	            	values('$emapData[6]', '$emapData[7]', '$emapData[8]', '$stu_sid') ;";


	          //It wiil insert a row to our application table from our csv file`
	           $sql_app = "INSERT into application (`s_id`, `application_dateS`, `application_dateE`) 
	            	values('$stu_sid','$emapData[9]','$emapData[10]' ) ;";		 				
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

	          //It wiil insert a row to xxx table from our csv file`
	           $sql_scd = "INSERT into student_contact_details (`scd_s_id`, `contact_no`, `email_adress`) 
	            	values('$stu_sid','$emapData[17]','$emapData[18]') ;";
		 				$sql_sec = "INSERT into student_emergency_contact (`contact_id`) 
			            	values('$scd_id') ;";

	          //It wiil insert a row to trainee_info table from our csv file`
	           $sql_tni = "INSERT into trainee_info (`trainee_code`, `s_id`, `dep_id`, `transportation_id`, `location_id`,`tni_bdg`) 
	            	values('$emapData[0]','$stu_sid','$emapData[12]','$emapData[23]','$emapData[13]','$emapData[14]' ) ;"; 


			          //It wiil insert a row to xxx table from our csv file`
			           $sql_bch = "INSERT into bank_has_banch (`bnk_id`, `bch_id`) 
			            	values('$bnk_id','$emapData[16]') ;";

			          //It wiil insert a row to xxx table from our csv file`
			           $sql_bac = "INSERT into bank_acc_info (`bac_no`, `trainee_id`, `bnk_has_id`) 
			            	values('$emapData[15]','$tni_id','$bhb_id') ;";

			          //It wiil insert a row to xxx table from our csv file`
			           $sql_thp = "INSERT into trainee_has_project (`project_id`, `trainee_id`) 
			            	values('$pjc_id','$tni_id') ;";
			     
				          //It wiil insert a row to xxx table from our csv file`
				           $sql_pjc = "INSERT into trainee_project (`project_name`) 
				            	values('$emapData[19]') ;";

			          //It wiil insert a row to xxx table from our csv file`
			           $sql_thc = "INSERT into trainee_info_has_training_course (`training_course_course_id`, `training_course_trainee_id`) 
			            	values('$emapData[24]','$tni_id') ;";
			           $sql_thcii = "INSERT into trainee_info_has_training_course (`training_course_course_id`, `training_course_trainee_id`) 
			            	values('$emapData[25]','$tni_id') ;";
			           $sql_thciii = "INSERT into trainee_info_has_training_course (`training_course_course_id`, `training_course_trainee_id`) 
			            	values('$emapData[26]','$tni_id') ;"; 
			     

	          //It wiil insert a row to xxx table from our csv file`
	           $sql_spv = "INSERT into supervisor_info_has_student_info (`supervisor_info_spv_id`, `student_info_s_id`) 
	            	values('$emapData[11]','$stu_sid') ;";

	          //It wiil insert a row to xxx table from our csv file`
	           $sql_eva = "INSERT into evaluation (`eva_finalPre_score`, `stu_id`) 
	            	values('$emapData[20]','$stu_sid') ;";



	            // reserve
			   	$sql_add= "INSERT into student_address (`s_id`) 
		         	values('$stu_sid') ;";
			   	$sql_rel = "INSERT into student_relationship (`s_id`) 
		         	values('$stu_sid') ;";
			   	$sql_edb = "INSERT into education_blackgrounf (`student_info_s_id`) 
		         	values('$stu_sid') ;";
			   	$sql_ext = "INSERT into extracurricular_act (`student_info_s_id`) 
		         	values('$stu_sid') ;";
			   	$sql_hob = "INSERT into hobby_info (`s_id`) 
		         	values('$stu_sid') ;";
			   	$sql_wex = "INSERT into work_experience (`student_info_s_id`) 
		         	values('$stu_sid') ;";



				    	
/*

	          //It wiil insert a row to xxx table from our csv file`
	           $sql = "INSERT into xx (`xx`, `xx`, `xx`, `xx`, `xx`, `xx`, `xx`) 
	            	values('$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]','$emapData[x]' ) ;";
*/


	         //we are using mysql_query function. it returns a resource on true else False on error
	    $result = mysqli_query( $conn, $sql) or die(mysqli_error($conn));

			        			$result_pjc = mysqli_query( $conn, $sql_pjc) or die(mysqli_error($conn));


	          	$result_edu = mysqli_query( $conn, $sql_edu) or die(mysqli_error($conn));
	          	$result_app = mysqli_query( $conn, $sql_app) or die(mysqli_error($conn));
	          	  	$result_res = mysqli_query( $conn, $sql_res) or die(mysqli_error());
	          	  	$result_tsc = mysqli_query( $conn, $sql_tsc) or die(mysqli_error());
	       	 		$result_vdo = mysqli_query( $conn, $sql_vdo) or die(mysqli_error());
	           		$result_vsa = mysqli_query( $conn, $sql_vsa) or die(mysqli_error());
	       	  		$result_oth = mysqli_query( $conn, $sql_oth) or die(mysqli_error());
	          	$result_tni = mysqli_query( $conn, $sql_tni) or die(mysqli_error($conn));
			        $result_bch = mysqli_query( $conn, $sql_bch) or die(mysqli_error($conn));
			        $result_bac = mysqli_query( $conn, $sql_bac) or die(mysqli_error($conn));
			        $result_thp = mysqli_query( $conn, $sql_thp) or die(mysqli_error($conn));
			        $result_thc = mysqli_query( $conn, $sql_thc) or die(mysqli_error($conn));
			        $result_thcii = mysqli_query( $conn, $sql_thcii) or die(mysqli_error($conn));
			        $result_thciii = mysqli_query( $conn, $sql_thciii) or die(mysqli_error($conn));
	          	$result_scd = mysqli_query( $conn, $sql_scd) or die(mysqli_error($conn));
	          		$result_ = mysqli_query( $conn, $sql_sec) or die(mysqli_error($conn));
	          	$result_spv = mysqli_query( $conn, $sql_spv) or die(mysqli_error($conn));
	          	$result_eva = mysqli_query( $conn, $sql_eva) or die(mysqli_error($conn));

	          		//reserve
	          	  	$result_add = mysqli_query( $conn, $sql_add) or die(mysqli_error());
	          	  	$result_rel = mysqli_query( $conn, $sql_rel) or die(mysqli_error());
	          	  	$result_edb = mysqli_query( $conn, $sql_edb) or die(mysqli_error());
	          	  	$result_ext = mysqli_query( $conn, $sql_ext) or die(mysqli_error());
	          	  	$result_hob = mysqli_query( $conn, $sql_hob) or die(mysqli_error());
	          	  	$result_wex = mysqli_query( $conn, $sql_wex) or die(mysqli_error());






/*
              $result_xx = mysqli_query( $conn, $xxxx) or die(mysqli_error($conn));
*/

				if(! $result || ! $result_edu)
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File or check your file format.\");
							window.location = \"../../../Student_Management.php\"
						</script>";
				
				} 


	         } 
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"../../../Student_Management.php\"
					</script>"; 
	        
			 

			 //close of connection
			mysqli_close($conn); 
				
		 	
			
		 }
	}	 
?>		 