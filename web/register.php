<?php 

if($_SERVER["REQUEST_METHOD"]=="POST")
{

	include 'config.php';
	$name=strip_tags($_POST["name"]);
	$pass=strip_tags($_POST["pass"]);
	$pass=md5($pass);
	$email=strip_tags($_POST["email"]);

	mysqli_query($con,"insert into remindUsers(email,name,pass) values('$email','$name','$pass')");
	header('location:index.php?msg=You can Login Now');
}
	



 ?>