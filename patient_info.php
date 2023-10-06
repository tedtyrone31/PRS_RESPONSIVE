<?php include "header.php"; ?>


<body id="patient_info" class="drawer drawer--right">
	<!-- <header class="l_header_area">
		<div class="l_header l_wrap">
			<h1>
				<img class="l_header_title u_pc" src="common/images/header_title.png" alt="">
			</h1>
			<img class="l_header_detail u_pc" src="common/images/header_date.png" alt="">
		</div>
	</header> -->       
    <?php               

    $view_id = $_GET['view_id'];
    

    if (isset($_SESSION['page_no'])) {
        $page_no_last = $_SESSION['page_no'];
    }

    if (isset( $_GET['view_history_id'])) {
        $view_history_id = $_GET['view_history_id'];

        global $connection,
        $firstName,
        $lastName,
        $middleName,
        $age,   
        $gender,   
        $contact,   
        // $civil_status,   
        // $religion,
        $birthdate,   
        // $birthplace,   
        // $occupation,   
        $address,   
        $height,   
        $pulse,   
        $weight,   
        $blood_pressure,   
        // $respiratory_rate,   
        $allergies,   
        $findings,   
        // $remarks,   
        $checked_up_date, 
        $checked_up_time,
        $am_pm,
        $temperature,
        $saturation,
        $taken,
        $complaints,
        $history,
        $medication,
        $physical,
        $recommendation;

        // $query = "SELECT * FROM personal_info 
        // WHERE id = $view_id";
        // $result = mysqli_query($connection,$query);

        // $query = "SELECT * FROM medical_record 
        // WHERE medical_record_id = $view_history_id";
        

        // TODO:: use parepared statement wtf!
        $query = "SELECT personal_info.*, medical_record.*
        FROM personal_info
        INNER JOIN medical_record ON personal_info.id = medical_record.id
        WHERE personal_info.id = $view_id AND medical_record.medical_record_id = $view_history_id";
      $result = mysqli_query($connection,$query);
      
        $result = mysqli_query($connection,$query);
        if ($result) {
            // $processedIds = []; // Initialize an array to store processed IDs
                                                       
               while ($row = mysqli_fetch_assoc($result)) {
               // $id = $row['id'];
                                                       
               // Check if this ID has already been processed
               // if (!in_array($id, $processedIds)) {
               //     $processedIds[] = $id; // Mark this ID as processed
                   $firstName = $row['firstName'];
                   $lastName = $row['lastName'];
                   $middleName = $row['middleName'];
                   $age = $row['age'];
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
                   $checked_up_date = $row['checked_up_date'];
                   $checked_up_time = $row['checked_up_time'];
                   $am_pm = $row['am_pm'];
                   $temperature = $row['temperature'];
                   $saturation = $row['saturation'];
                   $taken = $row['taken'];
                   $complaints = $row['complaints'];
                   $history = $row['history'];
                   $medication = $row['medication'];
                   $physical = $row['physical'];
                   $recommendation = $row['recommendation'];
             }
            }
    }
    else {
        displayRecentMedRec(); 
    }
    
                      
                      ?>
	<div class="l_bg">
		<div class="l_container l_wrap clearfix">
			<div class="l_main_contents">
				<div class="l_card ">
					<div class="l_poster_area">
                    <h1 class="c_ttl_type01">Patient <br class="sp_show"> Information</h1>
                    <a class="c_close_btn c_close_btn_index" href="index.php?page_no=<?php echo $page_no_last ?>">X</a>
                    <div class="l_right_content_inside_bg bg_none">
                                        <form action="" method="post" class="l_edit_form">
                                            <div class="l_info_container_main_container">
                                                <div class="">
                                                <h2 class="c_ttl_type02">Personal Information</h2>
                                                <div class="flex l_info_container c_update_personal_info_btn_relative">
                                                    
                                                    <div class="l_personal_information">
                                                        <div class="c_patient_info_id_container"> 
                                                            <span class="c_info_patient_id">Patient ID:<?php echo $view_id ?></span>
                                                        </div>
                                                        <table class="c_personal_info_table">
                                                            <tr>
                                                                <td>Name:</td>
                                                                <td><p><?php echo $lastName.", ".$firstName. " " . substr($middleName, 0, 1). ".";?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Contact Number:</td>
                                                                <td><?php echo $contact?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Age:</td>
                                                                <td><?php echo $age?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Birthdate:</td>
                                                                <td><?php echo convertDate_index($birthdate) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gender:</td>
                                                                <td><?php echo $gender?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address:</td>
                                                                <td><?php echo $address?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Allergies:</td>
                                                                <td><?php echo $allergies?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Medical History:</td>
                                                                <td><?php echo $history?></td>
                                                            </tr>
                                                            
                                                        </table>

                                                        <!-- <dl class="c_news_type01">
                                                            <dt>Name:</dt>
                                                            <dt><?php echo $lastName.", ".$firstName. " " . substr($middleName, 0, 1). ".";?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Contact Number:</dt>
                                                            <dt><?php echo $contact?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Age:</dt>
                                                            <dt><?php echo $age?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Birthdate:</dt>
                                                            <dt><?php echo convertDate_index($birthdate)?></dt>
                                                        </dl>
                                                        <dl class="c_news_type01">
                                                            <dt>Gender:</dt>
                                                            <dt><?php echo $gender?></dt>
                                                        </dl>
                                                        <dl class="c_news_type01">
                                                            <dt>Address:</dt>
                                                            <dt><?php echo $address?></dt>
                                                        </dl>
                                                        <br><br>
                                                        <dl class="c_news_type01">
                                                            <dt>Allergies:</dt>
                                                            <dt><?php echo $allergies?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Medical History:</dt>
                                                            <dt><?php echo $history?></dt>
                                                        </dl> -->
                                                    </div>
                                                </div> 
                                                        <?php 
                                                            // if (isset($_POST['update_personal_info_btn'])) {
                                                            //     updatePersonalInfoRecord();
                                                            // };
                                                        ?>
                                                        
                                                </div>
                                                
                                                <div class="mat10 l_recent_med_exam" id="l_recent_med_exam">
                                                <h2 class="c_ttl_type02 ">Recent Medical Examination</h2>
                                                    <div class="flex l_info_container c_update_medical_record_btn_relative">
                                                        

                                                    <table class="c_personal_info_table">
                                                            <tr>
                                                                <td>Checked-up Date:</td>
                                                                <td><p><?php echo  convertDate_index($checked_up_date) ?></p></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Checked-up Time:</td>
                                                                <td><?php echo $checked_up_time ." ".$am_pm?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Height:</td>
                                                                <td><?php echo $height?>cm</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Weight:</td>
                                                                <td><?php echo $weight?>kg</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temperature:</td>
                                                                <td><?php echo $temperature?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Blood Pressure:</td>
                                                                <td><?php echo $blood_pressure?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>O2 Saturation:</td>
                                                                <td><?php echo $saturation?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Medication Taken:</td>
                                                                <td><?php echo $taken?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Complaints:</td>
                                                                <td><?php echo $complaints?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Physical Exam:</td>
                                                                <td><?php echo $physical?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diagnosis:</td>
                                                                <td><?php echo $findings?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Medication / Prescription:</td>
                                                                <td><?php echo $medication?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Recommendation:</td>
                                                                <td><?php echo $recommendation?></td>
                                                            </tr>
                                                            
                                                        </table>


                                                        <!-- <dl class="c_news_type01">
                                                            <dt>Checked-up Date:</dt>
                                                            <dt><?php echo  convertDate_index($checked_up_date) ?></dt>
                                                        </dl>
                                                        <dl class="c_news_type01">
                                                            <dt>Checked-up Time:</dt>
                                                            <dt><?php echo $checked_up_time?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Height:</dt>
                                                            <dt><?php echo $height?></dt>
                                                        </dl>
                                                        <dl class="c_news_type01">
                                                            <dt>Weight:</dt>
                                                            <dt><?php echo $weight?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Temperature:</dt>
                                                            <dt><?php echo $temperature?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Pulse:</dt>
                                                            <dt><?php echo $pulse?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Blood Pressure:</dt>
                                                            <dt><?php echo $blood_pressure?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>O2 Saturation:</dt>
                                                            <dt><?php echo $blood_pressure?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Medication Taken:</dt>
                                                            <dt><?php echo $taken?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Complaints:</dt>
                                                            <dt><?php echo $complaints?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Physical Exam:</dt>
                                                            <dt><?php echo $physical?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Diagnosis:</dt>
                                                            <dt><?php echo $findings?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01 c_medication">
                                                            <dt style="white-space: nowrap;">Medication / Prescription:</dt>
                                                            <dt style="padding-left: 90px;"><?php echo $medication?></dt>
                                                        </dl>

                                                        <dl class="c_news_type01">
                                                            <dt>Recommendation</dt>
                                                            <dt><?php echo $recommendation?></dt>
                                                        </dl> -->

                                                        <?php 
                                                                // $print_id = $_GET['view_id'];
                                                                ?>
                                                                <div class="l_printer_btn_container">
                                                                    <!-- <button class="c_btn_type1 c_print_btn" name="print_btn">Print</button> -->
                                                                  <?php  
                                                                    if (!isset($_GET['view_history_id'])) {
                                                                        
                                                                        // echo "<a href='print2.php?view_id= $view_id>' class='c_btn_type1 c_print_btn'>Print</a></button>";
                                                                        echo "<a href='print2.php?view_id=$view_id' class='c_btn_type1 c_print_btn'>Print</a>";
                                                                    }
                                                                    else {
                                                                        echo "<a href='print2.php?view_id= $view_id&view_history_id=$view_history_id' class='c_btn_type1 c_print_btn'>Print</a></button>";
                                                                    }
                                                                  ?>  
                                                                    
                                                                    <!-- <a href="print2.php?view_id=<?php echo $view_id;?>&view_history_id=<?php echo $view_history_id ?>" class="c_btn_type1 c_print_btn">Print</a></button> -->
                                                                </div>
                                                      
                                                        <!-- <button class="c_btn_type1 c_update_medical_record_btn" name="update_medical_record_btn">Update</button> -->
                                                    </div> 
                                                </div>
                                                


                                                <div class=" l_recent_med_exam">
                                                <h2 class="c_ttl_type02 ">Patient History</h2>
                                                    <div class="flex l_info_container c_update_medical_record_btn_relative">
                                                  
                                                            <div class="l_personal_information">
                                                            <div class="l_table_container">
                                                                <table class="c_table_type01">
                                                                    <tr>
                                                                        <th>Action</th>
                                                                        <!-- <th>Medical Record ID</th> -->
                                                                        <th>Date</th>
                                                                        <th>Time</th>
                                                                        <th >Diagnosis</th>
                                                                        <th class="">Medication</th>
                                                                        <th>Complaints</th>
                                                                        <th>Recommendation</th>
                                                                        <th>Allergies</th>
                                                                        <th>Physical Exam</th>
                                                                        <th>Medication Taken</th>
                                                                        <th>Temperature</th>
                                                                        <th>Height</th>
                                                                        <th>Weight</th>
                                                                        <th>Pulse/Heartbeat</th>
                                                                        <th>Blood Pressure</th>
                                                                        <th>O2 Saturation</th>
                                                                       
                                                                    </tr>  
                                                                    <?php 
                                                                    
                                                                    $query = "SELECT * FROM medical_record WHERE id = $view_id
                                                                    ORDER BY checked_up_date desc, checked_up_time Desc";
                                                                    $result = mysqli_query($connection,$query);

                                                                   

                                                                    if(isset($result)) {
                                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                            $id = $row['medical_record_id'];
                                                                            $height = $row['height'];
                                                                            $weight = $row['weight'];
                                                                            $pulse = $row['pulse'];
                                                                            $blood_pressure = $row['blood_pressure'];
                                                                            // $respiratory_rate = $row['respiratory_rate'];
                                                                            $allergies = $row['allergies'];
                                                                            $findings = $row['findings'];
                                                                            // $remarks = $row['remarks'];
                                                                            // $checked_up_date = $row['checked_up_date'];
                                                                            $checked_up_date = date("m/d/y", strtotime($row['checked_up_date']));
                                                                            $checked_up_time = $row['checked_up_time'];
                                                                            $am_pm = $row['am_pm'];
                                                                            $medication = $row['medication'];
                                                                            $complaints = $row['complaints'];
                                                                            $recommendation = $row['recommendation'];
                                                                            $temperature = $row['temperature'];
                                                                            $taken = $row['taken'];
                                                                            $saturation = $row['saturation'];
                                                                            $physical = $row['physical'];
                                                            
                                                                            if ($findings && $medication) {
                                                                                echo "<tr>";
                                                                                echo "<td>
                                                                                <div class='operation_btn'>
                                                                                <button name='view_btn' class='c_view_btn c_view_history sp_hidden'><a href='patient_info.php?view_id=".$view_id."&view_history_id=".$id."'>View</a></button>
                                                                                <button name='view_btn' class='c_view_btn c_view_history sp_show'><a href='patient_info.php?view_id=".$view_id."&view_history_id=".$id."#l_recent_med_exam'>View</a></button>
                                                       
                                                                                </div>
                                                                                </td>";
                                                                                // echo "<td>".$id."</td>";
                                                                                echo "<td>".$checked_up_date."</td>";
                                                                                echo "<td>".$checked_up_time.' '.$am_pm."</td>";
                                                                                echo "<td class='c_set_wrap'>".$findings."</td>";
                                                                                echo "<td class='c_set_wrap'>".$medication."</td>";
                                                                                echo "<td>".$complaints."</td>";
                                                                                echo "<td>".$recommendation."</td>";
                                                                                echo "<td>".$allergies."</td>";
                                                                                echo "<td>".$physical."</td>";
                                                                                echo "<td>".$taken."</td>";
                                                                                echo "<td>".$temperature."</td>";
                                                                                echo "<td>".$height."cm</td>";
                                                                                echo "<td>".$weight."kg</td>";
                                                                                echo "<td>".$pulse."</td>";
                                                                                echo "<td>".$blood_pressure."</td>";
                                                                                echo "<td>".$saturation."</td>";
                                                                                
                                                                                echo "</tr>";
                                                                            }

                                                                            
                                                                            
                                                                        }
                                                                        
                                                                    }
                                                                    
                                                              

                                                                    ?>     
                                                                </table>
                                                            </div>
                                                    </div>
                                                      
                                                        <!-- <button class="c_btn_type1 c_update_medical_record_btn" name="update_medical_record_btn">Update</button> -->
                                                    </div> 
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

	<!-- <p class="l_pagetop top_btn"><a href="#"><img src="common/images/to_top.png" alt="ページトップ"></a></p> -->
    <p class="l_pagetop top_btn"><a href="#"><img src="common/images/images/1x/injection.png" alt="ページトップ"></a></p>

	
	
<?php 
include "footer.php"; 
?>