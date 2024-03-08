<?php
require_once("db.php");

$selectedBloodGroup = isset($_POST['bloodType']) ? $_POST['bloodType'] : '';
$donors = [];

if (!empty($selectedBloodGroup)) {
    $sql = "SELECT * FROM php_donor WHERE bloodGroup = '$selectedBloodGroup'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $donors[] = $row;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_result.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Donor Details</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Donor Details for Blood Group <?php echo $selectedBloodGroup; ?></h1>
        <br>
        <br>
        <div class="row">
            <?php foreach ($donors as $donor) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $donor['name']; ?></h5>
                            <p class="card-text">Phone: <?php echo $donor['phone']; ?></p>
                            <p class="card-text">Gender: <?php echo $donor['gender']; ?></p>
                            <p class="card-text">Blood Group: <?php echo $donor['bloodGroup']; ?></p>
                            <p class="card-text">Weight: <?php echo $donor['weight']; ?></p>
                            <p class="card-text">Address: <?php echo $donor['address']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
