<?php  

	$host = '';
	$user = '';
	$pass = '';
	$base = '';


	$conn = @mysqli_connect($host, $user, $pass, $base);

	$error;
	
	if(mysqli_connect_errno()){
		$error = "<script>console.log('Error: ".addslashes(utf8_encode(mysqli_connect_error()))."Os dados locais serão apresentados.');</script>";
	}
?>