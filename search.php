<?php
$conn = new mysqli("localhost", "root", "", "vehicle_rental_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicleType = $_POST['vehicleType'];
    $location = $_POST['location'];
    $duration = $_POST['duration'];

    $query = "SELECT * FROM vehicles WHERE type='$vehicleType' AND location='$location'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h1>Available Vehicles:</h1>";
        while ($row = $result->fetch_assoc()) {
            echo "Vehicle: " . $row["name"] . " - Price per Day: $" . $row["price"] . "<br>";
        }
    } else {
        echo "No vehicles found!";
    }
}

$conn->close();
?>
