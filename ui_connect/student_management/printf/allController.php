	<?php	
		$maxRows_studentSet_all = 10;
		$pageNum_studentSet_all = 0;
		if (isset($_GET['pageNum_studentSet_all'])) {
		  $pageNum_studentSet_all = $_GET['pageNum_studentSet_all'];
		}
		$startRow_studentSet_all = $pageNum_studentSet_all * $maxRows_studentSet_all;
		
		mysqli_select_db($MyConnect, $database_MyConnect);
			$query_studentSet_all = "SELECT student_info.s_id, title.title_name, student_info.s_fname, student_info.s_lname, student_status.status_desc, major_info.major_name, degree_info.degree_name
			FROM student_info
			INNER JOIN title ON title.title_id = student_info.title_title_id
			INNER JOIN student_status ON student_status.status_id = student_info.status_id
			LEFT JOIN education_info ON student_info.s_id = education_info.s_id
			LEFT JOIN major_info ON major_info.major_id = education_info.major_id
			LEFT JOIN degree_info ON degree_info.degree_id = education_info.degree_id
			ORDER BY student_info.s_id DESC";
		$query_limit_studentSet_all = sprintf("%s LIMIT %d, %d", $query_studentSet_all, $startRow_studentSet_all, $maxRows_studentSet_all);
		$studentSet_all = mysqli_query($MyConnect, $query_limit_studentSet_all) or die(mysqli_error());
		$row_studentSet_all = mysqli_fetch_assoc($studentSet_all);
		
		if (isset($_GET['totalRows_studentSet_all'])) {
		  $totalRows_studentSet_all = $_GET['totalRows_studentSet_all'];
		} else {
		  $all_studentSet = mysqli_query(dbconnect(), $query_studentSet_all); //dbconnect()
		  $totalRows_studentSet_all = mysqli_num_rows($all_studentSet);
		}
		$totalPages_studentSet_all = ceil($totalRows_studentSet_all/$maxRows_studentSet_all)-1;
		
		$queryString_studentSet_all = "";
		if (!empty($_SERVER['QUERY_STRING'])) {
		  $params_all = explode("&", $_SERVER['QUERY_STRING']);
		  $newParams = array();
		  foreach ($params_all as $param) {
			if (stristr($param, "pageNum_studentSet_all") == false && 
				stristr($param, "totalRows_studentSet_all") == false) {
			  array_push($newParams, $param);
			}
		  }
		  if (count($newParams) != 0) {
			$queryString_studentSet_all = "&" . htmlentities(implode("&", $newParams));
		  }
		}
		$queryString_studentSet_all = sprintf("&totalRows_studentSet_all=%d%s", $totalRows_studentSet_all, $queryString_studentSet_all);

?>