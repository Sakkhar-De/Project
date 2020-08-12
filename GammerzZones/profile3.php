<?php
session_start();
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");

$username=$_SESSION["username"];
    $con=mysqli_connect('localhost','root','');
        mysqli_select_db($con,"GamerZone");
    $result=mysqli_query($con,"select * from Users where username='$username'")
    or die("Failed to query database".mysqli_error($con));
    $row=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>GamerzZones</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="profile3.css">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
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
			<li class="active"><a href="#">Profile</a></li>
				<li><a href="match.php">Matches</a></li>
		    <li><a href="#">About</a></li>
		    <li><a href="#">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        	<li><a href="logout.php">Logout <i class="fa fa-lock"></i></a></li>
        </ul>
    </div>
    </div>
    </nav>
<br/>
<br/>
<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button">ADD MONEY</a>
  <a href="#" class="w3-bar-item w3-button">WITHDRAW</a>
  <a href="#" class="w3-bar-item w3-button">TRANSACTION</a>
</div>

<!-- Page Content -->
<div>
  <button class="w3-button w3-xlarge" onclick="w3_open()"><i class="fa fa-bars"></i></button>
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
     
<div class="container">
<div class="row">
<div class="col-md-2"></div>

 <div class="col-md-6 con1">
        <dir><h4 style="color: black; font-size:;" ><b>WELCOME  <?php echo strtoupper($username);?></h4></dir></b>
    <dir><h4><b>Email : <?php echo $row['email'];?></h4></dir></b></dir>

    <dir><h4><b>Your Balance : Rs <?php echo $row['wallet']; ?></h4></dir></b>

    <dir><h4>Total Earns : Rs <?php echo $row['win_price']; ?></h4></dir>
    <dir><h4>Total Matches : <?php echo $row['match_played']; ?></h4></dir>
    <dir><h4>Total Kills : <?php echo $row['kills']; ?></h4></dir></h4></dir></h4></dir></h1></dir>
	 <div class="con">
   <dir><button onclick="window.location.href='match.php';" class="btn btn-success btn-lg">Play Matches</button></dir>
     <p>Click Hear To Enter the Game Zone!!</p></div>
  </div>
		
</div>
</div>
</div>
</div>
</div>
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h2 class = "modal-title" id = "myModalLabel">
                YOUR TRANSACTIONS
            </h2>
         </div>
         <div class = "modal-body">
            <?php
          $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM transaction where username='$username'");
          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf (" %s  ",$row['type'] );
            echo "&nbsp;";
            printf(" %s ",$row["amount"]);
            echo "&nbsp;";
            printf(" %s ",$row["trans_id"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>

         </div>
         
         <div class = "modal-footer">
         <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
            </div>
      </div>
   </div>
   </div>

    <div class="footer">
   <footer>
  <b>Copyright &copy 2019 All rights reserved.</b>
</footer>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>