//edit page
if (window.location.href.indexOf("edit") > -1) {
  var c_update_personal_info_btn = document.querySelector(
    ".c_update_personal_info_btn"
  );

  var c_update_medical_record_btn = document.querySelector(
    ".c_update_medical_record_btn"
  );

  var prompt_personal_info = document.querySelector(
    ".l_prompt_container_personal_info"
  );

  var prompt_med_rec_info = document.querySelector(
    ".l_prompt_container_medical_rec"
  );

  c_update_personal_info_btn.addEventListener("click", showPersonalInfoConfirm);
  c_update_medical_record_btn.addEventListener("click", showMedRecConfirm);

  function showPersonalInfoConfirm() {
    prompt_personal_info.classList.add("show");
  }
  function showMedRecConfirm() {
    prompt_med_rec_info.classList.add("show");
  }

  var c_btn_no = document.querySelectorAll(".c_btn_no");

  c_btn_no.forEach(function (button) {
    button.addEventListener("click", closeConfirmation);
  });

  function closeConfirmation() {
    // Assuming you have an element with the class "prompt_med_rec_info"
    // You should select it first, or replace it with the appropriate element selector
    var prompt_med_rec_info = document.querySelector(
      ".l_prompt_container_medical_rec"
    );
    var l_prompt_container_personal_info = document.querySelector(
      ".l_prompt_container_personal_info"
    );
    // Add your logic here
    // For example:
    l_prompt_container_personal_info.classList.remove("show");
    prompt_med_rec_info.classList.remove("show");
  }

  var c_create_new_btn = document.querySelector(".c_create_new_btn");
  var c_edit_height = document.querySelector(".c_edit_height");
  var c_edit_weight = document.querySelector(".c_edit_weight");
  var c_edit_temperature = document.querySelector(".c_edit_temperature");
  var c_edit_blood_pressure = document.querySelector(".c_edit_blood_pressure");
  var c_edit_pulse = document.querySelector(".c_edit_pulse");
  var c_edit_saturation = document.querySelector(".c_edit_saturation");
  var c_edit_allergies = document.querySelector(".c_edit_allergies");
  var c_edit_taken = document.querySelector(".c_edit_taken");
  // var c_edit_history = document.querySelector(".c_edit_history");
  var c_edit_complaints = document.querySelector(".c_edit_complaints");
  var c_edit_physical = document.querySelector(".c_edit_physical");
  var c_edit_findings = document.querySelector(".c_edit_findings");
  var c_edit_medication = document.querySelector(".c_edit_medication");
  var c_recommendation = document.querySelector(".c_recommendation");
  var c_date_checked_up = document.querySelector(".c_date_checked_up");

  c_create_new_btn.addEventListener("click", clearInputs);

  function clearInputs() {
    console.log("test");
    c_edit_height.value = "";
    c_edit_weight.value = "";
    c_edit_height.value = "";
    c_edit_temperature.value = "";
    c_edit_blood_pressure.value = "";
    c_edit_pulse.value = "";
    c_edit_saturation.value = "";
    // c_edit_allergies.value = "";
    c_edit_pulse.value = "";
    c_edit_taken.value = "";
    // c_edit_history.value = "";
    c_edit_complaints.value = "";
    c_edit_physical.value = "";
    c_edit_findings.value = "";
    c_edit_medication.value = "";
    c_recommendation.value = "";

    var currentDate = new Date();
    var options = {
      year: "numeric",
      month: "2-digit",
      day: "2-digit",
      hour: "2-digit",
      minute: "2-digit",
      second: "2-digit",
      timeZone: "Asia/Manila",
    };
    var formattedDate = currentDate.toLocaleString("en-US", options);
    formattedDate = formattedDate.substring(0, 10); // Extract only the date part

    // Create a new date with Asia/Manila timezone offset (480 minutes ahead of UTC)
    var currentDate = new Date(Date.now() + 480 * 60 * 1000);

    // Format the date in "yyyy-MM-dd" format
    var formattedDate = currentDate.toISOString().substr(0, 10);

    c_date_checked_up.value = formattedDate;

    c_edit_height.focus();
  }
}

// -------------------------------------------------------------------------

var c_delete_btn = document.querySelectorAll(".c_delete_btn");
var prompt_delete_warning = document.querySelector(
  ".l_prompt_container_delete_warning"
);

for (var i = 0; i < c_delete_btn.length; i++) {
  c_delete_btn[i].addEventListener("click", function (event) {
    // Disable all delete buttons
    for (var j = 0; j < c_delete_btn.length; j++) {
      c_delete_btn[j].disabled = true;
    }

    // Enable only the clicked button
    event.target.disabled = false;

    // Show the delete warning
    prompt_delete_warning.classList.add("show");
  });
}

// -------------------------------------------------------------------------
//index page
if (window.location.href.indexOf("index") > -1) {
  var btn_patient_table = document.querySelector(".c_btn_patient_table");
  var btn_add_record = document.querySelector(".c_btn_add_record");
  var card1 = document.querySelector(".c_card1");
  var card2 = document.querySelector(".c_card2");
  var c_close_btn_index = document.querySelector(".c_close_btn_index");
  var body = document.getElementById("top");

  btn_patient_table.addEventListener("click", showCard2);
  btn_add_record.addEventListener("click", showCard1);
  c_close_btn_index.addEventListener("click", showCard2);

  function showCard1() {
    card1.classList.remove("show");
    card2.classList.add("show");
    btn_patient_table.classList.remove("active");
    btn_add_record.classList.add("active");
    // body.classList.remove("drawer-open");
    // body.classList.add("drawer-close");
  }

  function showCard2() {
    card2.classList.remove("show");
    card1.classList.add("show");
    btn_patient_table.classList.add("active");
    btn_add_record.classList.remove("active");
    // body.classList.remove("drawer-open");
    // body.classList.add("drawer-close");
  }
}

// ---------------------------------------------------------
// UNSET LAST PAGE NO

// document.addEventListener("DOMContentLoaded", function () {
//   // Attach a click event handler to your anchor link
//   document.getElementById("unsetLink").addEventListener("click", function (e) {
//     e.preventDefault(); // Prevent the default link behavior (page navigation)

//     // Send an AJAX request to unset_session.php when the link is clicked
//     var xhr = new XMLHttpRequest();
//     xhr.open("GET", "unset_session.php", true);

//     xhr.onreadystatechange = function () {
//       if (xhr.readyState === 4 && xhr.status === 200) {
//         // Handle the response (if needed)
//         console.log(xhr.responseText);
//       }
//     };

//     xhr.send();
//   });
// });
