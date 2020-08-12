<?php
//session_start();
	$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 	<h3 style="margin-top:6%;
 	color:black;
 	font-weight: 330;
	margin-left:7%;" > WITHDRAW MONEY ANYTIME TO YOUR PAYTM ACCOUNT . ALL TRANSACTIONS ARE ENCRYPTED AND HIGHLY SECURE .</h3>
	<h3 style="margin-top:1%;
 	color:#1E90FF;
 	font-weight: 350;
	margin-left:32%;" > TRANSACTIONS MAY TAKES UPTO 24 HOURS .</h3>

<div style="text-align: center; font-size: 150%; position: absolute; width: 30%; left: 35%" >
<?php
	if(isset($_POST['submit'])){
		$withdraw=$_POST['withdraw'];
		$con=mysqli_connect('localhost','root','');
		mysqli_select_db($con,"GamerZone");
		$result=mysqli_query($con,"select * from Users where username='$username'")or die("Failed to query database".mysqli_error($con));
			$row=mysqli_fetch_array($result);
		if($withdraw > $row['win_price']){
			echo "<div class='alert alert-danger'>You Can Only Withdraw The Earned Money .</div>";
		}
		else if($withdraw > $row['wallet']){
			echo "<div class='alert alert-danger'>Don't Have Enough Money To Withdraw.</div>";
		}
		else if($_POST['phone1'] != $_POST['phone2']){
			echo "<div class='alert alert-danger'>Phone Number Doesn't Matched.</div>";
		}
		else{
			$phone=$_POST['phone1'];
			$trans_id="withdraw_Rs_".strval($withdraw)."_to_".strval($phone);
			$new_wallet=$row['wallet']-$withdraw;
			$new_win_price=$row['win_price']-$withdraw;
			$result2=mysqli_query($con,"update Users set wallet=$new_wallet,win_price=$new_win_price
            where username='$username'")or die("Failed to query database".mysqli_error($con));
            $result3=mysqli_query($con,"INSERT INTO withdraw (username,paytm_number,amount,trans_id)
values ('$username','$phone','$withdraw','$trans_id')")or die("Failed to query database".mysqli_error($con));
            echo "<div class='alert alert-danger'>Withdraw Sucessful.Transactions Will Be Processed With In 24 Hours.</div>";

            $result4=mysqli_query($con,"INSERT INTO transaction (username,type,amount,trans_id)
values ('$username','withdrawl','$withdraw','$trans_id')")or die("Failed to query database".mysqli_error($con));
               header('location:profile.php');
		
		}
	}
?>
</div>

 	<form action="" method="POST" >
 	<i class="fa fa-inr" style="font-size:400%; position: absolute; top:32.5%;
	margin-left:35%; color:red"></i>
    <input style="width:25%;
	outline: none;
	top:35%;
	left:50%;
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	text-align: center;
	opacity: 0.8;
	border:none;
	border-bottom:1px solid black;
	font-size: 150%;
	padding: 1%;" class="input" type="number" name="withdraw" min="30" max="5000" placeholder="Enter Amount To Withdraw" required>


    <input style="width:25%;
	outline: none;
	top:45%;
	left:50%;
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	text-align: center;
	opacity: 0.8;
	border:none;
	border-bottom:1px solid black;
	font-size: 150%;
	padding: 1%;" class="input" type="tel" name="phone1" placeholder="Phone Number Linked To Paytm" pattern="[0-9]{10}" required>


	<input style="width:25%;
	outline: none;
	Top:55%;
	Left:50%;
	Position:absolute;
	transform:Translate(-50%,-50%);
	Box-sizing:border-box;
	text-align: center;
	opacity: 0.8;
	border:none;
	border-bottom:1px solid black;
	font-size: 150%;
	padding: 1%;" class="input" type="tel" name="phone2" placeholder="Confirm Phone Number" pattern="[0-9]{10}" required>

	<input style="width:10%;
	top:70%;
	left:50%;
	outline: none;
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	border-radius: 20px;
	text-align: center;
	background-color: #1E90FF;
	color: white;
	font-size: 130%;" type="submit" name="submit" value="WITHDRAW"></form>
	<div class="footer" style=" position: absolute; top: 50%;" >
		<h4 style="margin-left: 7%" >GO BACK </h4>
	<a style="color: black; opacity: 0.8; " href="profile.php">To <b>Profile</b> Page</a>&nbsp&nbsp | &nbsp
	<a style="color: black; opacity: 0.8" href="match.php">To <b>Matches</b> Page</a></div>
</body>
</html>