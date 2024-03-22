<!DOCTYPE html>
<html>
<body>
	<a href="http://localhost/RestaurantWebsite/Restaurant.html">Home</a>


<?php
	// Establish connection
	require_once("C:\\xampp\\htdocs\\RestaurantWebsite\\connectdb.php");

	// Set php variables to html variables holding user input
	$emailAddress = $_POST["emailAddress"];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$cellNo = $_POST["cellNo"];
	$streetAddress = $_POST["streetAddress"];
	$city = $_POST["city"];
	$postalCode = $_POST["postalCode"];

	// Check if customer exists
	// emailAddress is the table attribute, :email is the variable that will hold $emailAddress
	$sql = "SELECT * 
			FROM customerAccount 
			WHERE emailAddress = :email";
	// Let $stmt equal the tuple produced by the query
	$stmt = $dbh->prepare($sql);
	// Bind (input) the variable $emailAddress to the email attribute in the customerAccount table
	// (where emailAddress(user input) = :email (existing emails in database)
	$stmt->bindParam(':email', $emailAddress);
	$stmt->execute();
	// If any row was affected by this then an account already exists
	if ($stmt->rowCount() > 0) {
		echo "You already have an account with us";
	}

	// Add new customer to database
	else {
    $credit = 5.00;
    $sql = "INSERT INTO customerAccount (emailAddress, firstName, lastName, cellNum, streetAddress, city, pc, creditAmt) VALUES (:email, :first, :last, :cell, :address, :city, :pc, :credit)";
    // assign a new prepared statement to $stmt
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email', $emailAddress);
    $stmt->bindParam(':first', $firstName);
    $stmt->bindParam(':last', $lastName);
    $stmt->bindParam(':cell', $cellNo);
    $stmt->bindParam(':address', $streetAddress); // corrected binding parameter name
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':pc', $postalCode);
    $stmt->bindParam(':credit', $credit);

		if ($stmt->execute()) {
				
			
		}
		else {
			echo "Error: " . $sql . "<br>" . $dbh->errorInfo()[2];
		}
	}

	$dbh = null;
	
?>

</body>
<html>

			echo "Welcome, your account has been added successfully!";
