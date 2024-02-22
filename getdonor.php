<?php
// Include the database connection file
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $bloodType = $_POST['bloodType'];

    // Sanitize input to prevent SQL injection (you may need more advanced validation)
    $bloodType = $conn->real_escape_string($bloodType);

    // Query to retrieve donors based on the selected blood type
    $sql = "SELECT * FROM donors WHERE bloodGroup = '$bloodType'";
    $result = $conn->query($sql);

    $donors = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $donors[] = $row;
        }
    }

    // Close the database connection
    $conn->close();

    // Display donors or perform any further actions
    echo '<ul>';
    foreach ($donors as $donor) {
        echo '<li>' . $donor['name'] . ' (' . $donor['bloodGroup'] . ')</li>';
    }
    echo '</ul>';
}
?>
