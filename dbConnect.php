<?php
	class dbConnect {  
		function __construct() {  
			require_once('config.php');  
			$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE);  
			$this->conn=$conn;
			if(!$conn)
			{  
				die ("Cannot connect to the database");  
			}   
			return $conn;  
		}  
		public function UserRegister($first_name, $last_name, $email,$password,$date){  
			$password = md5($password);  
			$sql="INSERT INTO users(email,first_name, last_name,password,dob) values('".$email."','".$first_name."','".$last_name."','".$password."','".$date."')";
			if (mysqli_query($this->conn, $sql)) {
				return TRUE;
			} else {
				return FALSE;
			}
			   
		}  
		public function Login($emailid, $password){  
			$pass=md5($password);
			$sql=sprintf("SELECT * FROM users WHERE email = '%s' AND password = '%s'",$emailid,$pass);
			$res=mysqli_query($this->conn, $sql);
			$user_data = mysqli_fetch_array($res,MYSQLI_ASSOC);   
			if(!empty($user_data))   
			{  
				$_SESSION['login'] = true;  
				$_SESSION['uid'] = $user_data['id'];  
				$_SESSION['username'] = $user_data['first_name'];  
				return TRUE;  
			}  
			else  
			{  
				return FALSE;  
			}  	  
		}  
		 
	}  
?>