<?php  
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
	include_once('dbConnect.php');   
	$funObj = new dbConnect();  
	if(isset($_POST['login']) && $_POST['login']){  
		$emailid = $_POST['emailid'];  
		$password = $_POST['password'];  
		$user = $funObj->Login($emailid, $password);  
		if ($user) {  
		   header("location:home.php");  
		} else {  
			echo "<script>alert('Emailid / Password Not Match')</script>";  
		}  
	}  
	if(isset($_POST['register']) && $_POST['register']){  
		$first_name = $_POST['first_name']; 
		$last_name = $_POST['last_name'];  
		$email = $_POST['email'];  
		$password = $_POST['password'];  
		$date = $_POST['date'];  
		$register = $funObj->UserRegister($first_name, $last_name, $email,$password,$date);  
		if($register){  
			 echo "<script>alert('Registration Successful')</script>";  
		}else{  
			echo "<script>alert('Registration Not Successful')</script>";  
		}  
	  
	}
	  
?> 
<link rel="stylesheet" type="text/css" href="style.css">
<input type='checkbox' id='form-switch'>
<form id='login-form' action="" method='post'>
	<input type="text" placeholder="Email" name="emailid" required>
	<input type="password" name="password" placeholder="Password" required>
	<input type='submit' value="login" name="login">Login</input>
	<label for='form-switch'><span>Register</span></label>
</form>
<form id='register-form' action="" method='post'>
	<input type="text" placeholder="First Name" name="first_name" required>
	<input type="text" placeholder="Last Name" name="last_name" required>
	<input type="email" placeholder="Email" name="email" required>
	<input type="password" placeholder="Password" name="password" required>
	<input type="date" placeholder="Date" name="date" required>
	<input type='submit' name="register">Register</input>
	<label for='form-switch'>Already Member ? Sign In Now..</label>
</form>