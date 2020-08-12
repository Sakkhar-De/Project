<!DOCTYPE html>
<html>
<head>
	<title>GamerzZones-Changepassword2</title>
	<style type="text/css">
@media screen and (min-width:1100px){
    #echo1{
       text-align: center; font-size: 150%; position: absolute; top:20%; width: 30%; left: 35%; 
    }
    }
@media screen and (max-width: 600px) and (min-width:300px){
    #echo1{
       text-align: center; font-size: 120%; position: absolute; top:20%; width: 30%; left: 35%; 
    } 
    }
    @media screen and (max-width: 1100px) and (min-width:600px){
      
    #echo1{
       text-align: center; font-size: 120%; position: absolute; top:20%; width: 30%; left: 35%; 
    }  
    }
	</style>
</head>
<body>

<div id="echo1" >
<?php
session_start();
if($_SESSION['username']==''){
    header("location:logout.php");
}
$phone=$_SESSION['phone'];

	if(isset($_POST['submit'])){
		$con=mysqli_connect('localhost','sourav','12345');
		mysqli_select_db($con,"GamerzZones");
	 if($_POST['pass1'] != $_POST['pass2']){
			echo "<div class='alert alert-danger'>Password Doesn't Matched.Enter Password Correctly In Both The Field.</div>";
		}
		else{
			$pass=$_POST['pass1'];
			$result=mysqli_query($con,"update Users set password='$pass'
            where phone='$phone'")or die("Failed to query database".mysqli_error($con));
            header("location:logout.php");
		}
	}
?></div>
</body>
</html>