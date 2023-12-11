<?php

session_start();

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

    $id = $_SESSION['user_id'];
    // Insert data into the users table
    $sql = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by) 
            VALUES ('$title', '$firstName', '$lastName', '$email', '$telephone', '$company', '$Type', '$assignedTo', '$id')";

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


    $response = [
        "message" => $conn->query($sql) === TRUE ? "Record inserted successfully" : "Error: " . $sql . "<br>" . $conn->error
    ];

    // Close the database connection
    $conn->close();

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);

    // Stop further execution
    exit();

}
?>


<?php if(session_status() == 'PHP_SESSION_ACTIVE'){?>


<div class="form">

    <form id="contactForm" action="save-contact.php" method="post">
        <label for="title">Title:</label>
        <select id="title" name="title">
            <option value="Mr">Mr</option>
            <option value="Mrs">Mrs</option>
            <option value="Miss">Miss</option>
        </select>
        <br>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
        <br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="telephone">Telephone:</label>
        <input type="tel" id="telephone" name="telephone">
        <br>

        <label for="company">Company:</label>
        <input type="text" id="company" name="company">
        <br>

        <label for="Type">Type:</label>
        <select id="Type" name="Type">
            <option value="Sales Lead">Sales Lead</option>
            <option value="Support">Support</option>

        </select>
        <br>

        <label for="assignedTo">Assigned To:</label>
        <select id="assignedTo" name="assignedTo">
            <?php
            // Assuming you have a database connection established

            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'dolphin_crm';

            $conn = new mysqli($host, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT id, firstname, lastname FROM users");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['firstname'] . " " . $row['lastname'] . "</option>";
                }
            }

            $conn->close();
            ?>
        </select>
        <br>

        <input type="button" value="Submit" onclick="submitForm()">
    </form>
</div>


<?php } ?>