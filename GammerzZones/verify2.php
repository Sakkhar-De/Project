<?php
//session_start();
include("fast2sms.php");
date_default_timezone_set("Asia/Kolkata");
$sucess="NULL";
$error_message="NULL";
$conn= new mysqli("localhost","root","");
mysqli_select_db($conn,"GamerZone");
?>
<!DOCTYPE html>
<html>
<head>
  <title>GamerzZones-Verify-Phone-Number</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
body{
  background: 100%;
  width: 100%;

}


#formButton1{
  position: absolute;
  top: 52%;
  left: 44%;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  outline: none;
  background: #3498db;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
  margin:20px;
 
}
#formButton1:hover{
  background: #3cb0fd;
  text-decoration: none;
}

</style>
</head>
<body>
  <div style="width: 50%;margin-left: 25%;text-align: center;margin-top: 10%;">
<?php
  $phone=$_SESSION['phone'];
    echo"<div class='alert alert-info' >OTP has been sent to $phone.</div>";
    echo"<div class='alert alert-info' >Enter OTP Below.</div>";
if(isset($_POST['submit'])){
    $input_otp= mysqli_real_escape_string($conn, $_POST['input_otp']);
    echo $input_otp;
    $result2=mysqli_query($conn,"SELECT * FROM Users WHERE phone ='$phone' AND token =$input_otp AND otp_status = '1' AND NOW() < date_add(otp_created_at,INTERVAL 10 MINUTE) ")or die("Failed to query database".mysqli_error($conn));
  $count2=mysqli_num_rows($result2);
  echo "$count2";
  if(!empty($count2)){
    $result3=mysqli_query($conn,"UPDATE Users SET otp_status = '0'  WHERE phone='$phone' ")or die ("Failed to query database".mysqli_error($conn));
    $sucess=2;
    header('location:profile.php');
  }else{
    $sucess=1;
    $error_message="INVALID OTP!Ensure That You Have Entered Correct OTP With In 10 Mins.  ";
  }
}
?></div>

<form id="form1" action="" method="POST" >
  <input style="width:25%;
  outline: none;
  top: 47%;
  left: 50%;
  position:absolute;
  transform:translate(-50%,-50%);
  box-sizing:border-box;
  text-align: center;
  opacity: 0.8;
  border:none;
  border-bottom:1px solid black;
  font-size: 150%;
  padding: 1%;" class="input" type="tel" name="input_otp" minlength="4" maxlength="4" pattern="[0-9]{4}" placeholder="Enter The 4 Digit OTP Here" required>
  <input type="submit" id="formButton1" name="submit" value="SUBMIT"></input></form>
  
</body>
</html>