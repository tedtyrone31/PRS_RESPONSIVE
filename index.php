<?php include "header.php"; ?>

<?php //GET PAGE NUMBER
if (isset($_GET['page_no']) && $_GET['page_no'] !=="") {
    $page_no = $_GET['page_no'];
}
else {
    $page_no = 1;
}

     
function highlightMatchedLetters($text, $search) {
    // Use regular expressions to match and highlight the letters
    return preg_replace("/(" . preg_quote($search, "/") . ")/i", "<span class='c_matched'>$1</span>", $text);
}


//TOTAL ROWS OR RECORDS TO DISPLAY
$total_records_per_page = 10;


//GET THE PAGE OFFSET FOR THE LIMIT QUERY

$offset = ($page_no-1) * $total_records_per_page;

//GET PREVIOUS PAGE
$previous_page = $page_no - 1;

//GET NEXT PAGE 
$next_page = $page_no + 1;

//GET THE TOTAL COUNT OF RECORDS
$result_count = mysqli_query($connection, "SELECT COUNT(*) as total_records FROM personal_info")
                or die(mysqli_error($connection));

//TOTAL RECORDS 
$records = mysqli_fetch_assoc($result_count);

//STORE TOTAL_RECORDS TO A VARIABLE;
$total_records = $records['total_records'];


//GET TOTAL PAGES
$total_no_of_pages = ceil($total_records / $total_records_per_page);

?>

