<?php 
	

	if(isset($_POST["signup"])){

	//Accepting data from yhe form
	$emailAddress = $_POST["txtEmailAddress"];
	$password = $_POST["txtPassword"];
	$addressLine1 = $_POST["txtAddress1"];
	$addressLine2 = $_POST["txtAddress2"];
	$city = $_POST["txtCity"];
	$province = $_POST["txtProvince"];
	$zipcode = $_POST["txtZipCode"];


	//access to the data base server
	$con = mysqli_connect("localhost" , "Repair_Helper_DB_Server" , "Madush@RepairHelper");

    //select db
	mysqli_select_db($con , "repair_helper");

	//perform sql operartion
	$sql = "INSERT INTO userdetails (Email_Address,Password, Address_Line1, Address_Line2, City, State, Zip_Code) 
	        VALUES ('$emailAddress' , '$password' , '$addressLine1' ,'$addressLine2' , '$city' , '$province' , '$zipcode')";

	
	$result = mysqli_query($con, $sql);

	header("Location:index.php");

	echo "<script type='text/javascript'>alert('Registed successfully!');</script>";

}

?>
