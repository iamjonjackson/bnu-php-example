<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

echo template("templates/partials/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
</head>
<body>

<?php echo template("templates/partials/nav.php"); ?>

<h2>Add New Student</h2>
<form action="process_addstudent.php" method="post" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
    <label for="studentid">Student ID:</label><br>
    <input type="text" id="studentid" name="studentid" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <label for="dob">Date of Birth:</label><br>
    <input type="date" id="dob" name="dob" required><br>
    <label for="firstname">First Name:</label><br>
    <input type="text" id="firstname" name="firstname" required><br>
    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" required><br>
    <label for="house">House:</label><br>
    <input type="text" id="house" name="house"><br>
    <label for="town">Town:</label><br>
    <input type="text" id="town" name="town"><br>
    <label for="county">County:</label><br>
    <input type="text" id="county" name="county"><br>
    <label for="country">Country:</label><br>
    <input type="text" id="country" name="country"><br>
    <label for="postcode">Postcode:</label><br>
    <input type="text" id="postcode" name="postcode"><br><br>

    <!-- Adds Student Image *New Feature* -->
    <label for="image">Student Image:</label><br>
    <input type="file" id="image" name="image"><br><br>

    <input type="submit" value="Add Student">
</form>

</body>
</html>

