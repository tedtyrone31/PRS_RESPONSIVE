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
    // TODO:: use prepared statement
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


<div class="body print2">
<!-- --------------------------------------------------------------------------------
OLD MEDCERT PRINTOUT CODE -->

<div class="l_wrapper mat50">
    <div class="header_container c_mab_20">
        <h1 class="c_mab_10">PURIFICACION SOCORRO I. ARLOS, M.D.</h1>
        <br><br>
        <h2 class="c_mab_30"><i>General Physician</i></h2>
        <h3 class="c_mab_30">Palompon, Leyte</h3><br>
        <hr>
        <!-- <hr style="margin: 0 50px;"> -->
        <br><br>
        <h1>MEDICAL CERTIFICATE</h1>
       
    </div>

    <?php
        $checked_up_date = convertDate_index($checked_up_date);
    ?>

    <div class="print_date"> 
       <div class="date_container">
            <input type="text" value="<?php echo $checked_up_date ?>"><br>
            <!-- <input type="text" value="<?php echo $currentDate ?>"><br> -->
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
        <input type="text" class="print_age adjustWidth" placeholder="Age" name="age" value="<?php  echo $age ?>">
        <p>years old, residing at</p>
       <input type="text" id="myInput" class="print_address adjustWidth" maxlength="40" placeholder="Address" name="address" value="<?php echo $address ?>">
        <p>has consulted and was examined in the clinic.</p>
        <br><br><br>
        <h4>Diagnosis:</h4>
        <textarea class="print_findings " name="" id="" cols="30" rows="3" ><?php echo $findings ?></textarea>
        <br>
        <h4>Medication/Prescription:</h4>
        <textarea class="print_prescription" name="" id="" cols="30" rows="3" ><?php echo $medication ?></textarea>
        <h4>Recommendation:</h4>
        <textarea class="print_recommendation" name="" id="" cols="30" rows="3"><?php echo $recommendation ?></textarea>
      
      
        <br>
        <p class="c_indent30">This certification is issued upon the request of the patient for whatever legal purpose it may serve.</p>
        
        <br><br><br>
        
    </div> 
        <?php 
    //VARIABLES 

    $doctor = "Purificacion Soccoro I. Arlos, M.D.";
    $licenseNo = "55210";
    $ptr = "7532802";
    $drDate = date("m/d/y");     
    ?>
     
      <br><br><br><br>
        <div class="license_field"> 
               <div style="display: flex;flex-direction:column;">
               <p><?php echo $doctor ?></p>
               <div>
               <p>License No:<?php echo $licenseNo ?></p>
               </div>
              <div>
              <p>PTR:<?php echo $ptr ?></p>
              </div>
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
