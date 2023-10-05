<?php 

// --------------------------------------------------------------------------
// CHECK SESSION ID
    function check_login($connection) {
        global $connection;

        if (isset($_SESSION['session_id'])) {
            $id = $_SESSION['session_id'];
            $query = "SELECT * FROM admin WHERE session_id = '$id' limit 1";

            $result = mysqli_query($connection,$query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        else {
            header("location:login.php");
            die();
        }
    }

// --------------------------------------------------------------------------
// DISPLAY SEARCH LASTNAME

function displaySearchRecord() {
    global $connection,$search;

    $query = "SELECT personal_info.*, medical_record.* FROM personal_info 
    LEFT JOIN medical_record ON personal_info.id = medical_record.id 
    WHERE lastName LIKE '%$search%' ORDER BY medical_record.id DESC";

    $result = mysqli_query($connection,$query);

   

    if ($result) {

        $processedIds = []; // Initialize an array to store processed IDs

        if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];

            // if (empty($id)) {
            //     echo "error";
            // }
            // Check if this ID has already been processed
            if (!in_array($id, $processedIds)) {
                $processedIds[] = $id; // Mark this ID as processed

                $lastName = $row['lastName'];
                $firstName = $row['firstName'];
                $middleName = $row['middleName'];
                $gender = $row['gender'];
                $age = $row['age'];
                $contact = $row['contact'];
                $checked_up_date = $row['checked_up_date'];
                // $checked_up_time = $row['checked_up_time'];


                $lastName = highlightMatchedLetters($lastName, $search);

                echo "<tr>";
                echo "<td>".$id."</td>";
                echo "<td>".$lastName."</td>";
                echo "<td>".$firstName."</td>";
                echo "<td>".$middleName."</td>";
                echo "<td>".$gender."</td>";
                echo "<td>".$age."</td>";
                echo "<td>".$contact."</td>";
                echo "<td>".convertDate_index($checked_up_date)."</td>";
                // echo "<td>".$checked_up_time."</td>";
                echo "<td>
                <div class='operation_btn'>
                <button name='update_btn' class='c_edit_btn'><a name='update_btn' class='c_edit_btn' href='edit.php?edit_id=".$id."'>Update</a></button>
                <button name='view_btn' class='c_view_btn'><a href='patient_info.php?view_id=".$id."'>View</a></button>
                </div>
                </td>";
                echo "</tr>";
            }
        }
    }
    else {
       echo noResultFound ($search);
    }
}
}

function noResultFound ($search) {
    if ($search != "") {
        echo '<tr class="no_result_found_container"><td colspan="9"><h1 class="no_result_found">No results found for <u>'.$search.'</u>.</h1></td></tr>';
    }
    else {
        echo '<tr class="no_result_found_container"><td colspan="9"><h1 class="no_result_found">Please search <u>lastname</u> <br> on the search bar.</h1></td></tr>';
    }

 

}



// --------------------------------------------------------------------------
// DISPLAY RECORD TABLE

