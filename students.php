<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Start HTML document
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
echo "        </tr>\n";

// Fetch student records
$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "        <tr>\n";
        echo "            <td>" . htmlspecialchars($row["studentid"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["password"]) . "</td>\n"; // Consider not displaying passwords
        echo "            <td>" . htmlspecialchars($row["dob"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["firstname"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["lastname"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["house"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["town"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["county"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["country"]) . "</td>\n";
        echo "            <td>" . htmlspecialchars($row["postcode"]) . "</td>\n";
        echo "        </tr>\n";
    }
} else {
    echo "        <tr><td colspan='10'>No records found</td></tr>\n";
}

echo "    </table>\n";
echo "</body>\n";
echo "</html>\n";

?>

