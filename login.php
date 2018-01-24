<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','prog');

function login(){
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die ("Failed to Connect to database".mysqli_error());

$db = mysqli_select_db($con,DB_NAME) or die("Failed to select Database".mysqli_error($con));

$email = $_POST['email'];
$pass = md5($_POST['pass']);


$sql = "select * from registration where Email='$email' and Pass='$pass'";

$query = mysqli_query($con,$sql);

if($row = mysqli_fetch_array($query)){
	//echo "Login Successfull";
	session_start();
	$_SESSION['em']= $email;
     header("location:welcome.php");
	}
else
	echo "Invalid Credentials";
}
if(isset($_POST['sub'])){
	login();
}
?>