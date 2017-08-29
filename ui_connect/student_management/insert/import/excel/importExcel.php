<!DOCTYPE html>
<?php 

	include 'db.php';
	


?>	
<html lang="en">

<!--
	<head>
		<meta charset="utf-8">
		<title>Import Excel To Mysql Database Using PHP </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySql Database Using php">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">


	</head> -->
   

	<!-- Navbar
    ================================================== -->
<!--
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Import Excel To Mysql Database Please Work!! </a>
				
			</div>
		</div>
	</div> 
-->



	<div id="wrap">
	<div class="container">


<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h2 class="w3-center">IMPORT CSV/EXCEL FILE</h2>
  <p class="w3-center"><em>"1,000 lists are the maximum per time"</em></p>
								<p>&nbsp;</p>
								<p>&nbsp;</p>


		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="insert/import/excel/import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							
							<div align="center">
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<input type="file" name="file" id="file" class="input-large">
								<p>&nbsp;</p>
								<p>&nbsp;</p>
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="w3-btn w3-block w3-green" style="width:100%" data-loading-text="Loading...">Upload</button>
								<p>&nbsp;</p>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
		
	</div>

	</div>

</div>

</html>