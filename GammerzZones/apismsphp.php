
<!DOCTYPE html>
<?php
if(isset($_POST['abc'])){
	$username = $_POST['username'];
	$hash = $_POST['hash'];
	$test ="0";
	$sender =$_POST['sender'];
	$number =$_POST['number'];
	$message =$_POST['message'];
	$message = urlencode($message);
	$data =
	"username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender.
	"&number=".$number."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$result = curl_exec($ch);
	echo ($result);
}?>
<html>
<head>
	<meta charset="utf-8">
	<title>untitled document</title>
</head>
<body>
	<form method="post" action="apismsphp.php">
		<table align="center">
			<tr>
				<td>
					username :
				</td>
				<td><input type="text" name="username" placeholder="enter your username"></td>
			</tr>
			<tr>
				<td>number :</td>
				<td><input type="text" name="number"
					placeholder="enter your number "></td>
			</tr>
			<tr>
				<td>hash :</td>
				<td><input type="text" name="hash" placeholder="enter your hash key"></td>
			</tr>
			<tr>
				<td>sender :</td>
				<td><input type="text" name="sender"
					placeholder="enter your name "></td>
			</tr>
			<tr>
				<td>message :</td>
				<td> <textarea type="text" name="message" placeholder="enter your username"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" name="abc" value="send"></td>
			</tr>
			
		</table>
	</form>

</body>
</html>