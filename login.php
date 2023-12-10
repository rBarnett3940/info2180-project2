<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<header>
    <img src = "#" alt="">
    <p>Dolphin CRM</p>
</header>
<body>
    <h1>Login</h1> 
    <br>
    <form action="login-php.php" method="post" class = "login">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Login</button>
    </form>
    <p> Copyright @ 2022 Dolphin CRM</p>
</body>
</html>