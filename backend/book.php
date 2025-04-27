<?php
// 1. Connect to database
$conn = new mysqli('localhost', 'root', '', 'barber');

// Check connection
if ($conn->connect_error) {
  die('Connection Failed: ' . $conn->connect_error);
}

// 2. Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];

// 3. Insert data into bookings table
$sql = "INSERT INTO bookings (name, email, phone, date, time) 
        VALUES ('$name', '$email', '$phone', '$date', '$time')";

if ($conn->query($sql) === TRUE) {
  echo "Booking successful!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
