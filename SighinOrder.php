
<?php 

	

	if(isset($_POST["signin"])){
	
	$emailAadd = $_POST["txtEmail"];
	$password = $_POST["txtpass"];

	//access to the data base server
	$con = mysqli_connect("localhost" , "Repair_Helper_DB_Server" , "Madush@RepairHelper");

    //select db
	mysqli_select_db($con , "repair_helper");


	$sql = "SELECT * from userdetails WHERE Email_Address = '$emailAadd' And Password = '$password'";

	$result = mysqli_query($con, $sql);

		if($row = mysqli_fetch_array($result)){
			session_start();
			$_SESSION["Email_Address"] = $emailAadd;
			$_SESSION["Password"] = $password;
			header("Location:Orderplace.php");

			// Assume you validate user credentials here
			$isLoggedIn = true; // Replace with your authentication logic

			if ($isLoggedIn) {
   			 $_SESSION['user_logged_in'] = true; // Set session variable
    		header("Location: Orderplace.php");
   		    exit();
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Invalid Email or Password');</script>";
			header("Location: Orderplace.php");
		}

}

?>

