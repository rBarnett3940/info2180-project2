<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>New Contact</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>" type="text/css" />
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>

            <section id="main-container">
                <div class="heading">
                    <h1>New Contact</h1>
                </div>
                <br>

                <div class="form">

                    <form id="contactForm" action="save-contact.php" method="post">
                        <label for="title">Title:</label>
                        <select id="title" name="title">
                            <option value="mr">Mr</option>
                            <option value="mrs">Mrs</option>
                            <option value="miss">Miss</option>
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
                            <option value="SalesLead">Sales Lead</option>
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

            </section>
            <?php include 'sidebar.php'; ?>
        </div>
    </body>
    <script>
        function submitForm() {
            var form = document.getElementById('contactForm');
            var formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    // Handle the response status
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Continue processing the response
                    return response.text(); // or response.blob(), response.json(), etc.
                })
                .then(data => {
                    // Handle the response data
                    alert(data);
                    form.reset();
                    // You can update the UI, show a success message, etc.
                })
                .catch(error => {
                    // Handle errors
                    console.error('Error:', error);
                });
        }
    </script>


</html>