function displayRecord() {
    global $connection,$offset,$total_records_per_page;

    $query = "SELECT
    -- personal_info.id,
    -- personal_info.lastName,
    -- personal_info.firstName,
    -- personal_info.middleName,
    -- personal_info.gender,
    -- personal_info.age,
    personal_info.*,
    -- personal_info.contact,
    -- MAX(medical_record.medical_record_id) AS medical_record_id,
    MAX(medical_record.checked_up_date) AS checked_up_date,
    MAX(medical_record.checked_up_time) AS checked_up_time
  FROM
    personal_info
  LEFT JOIN
    medical_record ON personal_info.id = medical_record.id
  GROUP BY
    personal_info.id
  ORDER BY
    MAX(medical_record.checked_up_date) DESC,
    MAX(medical_record.checked_up_time) DESC
    -- MAX(medical_record.medical_record_id) DESC
  LIMIT
    $offset, $total_records_per_page";



// --------------------------------------------------------------------------
// SHOW ALL DATA
// $query = "SELECT personal_info.*, medical_record.*
// FROM personal_info
// JOIN medical_record ON personal_info.id = medical_record.id
// ORDER BY medical_record.checked_up_date DESC, medical_record.checked_up_time DESC";
// --------------------------------------------------------------------------
    
    $result = mysqli_query($connection, $query);

    if ($result) {
        $processedIds = []; // Initialize an array to store processed IDs

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            // $medical_record_id = $row['medical_record_id'];

            // Check if this ID has already been processed
            if (!in_array($id, $processedIds)) {
                $processedIds[] = $id; // Mark this ID as processed

                $lastName = $row['lastName'];
                $firstName = $row['firstName'];
                $middleName = $row['middleName'];
                $gender = $row['gender'];
                $age = $row['age'];
                $contact = $row['contact'];
                $checked_up_date = $row['checked_up_date'];
                // $checked_up_time = $row['checked_up_time'];

                echo "<tr>";
                echo "<td>".$id."</td>";
                echo "<td>".$lastName."</td>";
                echo "<td>".$firstName."</td>";
                echo "<td>".$middleName."</td>";
                echo "<td>".$gender."</td>";
                echo "<td>".$age."</td>";
                echo "<td>".$contact."</td>";
                echo "<td>".convertDate_index($checked_up_date)."</td>";
                // echo "<td>".$checked_up_date."</td>";
                // echo "<td>".$checked_up_time."</td>";
                echo "<td>
                <div class='operation_btn'>
                <button name='update_btn' class='c_edit_btn'><a href='edit.php?edit_id=".$id."'>Update</a></button>
                <button name='view_btn' class='c_view_btn'><a href='patient_info.php?view_id=".$id."'>View</a></button>
                </div>
                </td>";
                echo "</tr>";
            }
        }
       
    }
    
}

// --------------------------------------------------------------------------
// DISPLAY RECORD SP 

function displayRecordSp() {
    global $connection,$offset,$total_records_per_page;

    $query = "SELECT
    -- personal_info.id,
    -- personal_info.lastName,
    -- personal_info.firstName,
    -- personal_info.middleName,
    -- personal_info.gender,
    -- personal_info.age,
    personal_info.*,
    -- personal_info.contact,
    -- MAX(medical_record.medical_record_id) AS medical_record_id,
    MAX(medical_record.checked_up_date) AS checked_up_date,
    MAX(medical_record.checked_up_time) AS checked_up_time
  FROM
    personal_info
  LEFT JOIN
    medical_record ON personal_info.id = medical_record.id
  GROUP BY
    personal_info.id
  ORDER BY
    MAX(medical_record.checked_up_date) DESC,
    MAX(medical_record.checked_up_time) DESC
    -- MAX(medical_record.medical_record_id) DESC
  LIMIT
    $offset, $total_records_per_page";



// --------------------------------------------------------------------------
// SHOW ALL DATA
// $query = "SELECT personal_info.*, medical_record.*
// FROM personal_info
// JOIN medical_record ON personal_info.id = medical_record.id
// ORDER BY medical_record.checked_up_date DESC, medical_record.checked_up_time DESC";
// --------------------------------------------------------------------------
    
    $result = mysqli_query($connection, $query);

    if ($result) {
        $processedIds = []; // Initialize an array to store processed IDs

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            // $medical_record_id = $row['medical_record_id'];

            // Check if this ID has already been processed
            if (!in_array($id, $processedIds)) {
                $processedIds[] = $id; // Mark this ID as processed

                $lastName = $row['lastName'];
                $firstName = $row['firstName'];
                $middleName = $row['middleName'];
                $gender = $row['gender'];
                $age = $row['age'];
                $contact = $row['contact'];
                $checked_up_date = $row['checked_up_date'];
                // $checked_up_time = $row['checked_up_time'];

                echo "<tr>";
                echo "<td>
                <div class='operation_btn'>
                <button name='update_btn' class='c_edit_btn'><a href='edit.php?edit_id=".$id."'>Update</a></button>
                <button name='view_btn' class='c_view_btn'><a href='patient_info.php?view_id=".$id."'>View</a></button>
                </div>
                </td>";
                echo "<td>".$id."</td>";
                echo "<td>".$lastName."</td>";
                echo "<td>".$firstName."</td>";
                echo "<td>".$middleName."</td>";
                echo "<td>".$gender."</td>";
                echo "<td>".$age."</td>";
                echo "<td>".$contact."</td>";
                echo "<td>".convertDate_index($checked_up_date)."</td>";
                // echo "<td>".$checked_up_date."</td>";
                // echo "<td>".$checked_up_time."</td>";
                
                echo "</tr>";
            }
        }
       
    }
    
}




