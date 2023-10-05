document.addEventListener("DOMContentLoaded", function () {
  // Get a reference to all input fields with the class "required-input"
  const inputFields = document.querySelectorAll(".required-input");
  //   const c_info_extra = document.querySelectorAll(".c_info_extra");

  // Function to add the "required" attribute dynamically
  function addRequiredAttribute(event) {
    const inputValue = event.target.value.trim();
    if (inputValue !== "") {
      //   event.target.removeAttribute("required");
      //   console.log("test_removed");
      inputFields.forEach(function (inputField) {
        event.target.classList.add("add");
      });
    }
    if (inputValue == "") {
      //   event.target.setAttribute("required", "required");
      inputFields.forEach(function (inputField) {
        event.target.classList.remove("add");
      });
      console.log("test");
    }
  }

  function handleFocus(event) {
    // Code to execute when the input field is focused
    event.target.classList.add("add");
    // You can add any additional actions you want here
  }
  function handleBlur(event) {
    const inputValue = event.target.value.trim();
    if (!inputValue) {
      event.target.classList.remove("add");
    }

    // You can add any additional actions you want here
  }

  inputFields.forEach(function (inputField) {
    inputField.addEventListener("input", addRequiredAttribute);
    inputField.addEventListener("focus", handleFocus);
    inputField.addEventListener("blur", handleBlur);
  });

  //   const textareaFields = document.querySelectorAll(".textarea");

  //   textareaFields.forEach(function (textareaField) {
  //     textareaField.addEventListener("input", addRequiredAttribute);
  //     textareaField.addEventListener("focus", handleFocus);
  //     textareaField.addEventListener("blur", handleBlur);
  //   });
});
