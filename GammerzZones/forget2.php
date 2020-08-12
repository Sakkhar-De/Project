<?php
include"fast2sms.php";
date_default_timezone_set("Asia/Kolkata");
$sucess="";
$error_message="";
$conn=mysqli_connect("localhost","root","","GamerZone");
mysqli_select_db($con,"GamerzZones");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>GamerzZones-Forget-Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 100px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        size: 150%;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="bootstrap-responsive.min.css" rel="stylesheet">

   </head>

  <body>

    <div class="container">

    <div class="hero-unit">
    
    <h2 class="text-center text-success" style="font-size: 200%; font-weight: 400"> Forget Password!Get OTP Through Phone.</h2>
   </div>
   <div style="position:absolute; left:30%;top:50%" class="row">
   <div class="span6">

          <form class="form-signin" action="" method="POST">
            <h2 class="form-signin-heading" style="font-size: 150%; font-weight: 450; opacity: 0.9" >GET OTP THROUGH PHONE</h2>
            <input type="number" class="input-block-level" name="phone" placeholder="Enter Your Phone Number" pattern="[0-9]{10}" required>
            
            <input class="btn btn-medium btn-primary" type="submit" name="phone_btn" value="GET OTP"></input>
          </form>
<div style="width: 68%;margin-left: 17%; text-align: center;">
<?php
if(isset($_POST['phone_btn'])){
    $phone=$_POST['phone'];
   $result=mysqli_query($conn,"SELECT * FROM Users WHERE phone='".$_POST['phone']."'");
  $count=mysqli_num_rows($result);
  if($count>0){
    $otp=rand(1000,9999);
    $mail_status=OTP($_POST['phone'],$otp);
    if($mail_status==1){
      $result=mysqli_query($conn,"UPDATE Users  set token='$otp', otp_status = '1' ,otp_created_at=date(y-m-d H:i:s) WHERE phone=$phone ")or die ("Failed to query database".mysqli_error($conn));
      $current_id=mysqli_insert_id($conn);

      if(!empty($current_id)){
        $sucess=1;
    echo"<div class='alert alert-info' >OTP has been sent to $phone.</div>";
    echo"<div class='alert alert-info' >Enter OTP Below.</div>";
  }
}
}else{
  $error_message="Phone not exists!Please Check the Number You Entered.New Users Please Sign Up First.";
}
}
  if(isset($_POST['submit_phone_btn'])){
  $result=mysqli_query($conn,"SELECT * FROM Users WHERE phone=$phone AND token='". $_POST['otp'] ."' AND otp_status !=0 AND NOW() <= date_add(otp_created_at,INTERVAL 10 MINUTE)");
  $count=mysqli_num_rows($result);
  if(!empty($count)){
    $result=mysqli_query($conn,"UPDATE Users SET otp_status=0 WHERE token='". $_POST['otp'] ."'");
    $sucess=2;
    header('location:"changepassword.php"');
  }else{
    $sucess=1;
    $error_message="INVALID OTP!Ensure That You Have Entered Correct OTP With In 10 Mins.  ";
  }
}
?>
</div>

          <form class="form-signin" action="" method="POST">
            <input type="number" style="margin-top: 6%" class="input-block-level" name="otp" placeholder="Enter 4-digit OTP here" maxlength='4' pattern="[0-9]{4}" required>
            <input class="btn btn-medium btn-primary" type="submit" name='submit_phone_btn' value="SUBMIT"></input>
          </form>
      </div>
  </div>
</div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="bootstrap.min.js"></script>
<div class="footer" style=" position: absolute; top: 100%; left:50%; margin-bottom:5%;" >
		<a style="color:black;" href="login.php" ><b>GO BACK</b></a></div>
</body>
</html>