// --------------------------------------------------------------------------
// ADD RECORD

function addRecord() {
    global $connection,
    $firstName,
    $lastName,
    $middleName,
    $gender,
    $contact,
    // $civil_status,
    // $religion,
    $birthdate,
    // $birthplace,
    // $occupation,
    $address,
    $height,
    $weight,
    $pulse,
    $blood_pressure,
    // $respiratory_rate,
    $allergies,
    $findings,
    // $remarks,
    $checked_up_date,
    $temperature,
    $saturation,
    $taken,
    $complaints,
    $history,
    $medication,
    $recommendation,
    $physical;



    $firstName = mysqli_real_escape_string($connection,$firstName);  
    $lastName = mysqli_real_escape_string($connection,$lastName);  
    $middleName = mysqli_real_escape_string($connection,$middleName);  
    $gender = mysqli_real_escape_string($connection,$gender);  
    $contact = mysqli_real_escape_string($connection,$contact);  
    // $civil_status = mysqli_real_escape_string($connection,$civil_status);  
    // $religion = mysqli_real_escape_string($connection,$religion);  
    // $birthplace = mysqli_real_escape_string($connection,$birthplace);  
    // $occupation = mysqli_real_escape_string($connection,$occupation);  
    $address = mysqli_real_escape_string($connection,$address);  
    $height = mysqli_real_escape_string($connection,$height);  
    $weight = mysqli_real_escape_string($connection,$weight);  
    $pulse = mysqli_real_escape_string($connection,$pulse);  
    $blood_pressure = mysqli_real_escape_string($connection,$blood_pressure);  
    // $respiratory_rate = mysqli_real_escape_string($connection,$respiratory_rate);  
    $allergies = mysqli_real_escape_string($connection,$allergies);  
    $findings = mysqli_real_escape_string($connection,$findings);  
    // $remarks = mysqli_real_escape_string($connection,$remarks);  
    $checked_up_date = mysqli_real_escape_string($connection,$checked_up_date);  
    $physical = mysqli_real_escape_string($connection,$physical);  
    $recommendation = mysqli_real_escape_string($connection,$recommendation);  

    $age = getAge($birthdate);

    date_default_timezone_set('Asia/Manila');
    $timestamp = time();
    $am_pm = date('a', $timestamp);
 
     $query = "INSERT INTO personal_info  (
        firstName,
        lastName,
        middleName,
        gender,
        age,
        contact,
        birthdate,
        address

        ) VALUES (

        '$firstName',
        '$lastName',
        '$middleName',
        '$gender',
        '$age',
        '$contact',
        '$birthdate',
        '$address'
        )";

                                        
     $result = mysqli_query($connection,$query);

        if ($result) {
        echo "<script>alert('Record Added')</script>";
        echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 1);</script>";
                                            
        $patientID = mysqli_insert_id($connection);
        // $checked_up_date = date("Y-m-d");
        $checked_up_time = getCurrentTime();
                                        
        $medicalRecordQuery = "INSERT INTO medical_record (
            id,
            height,
            weight,
            pulse,
            blood_pressure,
            allergies,
            findings,
            checked_up_date,
            checked_up_time,
            am_pm,
            temperature,
            saturation,
            taken,
            complaints,
            history,
            medication,
            physical,
            recommendation
            )

            VALUES (

            '$patientID',
            '$height',
            '$weight',
            '$pulse',
            '$blood_pressure',
            '$allergies',
            '$findings',
            '$checked_up_date',
            '$checked_up_time',
            '$am_pm',
            '$temperature',
            '$saturation',
            '$taken',
            '$complaints',
            '$history',
            '$medication',
            '$physical',
            '$recommendation'
            )";

            if (!mysqli_query($connection, $medicalRecordQuery)) {
            // echo "<script>alert('Finding Added')</script>";
            echo "Error: " . mysqli_error($connection);
                } 
            }
            else {
                 echo "Error: " . mysqli_error($connection); 
                 }
                                    
}

