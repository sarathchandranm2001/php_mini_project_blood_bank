]<?php
$servername = "localhost";
$username = "root";
$password = "Sarath@9747";
$database = "sarath_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to retrieve donors from the database
function getDonors() {
    global $conn;

    $sql = "SELECT * FROM donors";
    $result = $conn->query($sql);

    $donors = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $donors[] = $row;
        }
    }

    return $donors;
}

// Close the database connection

?>
