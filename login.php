<?php include 'header.php';


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user inputs
    $enteredEmail = $_POST['email'];
    $enteredPassword = $_POST['password'];

    // You should perform proper validation and sanitization here

    // Replace with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dolphin_crm";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Replace with your actual database query logic
    $query = "SELECT email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $enteredEmail);
    $stmt->execute();
    $stmt->bind_result($dbEmail, $dbPassword);
    $stmt->fetch();
    $stmt->close();

    // Verify user credentials
    // Before verifying passwords

    if ($enteredEmail == $dbEmail && password_verify($enteredPassword, $dbPassword)) {
        // Authentication successful
        session_start();
        $_SESSION['user_email'] = $enteredEmail;
        header("Location: dashboard.php");
        exit();
    } else {
        // Authentication failed
        echo "Invalid login credentials";
    }

    if ($enteredEmail == $dbEmail && password_verify($enteredPassword, $dbPassword)) {
        // Authentication successful
        session_start();
        $_SESSION['user_email'] = $enteredEmail;
        echo 'success';
        exit();
    } else {
        // Authentication failed
        echo 'error';
    }



    // Close the database connection
    $conn->close();
}
?>

<div class="Login">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>" type="text/css" />


    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="email"></label>
        <input type="email" id="email" name="email" placeholder="Email Address" required><br>

        <label for="password"></label>
        <input type="password" id="password" name="password" placeholder="Password" required><br>

        <button type="submit">Login</button>
    </form>

    <footer>
        Copyright &copy; 2022 Dolphin CRM
    </footer>
</div>



<script>
    $(document).ready(function () {
        $('#loginBtn').on('click', function () {
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                type: 'POST',
                url: 'login.php',
                data: {
                    email: email,
                    password: password
                },
                success: function (response) {
                    if (response === 'success') {
                        // Redirect to the dashboard
                        window.location.href = 'dashboard.php';
                    } else {
                        // Display error message
                        alert('Invalid login credentials');
                    }
                }
            });
        });
    });
</script>
</div>
