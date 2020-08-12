<?php
session_start();
$db = new mysqli_connect('localhost','root','','GamerZone') or die("could not connect to the database");
$errors=array();

$Firstname = filter_input(INPUT_POST,'Fn');
$lastname  = filter_input(INPUT_POST, 'Ln');
$name      = $Firstname+$Lastname;
$name      = filter_input(INPUT_POST, 'name');
$username  = filter_input(INPUT_POST, 'Un');
$Email     = filter_input(INPUT_POST, 'E');
$password1 =filter_input(INPUT_POST, 'p1');
$password2 =filter_input(INPUT_POST, 'p2');

if(empty($Firstname))
	array_push($errors,"Firstname is required");
if(empty($lastname))
	array_push($errors,"lastname is required");
if(empty($username))
	array_push($errors,"Username is required");
if(empty($Email)){array_push($errors,"Email is required");
if(empty($password1))
	array_push($errors,"Password is required");
if($password1 != $password2)
	array_push($errors, "passwords do not matches.");

$user_check_query="SELECT from user WHERE username='$username' or email='$email'LIMIT 1";
$results=mysqli_query($db,$user_check_query);
$user=mysqli_fetch_assoc($results);
if($user['username']==$username)
	array_push($errors, "Username already exists.");
if($user['email']==$Email)
	array_push($errors, "This Email id already has a registered username.");
if(count($errors)==0){
    $password=md5($password1);
    $name=$Firstname+""+$lastname;
    $sql="INSERT INTO users(name,username,email,password) VALUES('$name','$username','$email','$password')";
}
if($db->query($sql){
	echo "new record inserted sucessfully.";
} 
else{
	echo "Error:".$sql."<br>".$db->error;
}
$db->close();
s_session['success']="you are now logged in";
header('location:#');
?>