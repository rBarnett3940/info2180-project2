
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
        <link rel="stylesheet" href="create-contact.css?v=<?php echo time(); ?>" type="text/css" />
        <style>
            .form {
                display: flex;
                justify-content: space-between;
            }


            .column {
                flex: 1;
                margin-right: 20px; /* Adjust the margin as needed */
            }
        </style>

    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>

            <section id="main-container">
                <div class="heading">
                    <h1>New Contact</h1>
                </div>
                <br>
                <div class="content">
                    <form id="contactForm" action="save-contact.php" method="post">

                        <div class="user-details">
                            <div class="input-box">
                                <span class="details"> Title </span>
                                <!-- <label for="title">Title:</label> -->
                                <select id="title" name="title">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                </select>
                            </div>

                            <div class="input-box">
                                <span class="details"></span>
                            </div>

                            <div class="input-box">
                                <span class="details"> First Name:</span>
                                <input type="text" id="firstName" name="firstName" required>
                            </div>

                            <div class="input-box">
                                <span class="details">Last Name: </span>
                                <input type="text" id="lastName" name="lastName" required>
                            </div>

                            <div class="input-box">
                                <span class="details">Email: </span>
                                <input type="email" id="email" name="email" required>

                            </div>

                            <div class="input-box">
                                <span class="details">Telephone:</span>
                                <input type="tel" id="telephone" name="telephone" required>

                            </div>

                            <div class="input-box">
                                <span class="details">Company:</span>
                                <input type="text" id="company" name="company" required>

                            </div>

                            <div class="input-box">
                                <span class="details">Type:</span>
                                <select id="Type" name="Type" required>
                                    <option value="Sales Lead">Sales Lead</option>
                                    <option value="Support">Support</option>
                                </select>
                            </div>

                            <div class="input-box">
                                <span class="details"> Assigned To: </span>
                                <select id="assignedTo" name="assignedTo" required>
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

                                    //sanitized using htmlspecialchars
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $id = htmlspecialchars($row['id'], ENT_QUOTES);
                                            $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
                                            $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);

                                            echo "<option value='$id'>$firstname $lastname</option>";
                                        }
                                    }

                                    $conn->close();
                                    ?>
                                </select>
                            </div>

                            <div class="input-box">
                                <span class="details"></span>
                            </div>



                            <div class="button">
                                <input type="button" value="Submit" onclick="submitForm()">
                            </div>



                        </div>
                    </form>
                </div>
<!--                <div class="form">-->
<!--                    <form id="contactForm" action="save-contact.php" method="post">-->
<!--                        <div class="column">-->
<!--                            <label for="title">Title:</label>-->
<!--                            <select id="title" name="title">-->
<!--                                <option value="Mr">Mr</option>-->
<!--                                <option value="Mrs">Mrs</option>-->
<!--                                <option value="Miss">Miss</option>-->
<!--                            </select>-->
<!--                            <br>-->
<!---->
<!--                            <label for="firstName">First Name:</label>-->
<!--                            <input type="text" id="firstName" name="firstName" required>-->
<!--                            <br>-->
<!---->
<!--                            <label for="lastName">Last Name:</label>-->
<!--                            <input type="text" id="lastName" name="lastName" required>-->
<!--                            <br>-->
<!---->
<!--                            <label for="email">Email:</label>-->
<!--                            <input type="email" id="email" name="email" required>-->
<!--                            <br>-->
<!--                        </div>-->
<!---->
<!--                        <div class="column">-->
<!--                            <label for="telephone">Telephone:</label>-->
<!--                            <input type="tel" id="telephone" name="telephone" required>-->
<!--                            <br>-->
<!---->
<!--                            <label for="company">Company:</label>-->
<!--                            <input type="text" id="company" name="company" required>-->
<!--                            <br>-->
<!---->
<!--                            <label for="Type">Type:</label>-->
<!--                            <select id="Type" name="Type" required>-->
<!--                                <option value="Sales Lead">Sales Lead</option>-->
<!--                                <option value="Support">Support</option>-->
<!--                            </select>-->
<!--                            <br>-->
<!---->
<!--                            <label for="assignedTo">Assigned To:</label>-->
<!--                            <select id="assignedTo" name="assignedTo" required>-->
<!--                                --><?php
//                                // Assuming you have a database connection established
//
//                                $host = 'localhost';
//                                $username = 'root';
//                                $password = '';
//                                $database = 'dolphin_crm';
//
//                                $conn = new mysqli($host, $username, $password, $database);
//
//                                if ($conn->connect_error) {
//                                    die("Connection failed: " . $conn->connect_error);
//                                }
//
//                                $result = $conn->query("SELECT id, firstname, lastname FROM users");
//
//                                //sanitized using htmlspecialchars
//                                if ($result->num_rows > 0) {
//                                    while ($row = $result->fetch_assoc()) {
//                                        $id = htmlspecialchars($row['id'], ENT_QUOTES);
//                                        $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
//                                        $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
//
//                                        echo "<option value='$id'>$firstname $lastname</option>";
//                                    }
//                                }
//
//                                $conn->close();
//                                ?>
<!--                            </select>-->
<!--                            <br>-->
<!---->
<!--                            <input type="button" value="Submit" onclick="submitForm()">-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->


            </section>
            <?php include 'sidebar.php'; ?>
        </div>
    </body>



    
    <script>
        function submitForm() {
            var form = document.getElementById('contactForm');
            var formData = new FormData(form);

            // Check if any required fields are empty
            var requiredFields = form.querySelectorAll('[required]');
            for (var i = 0; i < requiredFields.length; i++) {
                if (!requiredFields[i].value.trim()) {
                    alert('Please fill in all required fields');
                    return; // Prevent form submission
                }
            }


            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    alert(data);
                    form.reset();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>


</html>