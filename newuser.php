<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $pass = $_POST['password'];
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $role = $_POST['Role'];

    // Assuming you have a database connection established
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'dolphin_crm';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // Perform data validation and sanitation here if needed

    $id = $_SESSION['user_id'];
    // Insert data into the users table
    $sql = "INSERT INTO Users (firstname, lastname, password, email, role, created_at) 
            VALUES ('$firstName', '$lastName', '$hashed_password', '$email', '$role', NOW())";

    /*if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/

    /*if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
        $response = ["success" => true, "message" => "Record inserted successfully"];
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $response = ["success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error];
    }


    $conn->close();*/

    
    $response = ($conn->query($sql) === TRUE) ? "Record inserted successfully" : "Error!!!";

    // Close the database connection
    $conn->close();

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);

    // Stop further execution
    exit();

}
?>


<?php if (isset($_SESSION['user_id'])): ?>


<div class="form">

    <form id="userForm" action="newuser.php" method="post">

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
        <br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <label for="Role">Role:</label>
        <select id="Role" name="Role">
            <option value="Memnber">Member</option>
            <option value="Admin">Admin</option>

        </select>
        <br>

        <input type="button" value="Submit" onclick="submitForm2()">
    </form>
</div>


<?php endif; ?>