<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <title>GamerzZones-Sign-up</title>
 <link rel="shortcut icon" href="s1.png" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="sign.css">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            <li class="active"><a href="#">Sign Up <i class="fa fa-user-plus"></i></a></li>
            <li><a href="login.php">Login <i class="fa fa-user"></i></a></li>
        </ul>
    </div>
</div>
</nav>
	<div class="wrap">
	<h1><b>Create An Account</b></h1><br>
<?php
if(isset($_POST['submit'])){
            $name = filter_input(INPUT_POST,'name');
            $username = filter_input(INPUT_POST, 'username');
            $email=filter_input(INPUT_POST, 'email');
            $phone=filter_input(INPUT_POST, 'phone');
            $password = filter_input(INPUT_POST, 'password');
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
 
            $host = "localhost";
            $dbusername = "sourav";
            $dbpassword = "12345";
            $dbname = "GamerzZones";
            // Create connection
            $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()){
                        die('Connect Error ('. mysqli_connect_errno() .') '
                            . mysqli_connect_error());
                            echo"failed to connect database";
                        }
                else{
                        $result1=mysqli_query($conn,"select * from Users where username='$username' ") or die("Failed to query database".mysqli_error($conn));
                            $row1=mysqli_fetch_array($result1);
                            $result2=mysqli_query($conn,"select * from Users where email='$email' ") or die("Failed to query database".mysqli_error($conn));
                            $row2=mysqli_fetch_array($result2);
                            $result3=mysqli_query($conn,"select * from Users where phone='$phone' ") or die("Failed to query database".mysqli_error($conn));
                            $row3=mysqli_fetch_array($result3);
                        if($username==$row1['username']){
                        echo "<div class='alert alert-danger'>Username Already Exists,Please Enter Your Unique Pubg Username.</div>";
                        }elseif($email=$row2['email']){
                        echo "<div class='alert alert-danger'>Email Already Exists.Enter Anothere Email.</div>";
                        }elseif($phone=$row3['phone']){
                         echo "<div class='alert alert-danger'>Phone Number Already Exists,If You Are Already An User Please LogIn.</div>";    
                        }else{
                            echo"$email";
                            echo"$phone";
                        O$sql = "INSERT INTO Users (name,username,email,password,phone,wallet)
                         values ('$name','$username','$email','$password','$phone','10')";
                        if ($conn->query($sql)){
	
                        	$_SESSION["username"]=$username;
	                        header("location:verify.php");
                            }
                    else{
                          echo "Error: ". $sql ."
                             ". $conn->error;
                             $conn->close();
                         echo "<div class='alert alert-danger'>Signup failed.Please try again.</div>";	
                        die();
            }
        }
}
}
?>
<form method="POST" action="">
<b>Name :</b> <input type="text" name="name" placeholder="Full Name" required><br>
<b>UserName :</b> <input type="text" name="username" placeholder="PUBG Username" required><br>
<b>Email :</b> <input type="email" name="email" placeholder="Email" required><br>
<b>Phone :</b> <input type="number" name="phone" placeholder="phone" maxlenght="10" minlenght="10" pattern="[0-9]{10}" required><br>
<b>Password :</b> <input type="password" name="password" minlenght="5" placeholder="Create New Password" required><br>
<input type="submit" name="submit" value="SIGN UP">
 <a href="login.php">Already A Member?Log In</a><br><br>
        <p>By clicking SUBMIT, you agree to our Terms, Data Policy and Cookie Policy. You may receive SMS notifications from us and can opt out at any time..</p>
    </form>
    </div>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</body>
</html>