<?php 
// session_start();

include "connection.php";
include "functions.php";
// $am_pm = ""; // Initialize $am_pm variable

// check_login($connection);

?>
<?php 
    global $connection;
    $view_id = $_GET['view_id'];
    // $print_id = $_GET['print_id'];

    // $query = "SELECT personal_info.*, medical_record.*
    // FROM personal_info
    // INNER JOIN medical_record ON personal_info.id = medical_record.id 
    // WHERE personal_info.id = $print_id";


// $query = "SELECT personal_info.*, medical_record.*
//           FROM personal_info
//           INNER JOIN medical_record ON personal_info.id = medical_record.id
//           WHERE personal_info.id = $print_id
//           ORDER BY medical_record.medical_record_id DESC
//           LIMIT 1";

if (isset($_GET['view_history_id'])) {
    $view_history_id = $_GET['view_history_id'];

    $query = "SELECT personal_info.*, medical_record.*
FROM personal_info
INNER JOIN medical_record ON personal_info.id = medical_record.id
WHERE personal_info.id = $view_id AND medical_record.medical_record_id = $view_history_id";
$result = mysqli_query($connection,$query);


        $result = mysqli_query($connection, $query);

        if ($result) 

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $middleName = $row['middleName'];
            $gender = $row['gender'];
            $contact = $row['contact'];
            // $civil_status = $_POST['civil_status'];
            // $religion = $_POST['religion'];
            $birthdate = $row['birthdate'];
            // $birthplace = $_POST['birthplace'];
            // $occupation = $_POST['occupation'];
            $address = $row['address'];
            $age = $row['age'];
            $middleInitial = substr($middleName, 0, 1);
            date_default_timezone_set('Asia/Manila');
            $currentDate =  date("F d,  Y");
            $height = $row['height'];
            $weight = $row['weight'];
            $pulse = $row['pulse'];
            $blood_pressure = $row['blood_pressure'];
            $allergies = $row['allergies'];
            $findings = $row['findings'];
            $checked_up_date = $row['checked_up_date'];
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
else {
    
    // TODO:: use prepared staetment
    $query = "SELECT personal_info.*, medical_record.*
    FROM personal_info
    INNER JOIN medical_record ON personal_info.id = medical_record.id
    WHERE personal_info.id = $view_id
    ORDER BY medical_record.medical_record_id DESC
    LIMIT 1";


  $result = mysqli_query($connection, $query);

  if ($result) 

  $row = mysqli_fetch_assoc($result);

  if ($row) {
      $firstName = $row['firstName'];
      $lastName = $row['lastName'];
      $middleName = $row['middleName'];
      $gender = $row['gender'];
      $contact = $row['contact'];
      // $civil_status = $_POST['civil_status'];
      // $religion = $_POST['religion'];
      $birthdate = $row['birthdate'];
      // $birthplace = $_POST['birthplace'];
      // $occupation = $_POST['occupation'];
      $address = $row['address'];
      $age = $row['age'];
      $middleInitial = substr($middleName, 0, 1);
      date_default_timezone_set('Asia/Manila');
      $currentDate =  date("F d,  Y");
      $height = $row['height'];
      $weight = $row['weight'];
      $pulse = $row['pulse'];
      $blood_pressure = $row['blood_pressure'];
      $allergies = $row['allergies'];
      $findings = $row['findings'];
      $checked_up_date = $row['checked_up_date'];
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







// if ($result) {
//     $row = mysqli_fetch_assoc($result); // Fetch the data for the most recent medical_record_id
//     if ($row) {
//         $lastName = $row['lastName'];
//         $firstName = $row['firstName'];
//         $middleName = $row['middleName'];
//         $gender = $row['gender'];
//         $age = $row['age'];
//         $contact = $row['contact'];
//         $checked_up_date = $row['checked_up_date'];
//         // $checked_up_time = $row['checked_up_time'];

//         // Now, $lastName, $firstName, $middleName, $gender, etc. contain the most recent data.
        
//      echo $lastName;
//     }
// }


    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../PRS_COMPLETE/common/css/base.css">
    <!-- <link rel="stylesheet" href="../PRS_COMPLETE/common/css/layouts.css"> -->
    <!-- <link rel="stylesheet" href="../PRS_COMPLETE/common/css/components.css"> -->
    <link rel="stylesheet" href="../PRS_COMPLETE/common/css/print.css">
</head>


<div class="body">
<!-- --------------------------------------------------------------------------------
OLD MEDCERT PRINTOUT CODE -->

<div class="l_wrapper">
    <div class="header_container c_mab_20">
        <h2 class="c_mab_10">Republic of the Philippines</h2>
        <h2 class="c_mab_30">Region VIII, Eastern Visayas</h2>
        <h3 class="c_mab_30">Palompon, Leyte</h3><br>
        <!-- <h1 class="c_mab_10">PURIFICACION SOCORRO I. ARLOS, M.D.</h1> -->
        <br><br>
        <!-- <hr><br><br> -->
        <h1>MEDICAL CERTIFICATE</h1>
    </div>

    <div class="print_date"> 
       <div class="date_container">
            <input type="text" value="<?php echo $currentDate ?>"><br>
            <label for="">(Date)</label>
       </div>
    </div>
    <br>
    <div>
        <h4>To Whom It May Concern:</h4>
    </div><br><br>
    

    <div class="para_container">
        <p class="c_indent30">THIS IS TO CERTIFY that </p> 
        <input type="text" class="contraction adjustWidth" value = "<?php echo getcontraction($gender) ?>">
        <!-- <input type="text" class="contraction" value = "<?php 
        // echo getcontraction($gender,$status) 
        ?>
        "> -->
        <input type="text" class="print_name adjustWidth" placeholder="Full Name" value="<?php
        echo $lastName.",". 
        $firstName ." " . $middleInitial?>.">,
        <input type="text" class="print_gender adjustWidth" placeholder="Gender" value="<?php echo $gender ?>">,
        <input type="text" class="print_age adjustWidth" placeholder="Age" name="date" value="<?php  echo $age ?>">
        <p>years old, residing at</p>
       <input type="text" id="myInput" class="print_address adjustWidth" maxlength="40" placeholder="Address" name="address" value="<?php echo $address ?>">
        <p>was under my treatment since</p>
        <input type="text" class="print_date_added adjustWidth" placeholder="Date checked-up" name="date_added" value="<?php echo ConvertDate($checked_up_date)?>">.
        <p>Suffering from</p>
        <input type="text" class="print_findings adjustWidth" placeholder="Diagnosis" name="findings" value="<?php echo $findings ?>">. 
           
      
        <br><br><br>
        <h4>Medication/Prescription:</h4>
        <textarea class="print_prescription" name="" id="" cols="30" rows="3" ><?php echo $medication ?></textarea>
        <h4>Recommendation:</h4>
        <textarea class="print_recommendation" name="" id="" cols="30" rows="3"><?php echo $recommendation ?></textarea>
        <br><br>
        <input type="text" class="pronoun adjustWidth" value="<?php echo getCorrrectPronoun($gender) ?>">
        <!-- <input type="text" value="is/was"> -->
        <p class="c_indent10">is adviced treatment or rest for this period</p>
        <input type="text" class="print_date_period adjustWidth" placeholder="Date Period" value ="<?php echo convertDate($checked_up_date) .'  -  '. convertDate($checked_up_date)?>">.
        <br><br><br>
        <p class="c_indent30">This certification is issued upon the request of the patient for whatever legal purpose it may serve.</p>
        
        <br><br><br>
        <div>
            <h4>Vital Signs</h4><br>
            <div class="vitals_container">
                <div>
                    <p>Temperature:</p>
                    <input type="text" class="adjustWidth" value="<?php echo $temperature ?>">
                </div>
                <div>
                    <p>Blood Pressure:</p>
                    <input type="text" class="adjustWidth" value="<?php echo $blood_pressure ?>">
                </div>
                <div>
                    <p>Pulse/Heart Rate:</p>
                    <input type="text" class="adjustWidth" value="<?php echo $pulse ?>">
                </div>
                <div>
                    <p>O2 Saturation:</p>
                    <input type="text" class="adjustWidth" value="<?php echo $saturation ?>">
                </div>
            </div>
        </div>
    </div> 
        <?php 
    //VARIABLES 

    $doctor = "Purificacion Soccoro I. Arlos, M.D.";
    $licenseNo = "55210";
    $ptr = "7532802";
    $drDate = date("m/d/y");     
    ?>
     
      <div class="physician_main_container_">
        <div class="physician_main_container"> 
            <div class="physician_container">
                    <input type="text" value="<?php echo $doctor ?>"><br>
                    <label for="">Physician / Medical Officer</label>
                    <p><i>(Signature over printed name)</i></p>
            </div>
            </div><br><br>
            <div class="license_field"> 
            <div>
                <p>License No:</p> <input type="text" value="<?php echo $licenseNo ?>">
            </div>
            <div>
                <p>PTR:</p> <input type="text" value="<?php echo $ptr ?>">
            </div>
            <!-- <div>
            <p>Date:</p> <input type="text" value="<?php 
            // echo $drDate 
            ?>">
            </div> -->
            </div>
      </div>

    </div>
    <?php 
        // echo '<script>var body = document.getElementById("body");</script>';
        // echo '<script>body.classList.add("remove_bg");</script>';
    ?>
<!-- --------------------------------------------------------------------------------
NEW MEDCERT PRINTOUT CODE -->    

</div>


<script src="common/js/print.js"></script>
<?php 

// --------------------------------------------------------------------------------
//GET CORRECT CONTRACTION
// function  getcontraction($gender,$status) {
function  getcontraction($gender) {
    if ($gender == 'Male') {
         return "Mr.";
    }
    // elseif ($status !== 'Single'){
    //      return "Mrs.";
    // }
    else {
     return "Ms.";
    }
 }

  // --------------------------------------------------------------------------------
 //GET CORRECT PRONOUN
 
 function  getCorrrectPronoun($gender) {
     if ($gender == 'Male') {
          return "He";
     }
     else {
      return "She";
     }
  }
 
 // --------------------------------------------------------------------------------
 //CONVERT DATE
 function convertDate($checked_up_date) {
    global $checked_up_date;
    $dateString = $checked_up_date;
    $timestamp = strtotime($dateString);
    $formattedDate = date("d-m-Y", $timestamp);
    // $formattedDate = date("F m, Y");
    $formattedDate = date("m/d/y");
    return $formattedDate;
}




?>
