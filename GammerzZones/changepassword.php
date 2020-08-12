<?php
session_start();
if($_SESSION['username']==''){
    header("location:logout.php");
}
$phone=$_SESSION['phone'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>GamerzZones-Changepassword</title>
	<link rel="shortcut icon" href="s1.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#form1 input[type=submit]:hover{
    cursor:pointer;
    background:green;
}
@media screen and (min-width:1100px){
    h3{
    margin-top:6%;
 	color:black;
 	font-weight: 430;
 	position: absolute;
	left:20%;
    }
    h4{
    margin-top:45%;
 	color:black;
 	font-weight: 430;
 	position: absolute;
	left:25%; 
    }
}
    #echo1{
       text-align: center; font-size: 150%; position: absolute; top:20%; width: 30%; left: 35%; 
    }
    #form1 #p1{
        width:25%;
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
	padding: 1%;
    }
    #form1 #p2{
        width:25%;
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
	padding: 1%;
    }
    #form1 input[type=submit]{
    width:10%;
	top:70%;
	left:50%;
	outline: none;
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	border-radius: 20px;
	text-align: center;
	background-color: red;
	color: white;
	font-size: 130%;
    }
@media screen and (max-width: 600px) and (min-width:300px){
      h3{
    margin-top:35%;
 	color:black;
 	font-weight: 330;
 	position: absolute;
	left:6%;
	font-size:120%;
    }
    h4{
    top:75%;
 	color:black;
 	font-weight: 200;
 	position: absolute;
	left:3%;
	margin-right:2%;
    }
    #echo1{
       text-align: center; font-size: 120%; position: absolute; top:20%; width: 30%; left: 35%; 
    }
    #form1 #p1{
        width:75%;
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
	padding: 1%;
    }
    #form1 #p2{
        width:75%;
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
	padding: 1%;
    }
    #form1 input[type=submit]{
    width:50%;
	top:70%;
	left:50%;
	outline: none;
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	border-radius: 20px;
	text-align: center;
	background-color: red;
	color: white;
	font-size: 130%;
    }  
    }
    @media screen and (max-width: 1100px) and (min-width:600px){
      h3{
    margin-top:26%;
 	color:black;
 	font-weight: 330;
 	position: absolute;
	left:10%;
	margin-right:3%;
	font-size:150%;
    }
    h4{
    top:50%;
 	color:black;
 	font-weight: 300;
 	position: absolute;
	left:10%; 
    }
    #echo1{
       text-align: center; font-size: 120%; position: absolute; top:20%; width: 30%; left: 35%; 
    }
    #form1 #p1{
        width:75%;
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
	padding: 1%;
    }
    #form1 #p2{
        width:75%;
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
	padding: 1%;
    }
    #form1 input[type=submit]{
    width:50%;
	top:70%;
	left:50%;
	outline: none;
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	border-radius: 20px;
	text-align: center;
	background-color: red;
	color: white;
	font-size: 130%;
    }  
    }
</style>
</head>
<body>
 	<h3 > CHANGE &nbsp; YOUR &nbsp;PASSWORD&nbsp;. NEVER &nbsp;SHARE &nbsp;YOUR &nbsp;PASSWORD &nbsp;TO &nbsp;ANYONE.</h3>

<?php
if(isset($_POST['submit'])){
		$con=mysqli_connect('localhost','root','');
		mysqli_select_db($con,"GamerZone");
	 if($_POST['pass1'] == $_POST['pass2']){
			$pass=$_POST['pass1'];
			$result=mysqli_query($con,"update Users set password='$pass'
            where phone='$phone'")or die("Failed to query database".mysqli_error($con));
            header("location:logout.php");
		}
		else{
		echo "<div id='echo1' class='alert alert-danger'>Password Doesn't Matched.Enter Password Correctly In Both The Field.</div>";
}
}
?>
<form id="form1" action="" method="POST">
 <input id="p1" class="input" type="password" name="pass1" placeholder="Enter New Password"  required>


	<input id="p2" class="input" type="password" name="pass2" placeholder="Confirm Password"  required>

	<input type="submit" name="submit" value="CHANGE"></form>
	<h4 >On Clicking, 'CHANGE' Button,You Will Be Logged Out Of All Devices.You Have To LogIn Again.</h4>
</body>
</html>