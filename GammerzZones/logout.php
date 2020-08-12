<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:home.html"); //to redirect back to "home.html" after logging out
exit();
?>
