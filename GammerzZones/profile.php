<?php
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");

?>
<?php
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
	<title>Gametype</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Gametype.css">	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-aweesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">GamerZone</a>
		</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Profile</a></li>
				<li><a href="match.php">Matches</a></li>
				<li><a href="#">About</a></li>
				<li><a href="incontact.html">Contact Us</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="logout.php">Logout   <i class="fa fa-lock"></i></a></li>
            </ul>
        </div>
    </nav>
    <div class="slider">
    	<img src="sk2.jpg">
    </div>
    <dir><h1 style="color: white; font-size: 50px;" ><b>WELCOME  <?php echo strtoupper($username);?></h1></dir></b>
    <dir><h4><b>Email : <?php echo $row['email'];?></h4></dir></b></dir>

    <dir><h4><b>Your Balance : Rs <?php echo $row['wallet']; ?></h4></dir></b>
    <dir><h4>Total Earns : Rs <?php echo $row['win_price']; ?></h4></dir>
    <dir><h4>Total Matches : <?php echo $row['match_played']; ?></h4></dir>
    
    <dir><h4>Total Kills : <?php echo $row['kills']; ?></h4></dir>
    <dir><button onclick="window.location.href='3.php'" class="btn btn-success btn" style="width: 8.5%">ADD MONEY</button></dir>
    <dir><button onclick="window.location.href='withdraw.php'" class="btn btn-success btn" style="width: 8.5%"> WITHDRAW </button></dir>
    <dir><button style="outline: none; width: 8.5%;" class="btn btn-success btn" data-toggle = "modal" data-target = "#myModal">TRANSACTION</button></dir>
	<div class="con">
	 <dir><button onclick="window.location.href='match.php';" class="btn btn-success btn-lg">Play Matches</button></dir>
     <p>Click Hear To Enter the Game Zone!!</p></div>
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
          $conn=mysqli_connect("localhost", "root", "") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerZone");
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
</body>
</head>
</html>

