<?php include ("../../../Connections/Myconnect.php"); ?>
<?php //include ("../../../ui_connect/student_management/insert/stu-insert-reccordset.php"); ?>
<?

include('Excel/reader.php'); 
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('utf-8'); 
$data->read('xls/import-stu.xls'); //.xls file that will be imported


$arr = array();
$arrEdu = array();
$s = 0;

/*
$hostname_MyConnect = "localhost";
$database_MyConnect = "cwie_db";
$username_MyConnect = "root";
$password_MyConnect = "Kp5610761!";
$MyConnect = mysqli_connect($hostname_MyConnect, $username_MyConnect, $password_MyConnect) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_set_charset($MyConnect, "utf-8"); */
/*
mysqli_query($MyConnect, "SET character_set_results=utf8");
mysqli_query($MyConnect, "SET character_set_client=utf8");
mysqli_query($MyConnect, "SET character_set_connection=utf8"); */

			
//mysqli_connect("localhost","root","Kp5610761!");

////mysqli_select_db($MyConnect, $database_MyConnect);
//mysqli_select_db( $MyConnect , "cwie_db");

mysqli_select_db($MyConnect, $database_MyConnect);
	for ($row = 2; $row <= count($data->sheets[$s]["cells"]);$row++) {
		
		for($col=1;$col<=7;$col++){
			if($col == 1){
				$arr[$col] = $data->sheets[$s]["cells"][$row][$col];

			    /*-- titleSet for importExcel [S]--*/
			    $query_titleSetii = "SELECT * FROM title WHERE title.title_name = '$arr[$col]' ";
			    $titleSetii = mysqli_query($MyConnect, $query_titleSetii) or die(mysqli_error($MyConnect));
			    $row_titleSetii = mysqli_fetch_assoc($titleSetii);
			    $totalRows_titleSetii = mysqli_num_rows($titleSetii);
			    /*-- titleSet for importExcel [E]--*/


			    $arr[$col] = $row_titleSetii['title_id']; // 'MR.' == '1' or 'MS.' == '2'
			    //echo $arr[$col];
                        
			}elseif ($col == 6){
				$arr[$col] = $data->sheets[$s]["cells"][$row][$col];

			    /*-- statusSet for importExcel [S]--*/
				$query_statusSetii = "SELECT * FROM student_status WHERE student_status.status_desc = '$arr[$col]' ";
				$statusSetii = mysqli_query($MyConnect, $query_statusSetii) or die(mysqli_error());
				$row_statusSetii = mysqli_fetch_assoc($statusSetii);
				$totalRows_statusSetii = mysqli_num_rows($statusSetii);
			    /*-- statusSet for importExcel [E]--*/


			    $arr[$col] = $row_statusSetii['status_id']; //


			}elseif ($col == 8){
				//$arr[$col] = $data->sheets[$s]["cells"][$row][$col];



			    //$arr[$col] = $row_studentSet['s_id']+1; //

					    /*-- education_infoSet [S]--*/
				$query_studentSet = "SELECT * FROM student_info
					ORDER BY student_info.s_id DESC";
				$studentSet = mysqli_query($MyConnect, $query_studentSet) or die(mysqli_error());
				$row_studentSet = mysqli_fetch_assoc($studentSet);
				$totalRows_studentSet = mysqli_num_rows($studentSet);
			    /*-- education_infoSet [E]--*/

			    $arrEdu[$col] = $row_studentSet['s_id']+$row-1;

			}else{

				$arr[$col] = $data->sheets[$s]["cells"][$row][$col];
			}
		}


		$sql = "INSERT INTO student_info(title_title_id, s_fname,s_lname,thai_fname,thai_lname, status_id, s_dob) VALUES('%s','%s','%s','%s','%s','%s','%s') ;";
		//$sqlii = "INSERT INTO education_info(s_id, degree_id) VALUES('%s', '%s') ;";

		$v = vsprintf($sql, $arr);
		//$vii = vsprintf($sqlii, $arrEdu);
		echo $v;
		echo  '<br/>';
		mysqli_query($MyConnect, $v);
		//mysqli_query($MyConnect, $vii);
		/*
		if($insertSQL_stu){
			echo '<script> language="javascript"';
			echo 'alert("cooompete")';
			echo '</script>';
		} */


	} 

mysqli_close($MyConnect);

?>