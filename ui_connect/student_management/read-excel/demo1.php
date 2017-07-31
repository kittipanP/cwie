<?

include('Excel/reader.php');
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('tis602');
$data->read('xls/test.xls');


$arr = array();
$s = 0;


$hostname_MyConnect = "localhost";
$database_MyConnect = "db_test";
$username_MyConnect = "root";
$password_MyConnect = "Kp5610761!";
$MyConnect = mysqli_connect($hostname_MyConnect, $username_MyConnect, $password_MyConnect) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_set_charset($MyConnect, "utf-8"); 

			
//mysqli_connect("localhost","root","Kp5610761!");
mysqli_select_db( $MyConnect , "db_test");

	for ($x = 2; $x <= count($data->sheets[$s]["cells"]);$x++) {
		
		for($i=1;$i<=7;$i++){
			$arr[$i] =  $data->sheets[$s]["cells"][$x][$i];
		}
<<<<<<< HEAD
		$sql = "INSERT INTO tbl_excel(a,b,c,d,e,f) VALUES('%s','%s','%s','%s','%s','%s');";
=======
		$sql = "INSERT INTO tbl_excel VALUE('%s','%s','%s','%s','%s','%s','%s');";
>>>>>>> fix_bug-stu
		$v = vsprintf($sql,$arr);
		echo $v;
		echo  '<br/>';
		mysqli_query($MyConnect, $v);

	} 

mysqli_close($MyConnect);

?>
