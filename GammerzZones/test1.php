<?php
function sms_id_pass($match){
	$con=mysqli_connect('localhost','root','','GamerZone') or die("failed to query database".mysqli_error($con));
	$result=mysqli_query($con,"SELECT username , phone FROM $match") or die("Failed to query database".mysqli_error($con));
	while ($row=mysqli_fetch_array($result)) {
		echo($row['username']);
		echo "&nbsp;&nbsp;&nbsp;";
		echo($row['phone']);
		echo "<br>";
		echo "<br>";
	}
}
sms_id_pass('Users');
?>