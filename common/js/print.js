// adjust width on initial load
window.onload = adjustWidth;

var inputFields = document.querySelectorAll(".adjustWidth");

function adjustWidth() {
  inputFields.forEach(function (element) {
    var value = element.value;
    var width = value.length * 12 + 25; // Adjust the multiplication factor as needed
    element.style.width = width + "px";
  });
  console.log("success");
}

inputFields.forEach(function (element) {
  element.addEventListener("input", adjustWidth);
});
