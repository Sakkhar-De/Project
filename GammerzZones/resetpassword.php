<?php
if(isset($_GET["email"]) && isset($_GET["token"])){
	$con = new mysqli("localhost","root","","GamerZone");
	$email = $con->real_escape_string($_GET["email"]);
	$token = $con->real_escape_string($_GET["token"]);

	$data = $con->query("SELECT id from Users where email='$email' AND token='$token' ");

	if($data->num_rows > 0){

		$newpassword= $con->real_escape_string($_GET["password"]);
		$con->query("update password from Users where email='$email' AND token='$token' ");
		echo "Password successfully changed.";
	}
	else{
	 echo "Please Check Your Link!";
	}

}
else{
	header("location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<body>
		<form action="resetpassword.php" method="post">
			New Password:<input type="password" name="password" placeholder="New Password" required>
			<input type="submit" name="submit" value="SUBMIT">
	</div>

</body>
</html>