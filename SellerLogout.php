<?php
	session_start();

	session_destroy();
	header("Location:Seller.html");
	exit();

	echo "<script type='text/javascript'>alert('Sign out Succefully');</script>";

?>
