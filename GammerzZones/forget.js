

var btnContainer = document.getElementsById("row");

// Get all buttons with class="btn" inside the container
var span6s = btnContainer.getElementsByClassName("span6");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < span6s.length; i++) {
  span6s[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
