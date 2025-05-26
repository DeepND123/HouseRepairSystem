<?php 
	

	if(isset($_POST["signup"])){

	//Accepting data from yhe form
	$emailAddress = $_POST["txtEmailAddress"];
	$password = $_POST["txtPassword"];
	$addressLine1 = $_POST["txtAddress1"];
	$name = $_POST["txtAddress2"];
	$mobile_number = $_POST["mobile_number"];
	$city = $_POST["txtCity"];
	$province = $_POST["txtProvince"];
	$zipcode = $_POST["txtZipCode"];


	//access to the data base server
	$con = mysqli_connect("localhost" , "Repair_Helper_DB_Server" , "Madush@RepairHelper");

    //select db
	mysqli_select_db($con , "repair_helper");

	//perform sql operartion
	$sql = "UPDATE userdetails SET Password = '$password', Address_Line1 = '$addressLine1', Name = '$name',Mobile_number = '$mobile_number', City = '$city', State = '$province', Zip_Code = '$zipcode' WHERE Email_Address = '$emailAddress'";


	
	$result = mysqli_query($con, $sql);

	echo "<script type='text/javascript'>alert('Account updated successfully!');</script>";

	header("Location:ManageMyAccount.php");

	

}

?>
