
<?php 
	

	if(isset($_POST["sellersignin"])){
	
	$emailAadd = $_POST["txtEmail"];
	$password = $_POST["txtPassword"];

	//access to the data base server
	$con = mysqli_connect("localhost" , "Repair_Helper_DB_Server" , "Madush@RepairHelper");

    //select db
	mysqli_select_db($con , "repair_helper");


	$sql = "SELECT * from sellerdetails WHERE Email_Address = '$emailAadd' And Password = '$password' And status = 'Approve'";

	$result = mysqli_query($con, $sql);

		if($row = mysqli_fetch_array($result)){
			session_start();
			$_SESSION["Email_Address"] = $emailAadd;
			$_SESSION["Password"] = $password;
			header("Location:SellerIndex.php");
		}
		else{
			echo "<script type='text/javascript'>alert('Invalid Email or Password');</script>";
			header("Location:Seller.html");
		
		}

}

else{
	session_start();

	session_destroy();
	header("Location:Seller.html");
}

?>