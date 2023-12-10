<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dolphin_crm';
    
    $GLOBALS['conn']= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $role = $_POST['role'];
    
        if(validatePassword($_POST['password'])){
            $hashPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            addUser($fname, $lname, $hashPass, $email, $role);
        }
      }
    function validatePassword($password){
        return preg_match("/[A-Z]/", $password) && preg_match("/[0-9]/",$password) && strlen($password) > 8;
    }

    

    function addUser($fname, $lname, $hashPass, $email, $role) {
        $created_at = date('Y-m-d H:i:s');
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO users (firstname, lastname, password, email, role, created_at) VALUES (:fname, :lname,:hashPass, :email, :role, :created_at)");
                        
        $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
        $stmt->bindParam(':hashPass', $hashPass, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);

        
        if ($stmt->execute()) {
            echo("<script>alert('New user successfully added!');</script>");
        }
        else{
            echo("<script>alert('An error has occured. New user was not added');</script>");
        }
    }
?>

<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta name="viewport"content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>" type="text/css" />
  <link rel='stylesheet' type='text/css' href='newuser.css'>
</head>
<body>
<?php include 'sidebar.php'; ?>
      <?php include 'sidebar.php'; ?>

      <section id = "loader">
        <h1>New User</h1>
        <form action="newUser.php">
        <input type="hidden" id="csfrToken" value= "<?php echo $key; ?>" >
            <label for="firstName">First Name
                <input type="text">
            </label>
            <label for="lastName">Last Name
                <input type="text">
            </label>
            <label for="email">Email
                <input type="text">
            </label>
            <label for="password">Password
                <input type="password">
            </label>
            <label for="roles">Role
                <select name="roles" id="roleSelector">
                    <option value="Member">Member</option>
                    <option value="Admin">Admin</option>
                </select>
            </label>
            <label for="title">Title
                <select name="titles" id="titleSelector">
                    <option value = "Mr.">Mr</option>
                    <option value = "Mrs.">Mrs</opion>
                    <option value = "Ms.">Ms</option>
                    <option value = "Dr.">Dr</option>
                    <option value = "Prof.">Prof</option>
                </select>
            </label>
            <button id = "saveButton" type = "button">Save</button>
        </form>
    </section>

</body>
</html>