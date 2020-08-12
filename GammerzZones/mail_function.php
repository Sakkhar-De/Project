<?php
function sendOTP($email,$otp)
{
	require 'PHPMailerAutoload.php';
	require ('phpmailer/class.phpmailer.php');
	require ('phpmailer/class.smtp.php');
	$message_body="Your OTP is:<br/><br/>".$otp;
	$mail = new PHPMailer();
			$mail->setFrom('no-reply@gamerzzones.com','GamerzZones');
			$mail->AddAddress($email);
			$mail->Subject= 'OTP For Forget Password';
			$mail->body=$message_body;
			$result=$mail->Send();
			if (!$result) {
				echo "Mailer Error:" . $mail->ErrorInfo;
			}else{
				return($result);
			}
}
sendOTP('deysourav330@gmail.com','1234')
?>