// --------------------------------------------------------------------------------
//UPDATE RECORD 

    function updatePersonalInfoRecord() {

        $_SESSION['lastPage'] = $_GET['edit_id'];
        $lastPage = $_SESSION['lastPage'] ;

        $id = $_GET['edit_id'];
    
        global $connection;
        

        $firstName_ = $_POST['firstName'];
        $lastName_ = $_POST['lastName'];
        $middleName_ = $_POST['middleName'];
        $gender_ = $_POST['gender'];
        $contact_ = $_POST['contact'];
        // $civil_status_ = $_POST['civil_status'];
        // $religion_ = $_POST['religion'];
        $birthdate_ = $_POST['birthdate'];
        // $birthplace_ = $_POST['birthplace'];
        // $occupation_ = $_POST['occupation'];
        $address_ = $_POST['address'];
      

        

        $firstName_ = ucwords($firstName_);
        $lastName_ = ucwords($lastName_);
        $middleName_ = ucwords($middleName_);
        $gender_ = ucwords($gender_);
        $contact_ = ucwords($contact_);
        // $civil_status_ = ucwords($civil_status_);
        // $religion_ = ucwords($religion_);
        $birthdate_ = ucwords($birthdate_);
        // $occupation_ = ucwords($occupation_);
        $address_ = ucwords($address_);
       
        
        
        

        

        $age_ = getAge($birthdate_);

// --------------------------------------------------------------------------
//QUERY IF YOU WANT TO UPDATE JOINED TABLES

        // $query = "UPDATE personal_info
        // LEFT JOIN medical_record ON personal_info.id = medical_record.id
        // SET personal_info.firstName = '$firstName_',  -- Update personal_info fields
        //     personal_info.lastName = '$lastName_',
        //     personal_info.middleName = '$middleName_',
        //     personal_info.age = '$age_',
        //     personal_info.gender = '$gender_',
        //     personal_info.contact = '$contact_',
        //     personal_info.civil_status = '$civil_status_',
        //     personal_info.religion = '$religion_',
        //     personal_info.birthdate = '$birthdate_',
        //     personal_info.birthplace = '$birthplace_',
        //     personal_info.occupation = '$occupation_',
        //     personal_info.address = '$address_',
        //     medical_record.height = '$height_'  -- Update medical_record fields
        // WHERE personal_info.id = $id";


// --------------------------------------------------------------------------
     

        $query = "UPDATE personal_info SET 
            firstName = '$firstName_',  
            lastName = '$lastName_',
            middleName = '$middleName_',
            age = '$age_',
            gender = '$gender_',     
            contact = '$contact_',
            -- civil_status = '$civil_status_',
            -- religion = '$religion_',
            birthdate = '$birthdate_',
            -- birthplace = '$birthplace_',
            -- occupation = '$occupation_',
            address = '$address_'
           
            
            WHERE id = $id";
        
        
        $result = mysqli_query($connection,$query);


        if($result) {
            echo "<script>alert('Update Successful')</script>";
            echo "<script>setTimeout(function() { window.location.href = 'edit.php?edit_id=" . $lastPage . "'; }, 1);</script>";
        } else {
            echo "Error updating personal info: " . mysqli_error($connection);
        }   
    }

    function updateMedicalRecord() {
            $_SESSION['lastPage'] = $_GET['edit_id'];
            $lastPage = $_SESSION['lastPage'] ;

            $id = $_GET['edit_id'];
    
            global $connection;

            

            $height_ = $_POST['height'];
            $weight_ = $_POST['weight'];
            $pulse_ = $_POST['pulse'];
            $blood_pressure_ = $_POST['blood_pressure'];
            // $respiratory_rate_ = $_POST['respiratory_rate'];
            $allergies_ = $_POST['allergies'];
            $findings_ = $_POST['findings'];
            $remarks_ = $_POST['remarks'];
            $checked_up_date_ = $_POST['checked_up_date'];
            $checked_up_time_ = getCurrentTime();
            $temperature_ = $_POST['temperature'];
            $saturation_ = $_POST['saturation'];
            $taken_ = $_POST['taken'];
            $complaints_ = $_POST['complaints'];
            $history_ = $_POST['history'];
            $medication_ = $_POST['medication'];
            $physical_ = $_POST['physical'];
            $recommendation_ = $_POST['recommendation'];

          

            $allergies_ = ucwords($allergies_);
            $findings_ = ucwords($findings_);
            $remarks_ = ucwords($remarks_);

            $temperature_ = ucwords($temperature_);
            $saturation_ = ucwords($saturation_);
            $taken_ = ucwords($taken_);
            $complaints_ = ucwords($complaints_);
            $history_ = ucwords($history_);
            $medication_ = ucwords($medication_);
            $physical_ = ucwords($physical_);
            $recommendation_ = ucwords($recommendation_);

            date_default_timezone_set('Asia/Manila');
            $timestamp = time();
            $am_pm = date('a', $timestamp);
                                        
            $medicalRecordQuery = "INSERT INTO medical_record (
                id,
                height,
                weight,
                pulse,
                blood_pressure,
                allergies,
                findings,
                remarks,
                checked_up_date,
                checked_up_time,
                am_pm,
                temperature,
                saturation,
                taken,
                complaints,
                history,
                medication,
                physical,
                recommendation
                )

                VALUES (

                '$id',
                '$height_',
                '$weight_',
                '$pulse_',
                '$blood_pressure_',
                -- '$respiratory_rate_',
                '$allergies_',
                '$findings_',
                '$remarks_',
                '$checked_up_date_',
                '$checked_up_time_',
                '$am_pm',
                '$temperature_',
                '$saturation_',
                '$taken_',
                '$complaints_',
                '$history_',
                '$medication_',
                '$physical_',
                '$recommendation_'

                )";

            $medicalRecordResult = mysqli_query($connection,$medicalRecordQuery);
            if ($medicalRecordResult) {
                echo "<script>alert('Update Successful')</script>";
                // echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 1);</script>";
                echo "<script>setTimeout(function() { window.location.href = 'edit.php?edit_id=" . $lastPage . "'; }, 1);</script>";
            } else {
                echo "Error inserting medical record: " . mysqli_error($connection);
            }
        } 
 

