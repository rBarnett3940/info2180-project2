<?php
// Assuming $conn is your database connection

$firstname = "John";
$lastname = "Snow";
$password = "password123"; // Replace with the actual password
$email = "admin@project2.com";
$role = "Admin";
$created_at = date('Y-m-d H:i:s'); // Current date and time

// Hash the password using password_hash
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Prepare and execute the SQL query to insert the user into the users table
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, password, email, role, created_at) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $firstname, $lastname, $hashed_password, $email, $role, $created_at);
$stmt->execute();
$stmt->close();

// Close the database connection
$conn->close();
?>
