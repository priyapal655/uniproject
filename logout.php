<?php
		if(isset($_POST['sub'])){
		session_start();
		
		session_destroy();
		
		header("location:login.html");
		}
		else{
			print "<script>alert('Mai Bewakoof Nahi')</script>";
		}
?>