<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? strtoupper($_POST["name"]) : "";
    $phone = isset($_POST["phone"]) ? ($_POST["phone"]) : "";
    $gender = isset($_POST["gender"]) ? strtoupper($_POST["gender"]) : "";
    $bloodGroup = isset($_POST["bloodGroup"]) ? strtoupper($_POST["bloodGroup"]) : "";
    $weight = isset($_POST["weight"]) ? ($_POST["weight"]) : "";
    $address = isset($_POST["address"]) ? strtoupper($_POST["address"]) : "";
    $noDiseases = isset($_POST["noDiseases"]) ? "Yes" : "No";

    $sql = "INSERT INTO php_donor (name, phone, gender, bloodGroup, weight, address) 
            VALUES ('$name', '$phone', '$gender', '$bloodGroup', '$weight', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
