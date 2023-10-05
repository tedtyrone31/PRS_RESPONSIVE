function startTime() {
  var today = new Date();
  var h = today.getHours() > 12 ? today.getHours() - 12 : today.getHours();
  var am_pm = today.getHours() >= 12 ? "P.M." : "A.M.";
  var m = today.getMinutes();
  var s = today.getSeconds();
  (months = new Array(
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
  )),
    (curMonth = months[today.getMonth()]),
    (dayOfMonth = today.getDate());
  year = today.getFullYear();

  m = checkTime(m);
  s = checkTime(s);
  document.getElementById("time").innerHTML =
    h + ":" + m + ":" + s + '<span class="period"> ' + am_pm + "</span>";

  document.getElementById("month").innerHTML = curMonth;
  document.getElementById("day").innerHTML = dayOfMonth;
  document.getElementById("year").innerHTML = year;

  var t = setTimeout(startTime);
}
function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  } // add zero in front of numbers < 10
  return i;
}

// -----------------------------------------------------------------------------
// 12 HOURS FORMAT BUT BREAKS DESIGN

// function startTime() {
//   var today = new Date().toLocaleString("en-US", { timeZone: "Asia/Manila" });
//   var timeComponents = today.split(", ")[1].split(":");
//   var h = parseInt(timeComponents[0]);
//   var am_pm = h >= 12 ? "P.M." : "A.M.";
//   h = h % 12 || 12; // Convert 0 to 12 for midnight
//   var m = timeComponents[1];
//   var s = timeComponents[2];

//   // Get the month, day, and year
//   var options = { year: "numeric", month: "long", day: "numeric" };
//   var dateComponents = new Date()
//     .toLocaleDateString("en-US", options)
//     .split(", ");
//   var curMonth = dateComponents[0];
//   var dayOfMonth = dateComponents[1];
//   var year = dateComponents[2];

//   document.getElementById("time").innerHTML =
//     h + ":" + m + ":" + s + '<span class="period"> ' + am_pm + "</span>";

//   document.getElementById("month").innerHTML = curMonth;
//   document.getElementById("day").innerHTML = dayOfMonth;
//   document.getElementById("year").innerHTML = year;

//   var t = setTimeout(startTime, 1000); // Update the time every 1 second
// }

// startTime(); // Start the function
