<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>" type="text/css" />
    <title>Log In</title>
</head>

<body>
<div class="container">
    <?php include 'header.php'; ?>
    <section>
        <div class="form-container">
            <div class="lgp">
                <h1>Login</h1> 
            </div>
            <br>
            <form action="login-php.php" method="post" class = "login">
                <input type="email" id="email" name="email" placeholder="Email Address" required>
                <br><br>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <br><br>

                <button type="submit">Login</button>
            </form>
            <br>
            <p> Copyright @ 2022 Dolphin CRM</p>
        </div>
    </section>
</div>
</body>
</html>