<?php
$conn = new mysqli("localhost", "root", "", "vehicle_rental_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($query)) {
        echo "Registration successful!";
        header("Location: index.html");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
