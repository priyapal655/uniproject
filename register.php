

<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','prog');

function NewUser(){
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die ("Failed to Connect to database".mysqli_error());

	$db = mysqli_select_db($con,DB_NAME) or die("Failed to select Database".mysqli_error($con));

	$name = $_POST['sname'];
	$email = $_POST['email'];
	$phn = $_POST['phone'];
	$pass = md5($_POST['pass']);

	$sql = "insert into registration values('$name','$email','$phn','$pass')";

	$query = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));

	if($query){
		print "<script>alert('User Registered');</script>";
		//header("location:login.html");
		print "<script>window.location.href='login.html'</script>";
	}
}

function CheckUser(){
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die ("Failed to Connect to database".mysqli_error());

	$db = mysqli_select_db($con,DB_NAME) or die("Failed to select Database".mysqli_error($con));
	$x = $_POST['email'];
	
	$sql = "select * from registration where Email='$x'";
	$q = mysqli_query($con,$sql);
	
	if($r = mysqli_fetch_array($q))
		echo "Already registered User ";
    else
		NewUser();
	
	
	
}
if(isset($_POST['sub'])){
	CheckUser();
}
?>