<body id="top" class="drawer drawer--right">
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
			<button type="button" class="drawer-toggle drawer-hamburger">
			<button type="button" class="drawer-toggle drawer-hamburger">
				<span class="drawer-hamburger-icon"></span>
			</button>
			<div class="l_side_contents">
				<nav class="l_nav_area drawer-nav" role="navigation">
					<ul class="c_nav_type01">
						<button type="button" class="drawer-toggle drawer-hamburger"> 
							<span class="drawer-hamburger-icon"></span> 
						</button>
						<img src="common/images/images/1x/nav_logo3.png" alt="" class="c_nav_logo_01 sp_hidden">
                        <li><a class="c_btn_patient_table active">Home</a></li>
                        <li><a class="c_btn_add_record ">Add Record</a></li>
                        <img src="common/images/images/1x/nav_logo3.png" alt="" class="c_nav_logo_01 sp_show u_mat20">
                    </ul>
				</nav>
			</div>
            <?php
             if (isset($_GET['page_no'])) {
                $_SESSION['page_no'] = $_GET['page_no'];
            }
            ?>

			<div class="l_main_contents">
				<div class="l_card c_card1 show">
					<div class="l_poster_area">
					
					 <h1 class="c_ttl_type01">Patient Records Table</h1>
					 <div class="l_right_content_inside_bg">
                                   <div class="c_form_container">
										<form action="" method="post">
											<!-- <div class="flex jstfy_content_flex_end" style="padding-top: 20px;"> -->
											<div class="u_flex is_jc_spBetween is_ai_center" style="padding-top: 20px;">
													<div class="u_flex c_refresh_container" style="align-items: flex-end;">
														<a href="index.php?page_no=1" class="c_refresh" id="unsetLink">⟳ Refresh</a>
                                                        
                                                    </div>
													<div class="l_search_bar_container">
															<div class="l_main_search_container">
																<div style="display: flex;align-items:center">
																	<button class="search_btn" name="search_btn"></button>
																</div>
																<input class="c_search" type="c_search" name="search" placeholder="Search..." autocomplete="off">
															</div>
													</div>
											</div>
										</form>
								   </div>
                                        <div class="c_table_container sp_hidden">
                                            <table class="c_table_type01">
                                                <tr>
                                                    <th>PATIENT ID</th>
                                                    <th>Last Name</th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Contact No.</th>
                                                    <th>Checked-up Date</th>
                                                    <th class="c_action_column">Action</th>
                                                 </tr>   
												 <?php 
                                                
                                                if (isset($_POST['search_btn'])) {
                                                    $search = $_POST['search'];
                                                    if(!empty($search)) {
                                                        displaySearchRecord();
                                                    }
                                                   else {
                                                    echo noResultFound ($search);
                                                   }
                                                }
                                                else {
                                                  
                                                    displayRecord();
                                                    // $query = "SELECT * FROM personal_info LIMIT 
                                                    // $offset , $total_records_per_page";
 
                                                 } ?>
                                             
                                            </table>
                                        </div>

                                        <div class="c_table_container sp_show">
                                            <table class="c_table_type01">
                                                <tr>
                                                    
                                                    <th class="c_action_column">Action</th>
                                                    <th>PATIENT ID</th>
                                                    <th>Last Name</th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Contact No.</th>
                                                    <th>Checked-up Date</th>
                                                 </tr>   
												 <?php 
                                                
                                                if (isset($_POST['search_btn'])) {
                                                    $search = $_POST['search'];
                                                    if(!empty($search)) {
                                                        displaySearchRecord();
                                                    }
                                                   else {
                                                    echo noResultFound ($search);
                                                   }
                                                }
                                                else {
                                                  
                                                    displayRecordSp();
                                                    // $query = "SELECT * FROM personal_info LIMIT 
                                                    // $offset , $total_records_per_page";
 
                                                 } ?>
                                             
                                            </table>
                                        </div>
                                </div>
								<div class="l_pagination_main_container">
                                    <nav class="l_pagination">
                                                <ul class="l_pagination_list u_mab10">
                                                    <li>
                                                        <a class="c_previous <?php echo ($page_no <= 1) ? 'disabled' : ''; ?>" <?php echo ($page_no > 1) ? 'href="?page_no=' . $previous_page . '"' : ''; ?>><</a></li>
                                                    </li>
                                                <?php 

                                                //CONTROL PAGINATION NUMBER 
                                               

                                                  $pages_to_show = 2; // Change this number to control the number of pagination links to display
                                                  $half_pages = floor($pages_to_show / 2);

                                                  $start_page = max(1, $page_no - $half_pages);
                                                  $end_page = min($total_no_of_pages, $page_no + $half_pages);

                                                  for ($counter = $start_page; $counter <= $end_page; $counter++) {
                                                      if ($page_no != $counter) {
                                                          echo '<li><a href="?page_no=' . $counter . '">' . $counter . '</a></li>';
                                                      } else {
                                                          echo '<li><a class="active" href="?page_no=' . $counter . '">' . $counter . '</a></li>';
                                                      }

                                                    }
                                                
                                                     //SHOW ALL PAGINATION NUMBER 
                                                
                                            //     for($counter = 1;$counter<= $total_no_of_pages;$counter++) {
                                            //         if ($page_no != $counter) {
                                            //             echo ' <li><a href="?page_no='.$counter.'">'.$counter.'</a></li>';
                                            //         }
                                            //         else {
                                            //             echo ' <li><a class = "active" href="?page_no='.$counter.'">'.$counter.'</a></li>';
                                            //         }
                                            // }
                                                ?>
                                                <li>
                                                <a class="c_next <?php echo ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" 
                                                <?php echo ($page_no < $total_no_of_pages) ? 'href="?page_no=' . $next_page . '"' : ''; ?>>></a></li>
                                                </li>
                                                </ul>
												<div class="l_show_pages">
													<p class="c_show_pages">Page <?php echo $page_no;?>
													of <?php echo $total_no_of_pages ?>
													</p>
												</div>
                                        </nav>
                                       
                                   </div>

                            </div>
				</div>	


				<div class="l_card c_card2">
					<div class="l_poster_area">
                    <h1 class="c_ttl_type01">Add Patient Record</h1>
                    <a class="c_close_btn c_close_btn_index">X</a>
                    <div class="l_right_content_inside_bg bg_none">
                                        <form action="" method="post" class="l_add_record_form">
                                            <div class="u_flex  is_jc_spBetween l_info_container_main_container l_double">
                                                <div class="mar50">
                                                    <div class="">
                                                    <h2 class="c_ttl_type02 l_logo_relative">Personal Information</h2>
                                                            <div class="flex l_info_container ">
                                                        
                                                                <div class="l_personal_information_input">
                                                                    <br>
                                                                    <div class="c_info">
                                                                        <input class="" type="text" name="firstName" placeholder="" required="required" autocomplete="off">
                                                                        <span class="c_value">Firstname</span>
                                                                    </div>
                                                                    <div class="c_info">
                                                                        <input class="" type="text" name="lastName" placeholder="" required autocomplete="off">
                                                                        <span class="c_value">Lastname</span>
                                                                    </div>
                                                                    <div class="c_info">
                                                                        <input class="" type="text" name="middleName" placeholder="" required autocomplete="off">
                                                                        <span class="c_value">Middlename</span>
                                                                    </div>
                                                                </div>
                                                                    <!-- <input class="c_address" type="text" name="firstName" placeholder="Address"> -->
                                                                    <div class="c_info_">
                                                                        <select class="c_gender" name="gender" id="" required>
                                                                                <option value="" selected="true" disabled ="disabled">Gender</option>
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                        </select>
                                                                        <div class="flex c_info_">
                                                                        <label for="">Birthdate:</label>
                                                                        <input class="c_bdate" type="date" name="birthdate" placeholder="Birthdate" required>
                                                                        </div> <br>
                                                                        <div class="flex is_9_vw">
                                                                           <div class="c_info_extra">
                                                                                <input class="required-input c_weight c_remove_arrow" type="number" name="height" autocomplete="off" style="text-align:center;">
                                                                                <span class="c_value_extra">Height(cm)</span>
                                                                           </div>
                                                                           <div class="c_info_extra">
                                                                                <input class="required-input c_height c_remove_arrow" type="number" name="weight" autocomplete="off" style="text-align:center;">
                                                                                <span class="c_value_extra">Weight(kg)</span>
                                                                           </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="c_info">
                                                                        <input class="c_contact c_remove_arrow" type="number" name="contact" required="required" autocomplete="off">
                                                                        <span class="c_value">Contact Number</span>
                                                                    </div>

                                                                    <div class="c_info">
                                                                        <textarea style="width: 90%;" class="address" name="address" id="" cols="5" rows="5" required autocomplete="off"></textarea>
                                                                        <span class="c_value">Address</span>
                                                                    </div>
                                                                </div> 
                                                    </div>
                                                    <br>
                                                    <div class="">
                                                <h2 class="c_ttl_type02 l_logo_vital_relative">Vital Signs</h2>
                                                    <div class="flex l_info_container ">
                                                        <div class="c_info_container">
                                                            <br>
                                                            <div class="">
                                                                <div class="c_info_" style="flex-direction: column;">
                                                                    <label for="">Date of checked-up:</label>
                                                                    <input class="c_date_checked_up" type="date" name="checked_up_date" value="<?php echo date("Y-m-d"); ?>">
                                                                  
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="">
                                                                <div class="flex is_12_vw">
                                                                    <div class="c_info_extra">
                                                                                <input class="required-input c_temperature" type="input" name="temperature" autocomplete="off">
                                                                                <span class="c_value_extra">Temperature</span>
                                                                    </div>
                                                                    <div class="c_info_extra">
                                                                                <input class="required-input c_blood_pressure" type="input" name="blood_pressure" autocomplete="off">
                                                                                <span class="c_value_extra">Blood Pressure</span>
                                                                    </div>
                                                                </div>
                                                                <div  class="flex is_12_vw">
                                                                    <div class="c_info_extra">
                                                                                <input class="required-input c_temperature" type="input" name="pulse" autocomplete="off">
                                                                                <span class="c_value_extra">Pulse/Heart Rate</span>
                                                                    </div>
                                                                    <div class="c_info_extra">
                                                                                <input class="required-input c_temperature" type="input" name="saturation" autocomplete="off">
                                                                                <span class="c_value_extra">O2 Saturation</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                                </div>

                                                
                                                <div class="">
                                                <h2 class="c_ttl_type02 l_logo_physical_relative">Medical Findings</h2>
                                                    <div class="flex l_info_container ">
                                                        <div class="c_info_container">
                                                            
                                                            <div class=""><br>
                                                                <div class="c_info_extra">
                                                                    <textarea class="required-input" name="allergies" id="" cols="10" rows="3" style="width: 25vw;"></textarea>
                                                                    <span class="c_value_extra">List of Allergies</span>
                                                                </div>
                                                                <div class="c_info_extra">
                                                                    <textarea class="required-input" name="taken" id="" cols="10" rows="3" style="width: 25vw;"></textarea>
                                                                    <span class="c_value_extra">Medications Taken</span>
                                                                </div>
                                                                <div>
                                                                <div class="c_info_extra">
                                                                    <textarea class="required-input" name="history" id="" cols="10" rows="3" style="width: 25vw;"></textarea>
                                                                    <span class="c_value_extra">Medical History</span>
                                                                </div>
                                                                <div class="c_info_extra">
                                                                    <textarea class="required-input" name="complaints" id="" cols="10" rows="3" style="width: 25vw;"></textarea>
                                                                    <span class="c_value_extra">Complaints</span>
                                                                </div>
                                                                <div class="c_info_extra">
                                                                    <textarea class="required-input" name="physical" id="" cols="10" rows="3" style="width: 25vw;"></textarea>
                                                                    <span class="c_value_extra">Physical Exam</span>
                                                                </div>
                                                                <div class="c_info_extra">
                                                                    <textarea class="required-input" name="findings" id="" cols="10" rows="3" style="width: 25vw;"></textarea>
                                                                    <span class="c_value_extra">Diagnosis</span>
                                                                </div>
                                                                <div class="c_info_extra">
                                                                    <textarea class="required-input" name="medication" id="" cols="10" rows="3" style="width: 25vw;"></textarea>
                                                                    <span class="c_value_extra">Medication / Prescription</span>
                                                                </div>
                                                                <div class="c_info_extra">
                                                                    <textarea class="required-input" name="recommendation" id="" cols="10" rows="3" style="width: 25vw;"></textarea>
                                                                    <span class="c_value_extra">Recommendations</span>
                                                                </div>
                                                                <div class="flex is_column">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                                </div>
                                            </div>
                                            <button class="c_btn_type01 c_btn_add_record_btn" name="add_record_btn">Save</button>
                                        </form>
                                        <?php 
                                        // TODO:: wtf is this shit! DRY??
                                    if (isset($_POST['add_record_btn'])) {
                                        $firstName = $_POST['firstName'];
                                        $lastName = $_POST['lastName'];
                                        $middleName = $_POST['middleName'];
                                        $gender = $_POST['gender'];
                                        $contact = $_POST['contact'];
                                        // $civil_status = $_POST['civil_status'];
                                        // $religion = $_POST['religion'];
                                        $birthdate = $_POST['birthdate'];
                                        // $birthplace = $_POST['birthplace'];
                                        // $occupation = $_POST['occupation'];
                                        $address = $_POST['address'];
                                        $height = $_POST['height'];
                                        $weight = $_POST['weight'];
                                        $pulse = $_POST['pulse'];
                                        $blood_pressure = $_POST['blood_pressure'];
                                        // $respiratory_rate = $_POST['respiratory_rate'];
                                        $allergies = $_POST['allergies'];
                                        $findings = $_POST['findings'];
                                        // $remarks = $_POST['remarks'];
                                        $checked_up_date = $_POST['checked_up_date'];
                                        $temperature = $_POST['temperature'];
                                        $saturation = $_POST['saturation'];
                                        $taken = $_POST['taken'];
                                        $complaints = $_POST['complaints'];
                                        $history = $_POST['history'];
                                        $medication = $_POST['medication'];
                                        $physical = $_POST['physical'];
                                        $recommendation = $_POST['recommendation'];

                                        $firstName = ucwords($firstName);
                                        $lastName = ucwords($lastName);
                                        $middleName = ucwords($middleName);
                                        $gender = ucwords($gender);
                                        $contact = ucwords($contact);
                                        // $civil_status = ucwords($civil_status);
                                        // $religion = ucwords($religion);
                                        // $birthplace = ucwords($birthplace);
                                        // $occupation = ucwords($occupation);
                                        $address = ucwords($address);
                                        $allergies = ucwords($allergies);
                                        $findings = ucwords($findings);
                                        // $remarks = ucwords($remarks);
                                        $temperature = ucwords($temperature);
                                        $saturation = ucwords($saturation);
                                        $taken = ucwords($taken);
                                        $complaints = ucwords($complaints);
                                        $history = ucwords($history);
                                        $medication = ucwords($medication);
                                        $physical = ucwords($physical);
                                        $recommendation = ucwords($recommendation);

                                        addRecord();
                                    }
                                ?>
                                       
                                </div>
                    </div>
				</div>	

				
			</div>

				

				<!-- <div class="l_news_area u_mab30">
					<p class="l_news_header">NEWS with custom Scrollbar</p>
					<dl class="c_news_type01 clearfix scroll-pane">
						<dt>2019.00.00</dt>
						<dd>sample sample sample sample sample</dd>
						<dt>2019.00.00</dt>
						<dd>sample sample sample sample sample</dd>
						<dt>2019.00.00</dt>
						<dd>sample sample sample sample sample</dd>
						<dt>2019.00.00</dt>
						<dd>sample sample sample sample sample</dd>
					</dl>
				</div> -->

				

			</div>
		</div>
	</div>

	<!-- <p class="l_pagetop top_btn"><a href="#"><img src="common/images/page_top.png" alt="ページトップ"></a></p> -->

	<p class="l_pagetop top_btn"><a href="#"><img src="common/images/images/1x/injection.png" alt="ページトップ"></a></p>

	
<?php 
include "footer.php"; 
?>