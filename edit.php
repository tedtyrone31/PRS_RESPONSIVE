<?php include "header.php"; ?>


<body id="edit" class="drawer drawer--right">
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
			<div class="sp_hidden">
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
						<img src="common/images/images/1x/nav_logo3.png" alt="" class="c_nav_logo_01">
					
					</ul>
				</nav>
			</div>
            </div>
             <!-- <div class="l_card c_card2"> -->
             <?php 

                        $id = $_GET['edit_id'];
                        $_SESSION['page_no'] = "";
                        $page_no_last = $_SESSION['page_no'];
                        

                        if (!empty($id)) {
                            $query = "SELECT personal_info.*, medical_record.*
                            FROM personal_info
                            LEFT JOIN medical_record ON personal_info.id = medical_record.id
                            WHERE personal_info.id = $id
                            ORDER BY medical_record.medical_record_id DESC limit 1";
                             // ORDER BY medical_record.checked_up_date DESC, medical_record.checked_up_time DESC";
                            
                            $result = mysqli_query($connection,$query);
                            
                            
                            if ($result) {
                                $processedIds = []; // Initialize an array to store processed IDs
                        
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                        
                                    // Check if this ID has already been processed
                                    if (!in_array($id, $processedIds)) {
                                        $processedIds[] = $id; // Mark this ID as processed
                                        
                                    $firstName = $row['firstName'];
                                    $lastName = $row['lastName'];
                                    $middleName = $row['middleName'];
                                    $gender = $row['gender'];
                                    $contact = $row['contact'];
                                    // $civil_status = $row['civil_status'];
                                    // $religion = $row['religion'];
                                    $birthdate = $row['birthdate'];
                                    // $birthplace = $row['birthplace'];
                                    // $occupation = $row['occupation'];
                                    $address = $row['address'];
                                    $height = $row['height'];
                                    $weight = $row['weight'];
                                    $pulse = $row['pulse'];
                                    $blood_pressure = $row['blood_pressure'];
                                    // $respiratory_rate = $row['respiratory_rate'];
                                    $allergies = $row['allergies'];
                                    $findings = $row['findings'];
                                    // $remarks = $row['remarks'];
                                    $temperature = $row['temperature'];
                                    $saturation = $row['saturation'];
                                    $taken = $row['taken'];
                                    $complaints = $row['complaints'];
                                    $history = $row['history'];
                                    $medication = $row['medication'];
                                    $physical = $row['physical'];
                                    $checked_up_date = $row['checked_up_date'];
                                    $recommendation = $row['recommendation'];
                                    // $checked_up_time = $row['checked_up_time'];
                                    // $am_pm = $row['am_pm'];
    
                                }
                            }
                            }
                        }
                        else {
                            echo "<script>alert('No Medical Record Found. Please create New Record.')</script>";
                            echo "<script>setTimeout(function() { window.location.href = 'index.php#add_record_form'; }, 1);</script>";
                        }
                        ?>
			<div class="l_main_contents">
				<div class="l_card ">
                    <?php $id = $_GET['edit_id']; ?>
					<div class="l_poster_area">
                    <h1 class="c_ttl_type01">Update <br class="sp_show"> Patient Record</h1>
                    <?php 
                    // echo $page_no_last 
                    ?>
                    <a class="c_close_btn c_close_btn_index" href="index.php?page_no=<?php echo $page_no_last ?>">X</a>
                    <div class="l_right_content_inside_bg bg_none">
                                        <form action="" method="post" class="l_edit_form">
                                            <div class="l_info_container_main_container">
                                                <div class="u_mab40">
                                                <h2 class="c_ttl_type02">Personal Information</h2>
                                                    <div class="flex l_info_container c_update_personal_info_btn_relative">
                                                            <div class="c_patient_info_id_container"> 
                                                                <p class="c_patient_id">PATIENT ID: <?php echo $id ?></p>
                                                            </div>
                                                            <div class="c_edit_info_labels c_input_names">
                                                                <div class="c_info_">
                                                                    <p>Firstname</p>
                                                                    <input class="" type="text" name="firstName" placeholder="" value = "<?php echo $firstName ?>">
                                                                </div>
                                                                <div class="c_info_">
                                                                    <p>Lastname</p>
                                                                    <input type="text" name="lastName" placeholder="" value = "<?php echo $lastName ?>">
                                                                </div>
                                                                <div class="c_info_">
                                                                    <p>Middlename</p>
                                                                    <input type="text" name="middleName" placeholder="" value = "<?php echo $middleName ?>">
                                                                </div>
                                                            </div>
                                                            <div class="u_flex c_edit_info_labels c_input_other_info">
                                                                <div class="c_info_">
                                                                    <p>Contact No.</p>
                                                                    <input class="c_contact_no" type="text" name="contact" placeholder="" value = "<?php echo $contact ?>"> 
                                                                </div>
                                                                <div class="c_info_">
                                                                    <p>Birthdate</p>
                                                                    <input style="height: 32px;" class="c_bdate" type="date" name="birthdate" placeholder="" value = "<?php echo $birthdate ?>"></p>
                                                                </div>
                                                                <div class="c_info_">
                                                                    <p>Gender</p>
                                                                    <select name="gender" id="" value="" class="c_gender">
                                                                        <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                                                                        <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- <input class="c_address" type="text" name="firstName" placeholder="Address"> -->
                                                            <div class="flex c_edit_info_labels">
                                                                <div class="c_info_">
                                                                    <p>Address</p>
                                                                    <textarea class="c_address" name="address" id="" cols="5" rows="2" placeholder="" value = ""><?php echo $address ?></textarea>
                                                                </div>
                                                          
                                                        </div>
                                                    
                                                           <div class="c_update_personal_info_btn_container u_mat30">
                                                            <a class="c_update_personal_info_btn">Update</a>   
                                                           </div>  
                                                            <!-- <button class="c_btn_type1 c_update_personal_info_btn" name="update_personal_info_btn">Update</button>      -->
                                                        </div> 
                                                        <?php 
                                                            // if (isset($_POST['update_personal_info_btn'])) {
                                                            //     updatePersonalInfoRecord();
                                                            // };
                                                        ?>
                                                        
                                                </div>
                                                
                                                <div class="mat10 l_recent_med_exam">
                                                <h2 class="c_ttl_type02 ">Recent Medical Examination</h2>
                                                    <div class="flex l_info_container c_update_medical_record_btn_relative">
                                                        <div class="c_info_container">
                                                            <div class="u_flex is_jc_spBetween">
                                                                        <p class="c_btn_type01 c_create_new_btn u_sp_mab20">CREATE <br class="sp_hidden"> NEW <br class="sp_hidden">RECORD</p>
                                                                        <div class="c_info_">
                                                                        <label for="" class="c_physical_exam_checked_up_date">Date of checked-up:</label>
                                                                        <input class="c_date_checked_up" type="date" name="checked_up_date" value = "<?php echo $checked_up_date ?>">
                                                                        </div>
                                                                    </div><br class="sp_hidden"><br class="sp_hidden">
                                                            <div class="u_flex c_edit_info_labels c_physical_examination_field_input" style="justify-content: flex-start;">
                                                                    <div class="c_info_ u_mar20">
                                                                        <p>Height(cm)</p>
                                                                        <input class="c_edit_height" type="text" name="height" placeholder="" value = "<?php echo $height ?>">
                                                                    </div>
                                                                    <div class="c_info_">
                                                                        <p>Weight(kg)</p>
                                                                        <input class="c_edit_weight" type="text" name="weight" placeholder="" value = "<?php echo $weight ?>">
                                                                    </div>
                                                                 
                                                            </div>
                                                            <div class="u_flex is_jc_spBetween c_edit_info_labels c_physical_examination_field_input">
                                                                 
                                                                    <div class="c_info_">
                                                                        <p>Temperature</p>
                                                                        <input class="c_edit_temperature" type="text" name="temperature" placeholder="" value = "<?php echo $temperature ?>">
                                                                    </div>
                                                                    <div class="c_info_">
                                                                        <p>Blood Pressure</p>
                                                                        <input class="c_edit_blood_pressure" type="text" name="blood_pressure" placeholder="" value = "<?php echo $blood_pressure ?>">
                                                                    </div class="c_info_">
                                                                   <div class="c_info_">
                                                                        <p>Pulse / Heart Rate</p>
                                                                        <input class="c_edit_pulse" type="text" name="pulse" placeholder="" value = "<?php echo $pulse ?>">
                                                                   </div>
                                                                    <div class="c_info_">
                                                                        <p>O2 Saturation</p>
                                                                        <input class="c_edit_saturation" type="text" name="saturation" placeholder=" " value = "<?php echo $saturation ?>">
                                                                    </div>
                                                            </div>
                                                           
                                                            <div class="is_100_percent">
                                                                <div class="flex c_edit_info_labels is_column">
                                                                    <div class="c_info_">
                                                                        <p>Allergies</p>
                                                                        <textarea class="c_edit_allergies" name="allergies" id="" cols="10" rows="2" placeholder=""  value = ""><?php echo $allergies ?></textarea>
                                                                    </div>
                                                                    <div class="c_info_">
                                                                        <p>Medications Taken:</p>
                                                                        <textarea class="c_edit_taken" name="taken" id="" cols="10" rows="2" placeholder=""  value = ""><?php echo $taken ?></textarea>
                                                                    </div>
                                                                    <div class="c_info_">
                                                                        <p>Medical History</p>
                                                                        <textarea class="c_edit_history" name="history" id="" cols="10" rows="2" placeholder=""  value = ""><?php echo $history ?></textarea>
                                                                    </div>
                                                                    <div class="c_info_">
                                                                        <p>Complaints</p>
                                                                        <textarea class="c_edit_complaints" name="complaints" id="" cols="10" rows="2" placeholder=""  value = ""><?php echo $complaints ?></textarea>
                                                                    </div>
                                                                    <div class="c_info_">
                                                                        <p>Physical Exam:</p>
                                                                        <textarea class="c_edit_physical" name="physical" id="" cols="10" rows="2" placeholder=""  value = ""><?php echo $physical ?></textarea>
                                                                    </div>
                                                                    <div class="c_info_">
                                                                        <p>Diagnosis</p>
                                                                        <textarea class="c_edit_findings" name="findings" id="" cols="10" rows="2" placeholder=""  value = ""><?php echo $findings ?></textarea>
                                                                    </div>
                                                                    <div class="c_info_">
                                                                        <p>Medication / Prescription</p>
                                                                        <textarea class="c_edit_medication"  name="medication" id="" cols="10" rows="2" placeholder=""  value = ""><?php echo $medication ?></textarea>
                                                                    </div>
                                                                    <div class="c_info_">
                                                                        <p>Recommendations</p>
                                                                        <textarea class="c_recommendation"  name="recommendation" id="" cols="10" rows="2" placeholder=""  value = ""><?php echo $recommendation ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div style="margin-top: 3vw;">
                                                        <div class="c_update_personal_info_btn_container">
                                                         <a class="c_update_medical_record_btn">Update</a>
                                                        </div>
                                                        </div>
                                                        <!-- <button class="c_btn_type1 c_update_medical_record_btn" name="update_medical_record_btn">Update</button> -->
                                                    </div> 
                                                </div>
                                            </div>
                                            <?php 
                                                // if (isset($_POST['update_medical_record_btn'])) {
                                                //     updateMedicalRecord();
                                                // } 
                                                
                                            ?>
                                         <div class="l_prompt_container_personal_info">
                                                <p class="c_confirm_ttl">Confirm</p>
                                                <div>
                                                    <p class="u_mat30">You are about to update Personal Information.</p>
                                                    <p class="u_mab20">Do you want to proceed?</p>
                                                </div>
                                            <div>
                                                    <a  class="c_btn_no c_btn_confirmation" >NO</a>
                                                    <button class="c_btn_yes c_btn_confirmation" name="update_personal_info_btn">YES</button>
                                                    <?php 
                                                     if (isset($_POST['update_personal_info_btn'])) {
                                                                updatePersonalInfoRecord();
                                                            };
                                                    ?>
                                         </div>
                                        </div>


                                        <div class="l_prompt_container_medical_rec">
                                                <p class="c_confirm_ttl">Confirm</p>
                                                <div>
                                                    <p class="mab20 mat30">You are about to update Medical Record.</p>
                                                    <p class="mab20">Do you want to proceed?</p>
                                                </div>
                                            <div>
                                                    <a  class="c_btn_no c_btn_confirmation" >NO</a>
                                                    <button class="c_btn_yes c_btn_confirmation" name="update_med_rec_btn">YES</button>
                                                    <?php 
                                                     if (isset($_POST['update_med_rec_btn'])) {
                                                                updateMedicalRecord();
                                                            };
                                                    ?>
                                         </div>
                                        </div>
                                            
                                        </form>
                                       
                                </div>
                    </div>
				</div>	

				
			</div>
            <div class="modal_background"></div>
				

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