<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Handle file upload
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // Validate file type (for example, only jpg and png)
    $allowedTypes = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
    if (array_key_exists($_FILES['image']['type'], $allowedTypes)) {
        // Create a unique file name and save the file
        $fileExtension = $allowedTypes[$_FILES['image']['type']];
        $fileName = uniqid('img_', true) . '.' . $fileExtension;
        $imagePath = 'uploads/' . $fileName; // Ensure the 'uploads' directory exists and is writable
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        echo "Invalid file type.";
        exit;
    }
}

// Existing validation and sanitization code...

// Modified SQL statement to include the image_path
$sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode, image_path) VALUES ('$studentid', '$password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode', '$imagePath')";

// Execute SQL
if ($conn->query($sql) === TRUE) {
    echo "New student added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
