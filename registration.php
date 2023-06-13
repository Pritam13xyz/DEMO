<?php 
include("connection.php");

//if($_GET[''del']){
//	
//}


if(isset($_POST["name"])){
	$name = $_POST["name"];
	$email = $_POST["e-mail"];
	$pass = $_POST["password"];
	$contact = $_POST["contact"];
	$city = $_POST["city"];
	$address = $_POST["address"];
	$sql = "insert into registration(name,email,pass,contact,city,address) values
	('$name', '$email', '$pass', $contact, '$city', '$address')";
	if (mysqli_query($conn, $sql)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	
	// to set the header path where the page should redirect
	// header("location:signup.php");
}



?>