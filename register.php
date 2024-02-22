<?php
// Include the database connection file
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $bloodGroup = $_POST['bloodGroup'];

    // Insert data into the database
    $sql = "INSERT INTO donors (name, phone, bloodGroup) VALUES ('$name', '$phone', '$bloodGroup')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
