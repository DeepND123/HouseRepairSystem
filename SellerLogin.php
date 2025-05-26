<?php 
	

	if(isset($_POST["sellerSignup"])){

	//Accepting data from yhe form
	$emailAddress = $_POST["txtEmailAddress"];
	$password = $_POST["txtPassword"];
	$fullName = $_POST["fullName"];
	$address = $_POST["txtAddress"];
	$city = $_POST["txtCity"];
	$province = $_POST["txtProvince"];
	$zipcode = $_POST["txtZipCode"];


	//access to the data base server
	$con = mysqli_connect("localhost" , "Repair_Helper_DB_Server" , "Madush@RepairHelper");

    //select db
	mysqli_select_db($con , "repair_helper");

	//perform sql operartion
	$sql = "INSERT INTO sellerdetails (Email_Address,Password, Full_Name, Address, City, State, Zip_Code) 
	        VALUES ('$emailAddress' , '$password' , '$fullName' ,'$address' , '$city' , '$province' , '$zipcode')";

	
	$result = mysqli_query($con, $sql);

	header("Location:Seller.html");

	echo "<script type='text/javascript'>alert('Registed successfully!');</script>";

}

?>
