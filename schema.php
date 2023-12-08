<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// User details
$firstname = "John";
$lastname = "Snow";
$password = "password123"; 
$email = "admin@project2.com";
$role = "Admin";
$created_at = date('Y-m-d H:i:s');  

// Hash the password using password_hash
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

//  SQL query to insert the user into the users table
try {
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, password, email, role, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstname, $lastname, $hashed_password, $email, $role, $created_at]);

    echo "User inserted successfully!";
} catch (PDOException $e) {
    echo "Error inserting user: " . $e->getMessage();
}

?>
