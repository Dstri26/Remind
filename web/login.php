<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		include 'config.php';
		$email=strip_tags($_POST["email"]);
		$pass=strip_tags(md5($_POST["pass"]));
		$result=mysqli_query($con,"select * from remindUsers where email='$email' and pass='$pass'");
		print_r($result);
		if ($arr=mysqli_fetch_assoc($result)) {
			echo $arr["email"]; 
			if ($arr["email"]==$email && $arr["pass"]==$pass) {

				$_SESSION["name"]=$arr["name"];
				$_SESSION["email"]=$arr["email"];
				header("location:dashboard.php");

			}
			 else {
				echo "Invalid Account";
				header("location:index.php?msg=Email and Password doesn't match");
				
			}
		}
		else {
			echo "Invalid Account";
			header("location:index.php?msg=Email and Password doesn't match");
			
		}
		
	}
 ?>