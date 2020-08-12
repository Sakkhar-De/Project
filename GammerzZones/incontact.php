<!DOCTYPE html>
<html>
<head>
	<title>GamerzZones-Contact Us</title>
  <link rel="shortcut icon" href="s1.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="c.css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo"
      aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a href="#" style="font-size:170%;" class="navbar-brand">GamerzZones</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-nav-demo">
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li class="active"><a href="#">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        	<li><a href="logout.php">Logout <i class="fa fa-lock"></i></a></li>
        </ul>
    </div>
    </div>
    </nav>
	<div class="box">
	<img src="messagelogo.jpg" class="logo">
	<form method="post" action="contact.php">
	<h2>Contact Form</h2>
  <?php
  if(isset($_POST['submit'])){
 $username = filter_input(INPUT_POST, 'username');
 $email=filter_input(INPUT_POST, 'email');
 $phone=filter_input(INPUT_POST, 'phone');
 $message = filter_input(INPUT_POST, 'message');
 if (!empty($username)){
  if(!empty($email)){
    if (!empty($phone)) {
      if (!empty($message)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "GamerZone";
// Create connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
          if (mysqli_connect_error()){
            die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
            }
          else{
            $sql = "INSERT INTO contact (username,email, message)
            values ('$username','$email','$message')";
              if ($conn->query($sql)){
                echo "<div class='alert alert-info'>Message sent sucessfully.</div>";
                header("location:contact.php");
                }
              else{
                echo "Error: ". $sql ."
                ". $conn->error;
                }
                $conn->close();
            }
      }
    else{
      echo "<div class='alert alert-info' role='alert'>Contact Form should not be empty</div>";
      header("location:contact.php");
      die();
      }
    }
  else{
    echo "<div class='alert alert-info' role='alert'>Contact Form should not be empty</div>";
    header("location:contact.php");
    die();
    }
  }
else{
  echo "<div class='alert alert-info' role='alert'>Contact Form should not be empty</div>";
  header("location:contact.php");
  die();
}
}
else{
echo "<div class='alert alert-info' role='alert'>Contact Form should not be empty</div>";
header("location:contact.php");
die();
}
}
?>
		<div>
		 <input type="text" name="username" Placeholder="Your Name"required>
		</div>
			<div>
    		     <input type="Email" placeholder="Your Email" name="email" required>
    	    </div>
    	    <div>
    		     <input type="tel" placeholder="Your Phone Number" name="phone" minlength="10" pattern="[0-9]{10}" required>
    	    </div>
    	    <div>
    	    <h4> Message </h4>
      		 <textarea style="outline: none;border:1px solid black; border-radius: 30px; text-align: center;" id="name" cols="42" rows="8" type="text" name="message" placeholder="Write SomeThing." required></textarea>
      		</div>
    		<input type="submit" name="submit" value=" SUBMIT ">
    </form>
	</div>
  <div id="foot" class="footer"><b>Copyright &copy 2019 All Rights Reserved.</b></div>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>