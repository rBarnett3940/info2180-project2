<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>New User</title>
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

                <form id="userForm" action="save-user.php" method="post">

                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Jane" autocomplete="given-name">
                        <br>

                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Doe"  autocomplete="family-name">
                        <br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="something@email.com"  autocomplete="email">
                        <br>

                        <label for="password">Password</label><br>
                        <input id="password" type="password" name="password" />
                        <br>
                        
                        <label for="Role">Role:</label>
                        <select id="Role" name="Role" autocomplete="role">
                            <option value="Admin">Admin</option>
                            <option value="Member">Member</option>
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
    const fname = document.getElementById('firstName'); // Corrected ID
    const lname = document.getElementById('lastName');  // Corrected ID
    const email = document.getElementById('email');
    const password = document.getElementById('password'); // Corrected ID
    const role = document.getElementById('Role');        // Corrected ID

    const form = document.getElementById('userForm');

    form.addEventListener('submit', e => {
        e.preventDefault();
        validateAndSubmit();
    });

    const validateAndSubmit = () => {
        validateInputs();

        if (form.checkValidity()) {
            submitForm();
        }
    };

    const submitForm = () => {
        var formData = new FormData(form);

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
    };

    const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');

        errorDisplay.innerText = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    };

    const setSuccess = element => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');

        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
    };

    const isValidEmail = email => {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    };

    const isValidPassword = password => {
        const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        return passwordRegex.test(password);
    };

    const validateInputs = () => {
        let fnameValue = fname.value.trim();
        let lnameValue = lname.value.trim();
        let emailValue = email.value.trim();
        let passwordValue = password.value.trim();

        if (fnameValue === '') {
            setError(fname, 'Required');
        } else {
            setSuccess(fname);
        }

        if (lnameValue === '') {
            setError(lname, 'Required');
        } else {
            setSuccess(lname);
        }

        if (emailValue === '') {
            setError(email, 'Email is required');
        } else if (!isValidEmail(emailValue)) {
            setError(email, 'Provide a valid email address');
        } else {
            setSuccess(email);
        }

        if (passwordValue === '') {
            setError(password, 'Password is required');
        } else if (!isValidPassword(passwordValue)) {
            setError(password, 'Please provide a valid password. Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
        } else {
            setSuccess(password);
        }
    };
    </script>

</html>