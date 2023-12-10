<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $role = $_POST['role'];

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    } else {
        echo 'Strong password.';
    }

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dolphin_crm';

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connection successful";

    // Prepare and execute the SQL query to insert the user into the User table using PDO
    $stmt = $conn->prepare("INSERT INTO User (firstname, lastname, password, email, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$firstname, $lastname, $password, $email, $role]);

    echo " User successfully saved";

?>
