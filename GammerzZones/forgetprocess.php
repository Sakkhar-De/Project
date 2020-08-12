<?php
	if(isset($_POST["forgetpass"])) {
		$con = new mysqli("localhost","root","","GamerZone");
		$email = stripcslashes($email);
		$email = $con->real_escape_string($_post["email"]);
		$data = $con->query("SELECT id FROM users where email='$email'");
		
		if($data->num_rows>0) {
			$str = "0123456789qwertyuiopasdfghjklzxcvbnm";
			$str = str_shuffle($str);
			$str = substr($str, 0,10);
			$url = "http://domain.com/resetpassword.php?token=$str&email=$email";

			mail($email, "RESET PASSWORD", "To Reset Your Password Please Visit This:$url","From:no_reply@GamerZone.com\r\n");
			$con->query("UPDATE users SET token='$str' where mail='$email'");
			echo "Please Check Your Email!";

		}else{
			echo "PLease check your inputs!";
		}
	}

?>