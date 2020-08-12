<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<?php 
	if (isset($_POST['button'])) {
		echo "<script>
		myfunc();
		</script>";	
	}
	?>
	<form method="POST">
	<input type="submit" name="button" value="Update" /></form>
<script type="text/javascript">
function myfunc() {

var ele = document.createElement("input");
ele.setAttribute("type","text");
ele.setAttribute("class" , "your class");
ele.setAttribute("name" , "username");

var ele2 = document.createElement("input");
ele2.setAttribute("type","password");
ele2.setAttribute("class" , "your class");
ele2.setAttribute("name" , "password");


document.body.appendChild(ele);
document.body.appendChild(ele2);
}
</script>
</body>
</html>