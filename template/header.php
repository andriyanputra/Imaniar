<!DOCTYPE html>
<html>
<head>
	<head>
		<meta charset="utf-8" />
		<title>
			<?php 
				date_default_timezone_set("Asia/Jakarta");
				if(isset($_SESSION['header'])){
					if($_SESSION['header'] == ''){
						echo "Login Page";
					}else{
						echo $_SESSION['header'];
					}
				}else{
					echo "Login Page";
				}
			?> 
			- Kas Kecil
		</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="shortcut icon" type="image/png" href="assets/images/ico.png"/>
		<!--page specific plugin styles-->

		<!--fonts-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		<!--inline styles related to this page-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>