<?php
$error='';
session_start();
if(isset($_POST['submit'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		$error="Please enter username and password";
		}
		else{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$password=md5($password);
			//Establishing connection with server
			$conn = mysqli_connect("localhost", "root", "");
			//selecting database
			$db = mysqli_select_db($conn, "users");
			//sql query to fetch user info and find match
			$query = mysqli_query($conn, "SELECT * FROM login WHERE username='$username' AND password='$password'");
			
			$rows = mysqli_num_rows($query);
			if($rows==1){
				$_SESSION['username'] = $username;
				header("Location: success.php");
			}
			else{
				$error="Invalid username or password";
			}
			mysqli_close($conn);
			
		}
			
}
?>