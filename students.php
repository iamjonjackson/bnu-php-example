<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

echo "<!DOCTYPE html>\n";
echo "<html lang='en'>\n";
echo "<head>\n";
echo "    <meta charset='UTF-8'>\n";
echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
echo "    <title>Student Records</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "    <h2>Student Records</h2>\n";
echo "    <table border='1'>\n";
echo "        <tr>\n";
echo "            <th>Select</th>\n";
echo "            <th>Student ID</th>\n";
echo "            <th>Password</th>\n"; // Consider security implications
echo "            <th>Date of Birth</th>\n";
echo "            <th>First Name</th>\n";
echo "            <th>Last Name</th>\n";
echo "            <th>House</th>\n";
echo "            <th>Town</th>\n";
echo "            <th>County</th>\n";
echo "            <th>Country</th>\n";
echo "            <th>Postcode</th>\n";
echo "            <th>Image</th>\n"; // Image column header
echo "        </tr>\n";

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "        <tr>\n";
        echo "            <td><input type='checkbox' name='selected_students[]' value='" . htmlspecialchars($row["studentid"]) . "'></td>\n";
        echo "            <td>" . htmlspecialchars($row["studentid"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["password"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["dob"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["firstname"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["lastname"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["house"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["town"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["county"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["country"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["postcode"]) . "</td>\n";
        // Handle image display with a check for null or empty paths
        if (!empty($row["image_path"])) {
            echo "            <td><img src='" . htmlspecialchars($row["image_path"]) . "' alt='Student Image' style='width: 100px; height: auto;'></td>\n";
        } else {
            // Display no image or placeholder text
            echo "            <td>No image available</td>\n";
        }
        echo "        </tr>\n";
    }
} else {
    echo "        <tr><td colspan='12'>No records found</td></tr>\n";
}

echo "    </table>\n";
echo "</body>\n";
echo "</html>\n";

?>
