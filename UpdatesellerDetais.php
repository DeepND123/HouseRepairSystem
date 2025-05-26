<?php 
	

	if(isset($_POST["signup"])){

	//Accepting data from yhe form
	$emailAddress = $_POST["txtEmailAddress"];
	$password = $_POST["txtPassword"];
	$fullName = $_POST["FullName"];
	$Address = $_POST["txtAddress"];
	$city = $_POST["txtCity"];
	$province = $_POST["txtProvince"];
	$zipcode = $_POST["txtZipCode"];
	$businessname =$_POST["businessname"];



	//access to the data base server
	$con = mysqli_connect("localhost" , "Repair_Helper_DB_Server" , "Madush@RepairHelper");

    //select db
	mysqli_select_db($con , "repair_helper");

	//perform sql operartion
	$sql = "UPDATE sellerdetails SET Password = '$password', Address = '$Address', Full_Name = '$fullName', Seller_Name = '$businessname', City = '$city', State = '$province', Zip_Code = '$zipcode' WHERE Email_Address = '$emailAddress'";


	
	$result = mysqli_query($con, $sql);

	echo "<script type='text/javascript'>alert('Account updated successfully!');</script>";

	header("Location:manageSellerAccount.php");

	

}

?>
