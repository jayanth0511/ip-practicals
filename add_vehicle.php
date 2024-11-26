<?php
$conn = new mysqli("localhost", "root", "", "vehicle_rental_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $location = $_POST['location'];

    $query = "INSERT INTO vehicles (name, type, price, location) VALUES ('$name', '$type', '$price', '$location')";
    if ($conn->query($query)) {
        echo "Vehicle added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
