<?php
 session_start();
    echo isset($_SESSION['login']);
    if(isset($_SESSION['login'])) {
      header('LOCATION:profile.php'); die();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>GamerzZones-LogIn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="s1.png" >
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
			</button>
			<a href="#" style="font-size:170%;" class="navbar-brand">GamerzZones</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-nav-demo">
		<ul class="nav navbar-nav">
			<li><a href="home.html">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact Us</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a href="1.php">Sign Up <i class="fa fa-user-plus"></i></a></li>
            <li class="active"><a href="#">Login <i class="fa fa-user"></i></a></li>
        </ul>
    </div>
</div>
</nav>
	<div class="login-box">
	<img src="tstavatar.jpg" class="avatar">
	<h1>Login Here</h1>
	<?php

	//get values from login.php file form
	if(isset($_POST['submit'])){
	$username=$_POST['user'];
	$password=$_POST['pass'];

	//to prevent mysql injection
	$con=mysqli_connect('localhost','sourav','12345');
	$username=stripcslashes($username);
	$password=stripcslashes($password);
	$username=mysqli_real_escape_string($con,$username);
	$password=mysqli_real_escape_string($con,$password);

	//to connect to the server
	mysqli_connect("localhost","sourav","12345");
	mysqli_select_db($con,"GamerzZones");

	//query the database for the user
	$result=mysqli_query($con,"select * from Users where username='$username' and password='$password'")
	or die("Failed to query database".mysqli_error($con));
	$row=mysqli_fetch_array($result);
	if(strtolower($row['username'])== strtolower($username) && $row['password']==$password){
		//echo "login sucess!!!Welcome ".$row['username'];
		$_SESSION["username"]=$row['username'];
		$_SESSION['login'] = true;
		header("location:profile.php");
	}else{
		echo "<div class='alert alert-danger'>Invalid Username or Password.</div>";	}
	} 
?>
		<form action="" method="post">
			<p>Username</p>
			<input type="text" name="user" id="user" placeholder="Enter UserName" required>
			<p>Password</p>
			<input type="password" name="pass" id="pass" placeholder="Enter password" required>
			<input type="submit" name="submit" value="Login">
			<a href="forget2.php">Forget Password?</a> &nbsp
			<a href="1.php">New User?Sign Up</a>			
	</form>
	</div>
	<script src="https://code.jquery.com/jquery-2.1.4.js"></script>


</body>

</html>