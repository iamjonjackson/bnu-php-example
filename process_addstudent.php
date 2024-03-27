<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch and sanitize input data
    $studentid = $conn->real_escape_string($_POST['studentid']);
    $password = $conn->real_escape_string($_POST['password']);
    // Assume password will be hashed before storage
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $dob = $conn->real_escape_string($_POST['dob']);
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $house = $conn->real_escape_string($_POST['house']);
    $town = $conn->real_escape_string($_POST['town']);
    $county = $conn->real_escape_string($_POST['county']);
    $country = $conn->real_escape_string($_POST['country']);
    $postcode = $conn->real_escape_string($_POST['postcode']);

    // Prepare SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $studentid, $hashedPassword, $dob, $firstname, $lastname, $house, $town, $county, $country, $postcode);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Invalid request method.";
}

?>
