
<?php 
session_start();

include "connection.php";
include "functions.php";

if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

      //ALWAYS USE mysqli_real_escape_string
    $username = mysqli_real_escape_string($connection,$username);  
    $password = mysqli_real_escape_string($connection,$password);

    $error_message = [];

    if (!empty($username) && !empty($password)) {
        // TODO:: use prepared statement
        $query = "SELECT * FROM admin WHERE username = '$username' limit 1";
        $result = mysqli_query($connection,$query);
        if ($result && mysqli_num_rows($result) > 0) {
           $row = mysqli_fetch_assoc($result);
          
           if ($row['password'] === $password) {
            $_SESSION['session_id'] = $row['session_id'];
            header("Location:index.php");
           }
           else {
            // $error_message =  "Account not found.";
            $error_message =  "Incorrect Password!";
           }   
        }
        else {
            $error_message =  "Account not found!";
           }
    }
    else {
        $error_message = "Please fill all fields!";
        // $error_message = "Please fill all fields.";
    }
}

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

	<script src="common/js/jquery-2.1.3.min.js"></script>
	<script src="common/js/iscroll.js"></script> 
	<script src="common/js/drawer.js"></script> 
	<script src="common/js/custom.js"></script>



</head>



<body id="login" class="drawer drawer--right">
	<!-- <header class="l_header_area">
		<div class="l_header l_wrap">
			<h1>
				<img class="l_header_title u_pc" src="common/images/header_title.png" alt="">
			</h1>
			<img class="l_header_detail u_pc" src="common/images/header_date.png" alt="">
		</div>
	</header> -->

	<div class="l_bg">
		<div class="l_container l_wrap clearfix">
			<!-- <button type="button" class="drawer-toggle drawer-hamburger">
			<button type="button" class="drawer-toggle drawer-hamburger">
				<span class="drawer-hamburger-icon"></span>
			</button> -->
			<div class="l_side_contents">
				<nav class="l_nav_area drawer-nav" role="navigation">
					<ul class="c_nav_type01">
						
						<img src="common/images/images/1x/nav_logo3.png" alt="" class="c_nav_logo_01">
					
						
					</ul>
				</nav>
			</div>

			<div class="l_main_contents">
				
					 <!-- <h1 class="c_ttl_type01">Patient Records Table</h1> -->

                 <div class="l_poster_area_login">
                     <div class="l_login_form_container">
                         <h1 class="c_login_ttl">Patients Record Management System</h1>
                                           <form action="login.php" method="post" class="l_login_form">
                                                <div class="l_login_form_input_container">
                                                    <div>
                                                        <p class="c_error_message"><?php if (isset($error_message)) {
                                                            echo $error_message;
                                                        } ?></p>
                                                    </div>
                                                    <div>
                                                            <input type="text" class="c_login_username" name="username" placeholder="Username">
                                                        </div>
                                                    <div>
                                                            <input type="password" class="c_login_password"  name="password" placeholder="Password">
                                                    </div>
                                                    <div>
                                                            <input type="submit" value="Login" class="c_btn_login" name="login_btn">
                                                    </div>
                                                </div>
                                            </form>
                                </div>
                     </div>
				
				</div>

			</div>

				

				
			</div>
		</div>
	</div>

	
<?php 
// include "footer.php"; 
?>