// --------------------------------------------------------------------------------
//DISPLAY RECENT MEDICAL RECORD

   function  displayRecentMedRec() {
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

       
        
       
        $view_id = $_GET['view_id'];

        // $query = "SELECT personal_info.*, medical_record.*
        //   FROM personal_info
        //   LEFT JOIN medical_record ON personal_info.id = medical_record.id
        //   WHERE personal_info.id = $view_id
        //   ORDER BY checked_up_date ASC, checked_up_time ASC";

        $query = "SELECT personal_info.*, medical_record.*
            FROM personal_info
            LEFT JOIN medical_record ON personal_info.id = medical_record.id
            WHERE personal_info.id = $view_id";
            // -- ORDER BY medical_record_id DESC";

      
                                                        
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




// --------------------------------------------------------------------------------
//CALCULATES AGE FROM BIRTHDATE

function getAge($birthdate) {
    $today = date("Y-m-d");
    $diff = date_diff(date_create($birthdate), date_create($today));
    return $diff->format('%y');
}

// --------------------------------------------------------------------------------
//GET AM PM

// function getAm_Pm() {
//     date_default_timezone_set('Asia/Manila');
//     $timestamp = time();
//     $am_pm = date('a', $timestamp);
//     return $am_pm;
// }

// --------------------------------------------------------------------------------
//GET ONLY CURRENT TIME

function getCurrentTime() {
    date_default_timezone_set('Asia/Manila');
    $current_time = date('h:i:s A');
    return $current_time;
}
// --------------------------------------------------------------------------------
//CONVERT DATE

function convertDate_index($checked_up_date) {
    $timestamp = strtotime($checked_up_date);
    $formattedDate = date("F d, Y", $timestamp);
    return $formattedDate;
}

// function convertDate($checked_up_date) {
//         global $checked_up_date;
//         $dateString = $checked_up_date;
//         $timestamp = strtotime($dateString);
//         $formattedDate = date("d-m-Y", $timestamp);
//         // $formattedDate = date("F m, Y");
//         $formattedDate = date("m/d/y");
//         return $formattedDate;
//     }


// --------------------------------------------------------------------------------


?>

