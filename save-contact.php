
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $company = $_POST['company'];
    $Type = $_POST['Type'];
    $assignedTo = $_POST['assignedTo'];

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

    // Insert data into the users table
    $sql = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to) 
            VALUES ('$title', '$firstName', '$lastName', '$email', '$telephone', '$company', '$Type', '$assignedTo')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

//    if ($conn->query($sql) === TRUE) {
//        $response = ["success" => true, "message" => "Record inserted successfully"];
//    } else {
//        $response = ["success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error];
//    }


    $conn->close();

}
?>
