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
#form1 {

display:none;

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

#formButton{
  position: absolute;
  top: 32%;
  left: 43%;
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
#formButton:hover{
  background: #3cb0fd;
  text-decoration: none;
}
  </style>
</head>
<body>
    <form action="" method="POST" >
  <i class="fa fa-phone" style="font-size:350%; position: absolute; color:red;top:25%;
  left:33%;opacity: .8"></i>
  <input style="width:25%;
  outline: none;
  top: 27%;
  left: 50%;
  position:absolute;
  transform:translate(-50%,-50%);
  box-sizing:border-box;
  text-align: center;
  opacity: 0.8;
  border:none;
  border-bottom:1px solid black;
  font-size: 150%;
  padding: 1%;" class="input" type="tel" name="phone" minlength="10" maxlength="10" pattern="[0-9]{10}" placeholder="Enter Your Phone Number" required>
  <input type="submit" id="formButton" name="button" value="SEND OTP"></input>
</form>
<div style="width: 50%;margin-left: 25%;margin-top:5%; text-align: center;">
<?php
  if(isset($_POST['button'])){
   $result= mysqli_query($conn,"select * from Users where phone = '".$_POST['phone']."' " )or die ("Failed to query database".mysqli_error($conn)) ;
    $row=mysqli_fetch_array($result);
    $_SESSION['phone']=$row['phone'];
    $_SESSION['username']=$row['username'];
    $phone=$_SESSION['phone'];
  $count=mysqli_num_rows($result);
  if($count > 0){
    $otp=rand(1000,9999);
   /* $mail_status=smsOTP($_POST['phone'],$otp); */
   $mail_status='1';
    if($mail_status == '1'){
      $result1=mysqli_query($conn,"UPDATE Users  set token=$otp, otp_status = '1' ,otp_created_at=NOW() WHERE phone = '".$_POST['phone']."'")or die ("Failed to query database".mysqli_error($conn));
        $sucess=1;
        header('location:verify2.php');
    

}
}else{
    echo"<div class='alert alert-danger' >Phone not exists!Please Check the Number You Entered.New Users Please Sign Up First.</div>";
}
}
?></div>
</body>
</html>