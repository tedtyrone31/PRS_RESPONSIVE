<?php 
session_start();

include "connection.php";
include "functions.php";

// $row = check_login($connection);
$user_data = check_login($connection);


?>


<!DOCTYPE html>
<html lang="ja">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<title>PATIENT RECORD MANAGEMENT SYSTEM </title>
	
	<meta name="keywords" content="">
	<meta name="description" content="">

	
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="shortcut icon" href="common/images/favicon.ico">
	<link href="common/css/normalize.css" rel="stylesheet" media="all">
	<link href="common/css/base.css" rel="stylesheet" media="all">
	<link href="common/css/layout.css" rel="stylesheet" media="all">
	<link href="common/css/component.css" rel="stylesheet" media="all">
	<link href="common/css/style.css" rel="stylesheet" media="all">
	<link href="common/css/style_sp.css" rel="stylesheet" type="text/css" media="all">
	<link href="common/css/drawer.css" rel="stylesheet" type="text/css" media="all">
	<link href="common/css/print.css" rel="stylesheet" media="print">
	<link href="common/css/print2.css" rel="stylesheet" media="print">

	<script src="common/js/jquery-2.1.3.min.js"></script>
	<script src="common/js/iscroll.js"></script> 
	<script src="common/js/drawer.js"></script> 
	<script src="common/js/custom.js"></script>



</head>
