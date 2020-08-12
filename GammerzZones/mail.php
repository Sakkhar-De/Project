<?php
include"mail_function.php";
date_default_timezone_set("Asia/Kolkata");
$sucess="";
$error_message="";
$conn=mysqli_connect("localhost","sourav","12345","GamerZone");
if(!empty("$_POST['submit_email'])) {
	$result=mysqli_query($conn,"SELECT * FROM Users WHERE email='".$_POST['email']."'");
	$count=mysqli_num_rows($result);
	if($count>0){
		$otp=rand(1000,9999);
		$mail_status=sendOTP($_POST['email'],$otp);
		if($mail_status==1){
			$result=mysqli_query($conn,"INSERT INTO otp_expiry(otp,is_expired,created_at) VALUES('". $otp ."',0,'". date("y-m-d H:i:s") ."')");
			$current_id=mysqli_insert_id($conn);

			if(!empty($current_id)){
				$sucess=1;
			}
		}
	}else{
		$error_message="Email not exists!Please Check the email you entered.New Users Please Sign Up First.";
	}
}
if(!empty($_POST['submit_otp'])){
	$result=mysqli_query($conn,"SELECT * FROM otp_expiry WHERE otp='". $_POST['otp'] ."' AND is_expired!=1 AND NOW() <= date_add(created_at,INTERVAL 10 MINUTE)");
	$count=mysqli_num_rows($result);
	if(!empty($count)){
		$result=mysqli_query($conn,"UPDATE otp_expiry SET is_expired=1 WHERE otp='". $_POST['otp'] ."'");
		$sucess=2;
	}else{
		$sucess=1;
		$error_message="INVALID OTP!Ensure That You Have Entered Correct OTP With In 10 Mins.  ";
	}
}
?>