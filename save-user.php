<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName']; // Corrected variable name
    $lastName = $_POST['lastName'];   // Corrected variable name
    $password = $_POST['password'];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // Corrected syntax
    $role = $_POST['Role'];  // Corrected variable name

    // Assuming you have a database connection established
    $host = 'localhost';
    $username = 'root';
    $dbPassword = '';
    $database = 'dolphin_crm';

    $conn = new mysqli($host, $username, $dbPassword, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform data validation and sanitation here if needed

    // Insert data into the users table
    $sql = "INSERT INTO Users (firstname, lastname, email, role) 
            VALUES ('$firstName', '$lastName', '$email', '$role')"; // Corrected variable names

    if ($conn->query($sql) === TRUE) {
        $response = ["success" => true, "message" => "User added successfully"];
    } else {
        $response = ["success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error];
    }

    echo json_encode($response); // Send JSON response to the client

    $conn->close();
}
?>
