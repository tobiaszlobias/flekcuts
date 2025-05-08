<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // 1. Connect to database
  $conn = new mysqli('localhost', 'root', '', 'flekcuts');

  // Check connection
  if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
  }

  // 2. Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = !empty($_POST['phone']) ? $_POST['phone'] : NULL;
  $date = $_POST['date'];
  $time = $_POST['time'];

  // 3. Prepare and bind
  $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, date, time) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $name, $email, $phone, $date, $time);

  // 4. Execute
  if ($stmt->execute()) {
    echo "Booking successful!";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();

} else {
  http_response_code(405);
  echo "Method Not Allowed";
}
?>
