<?php 
    

    if(isset($_POST["signup"])){

    //Accepting data from yhe form
    $emailAddress = $_POST["txtEmailAddress"];
    $password = $_POST["txtPassword"];
    $name = $_POST["txtName"];
    $address = $_POST["txtAddress"];
    $city = $_POST["txtCity"];
    $province = $_POST["txtProvince"];
    $zipcode = $_POST["txtZipCode"];
    $specialization = $_POST["txtSpecialization"];
    $phone_no = $_POST["txtPhone_number"];


    //access to the data base server
    $con = mysqli_connect("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

    //select db
    mysqli_select_db($con , "repair_helper");

    //perform sql operartion
    $sql = "INSERT INTO technician (email , password , full_name , permanent_address , city , state , zip_code , specialization , phone_number) 
            VALUES ('$emailAddress' , '$password' , '$name' ,'$address' , '$city' , '$province' , '$zipcode' , ' $specialization' , '$phone_no')";

    
    $result = mysqli_query($con, $sql);

    header("Location:ProCenter.html");

    echo "<script type='text/javascript'>alert('Registed successfully!');</script>";

}

?>
