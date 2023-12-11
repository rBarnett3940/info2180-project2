<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';
$class1 = 'nt';
$class2 = 'fl';
$class3 = 'fl';
$class4 = 'fl';



try {
    $conn = new PDO(
        'mysql:host=' . $host . ';dbname=' . $dbname,
        $username,
        $password
    );
} catch (Exception $e) {
    die($e->getMessage());
}

$statement = $conn->query("SELECT id, firstname, lastname, password, email, role, DATE_FORMAT(created_at, '%Y-%m-%d %H:%i') AS created_at FROM Users");
$users = $statement->fetchAll(PDO::FETCH_ASSOC);




?>

<?php if(session_status() == 'PHP_SESSION_ACTIVE'){?>

<div class="heading" id="heading">
    <h1 id="hdr">Users</h1>
    <button class="addContact-btn" id="lf-btn" onclick="addUser()">               
        <img src="plus.png" alt="plus image">
        <span>Add User</span>
    </button>
</div>
<br>
<div class="contact-table" id="contact-table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><strong><?= $user['firstname'].' '.$user['lastname']; ?></strong></td>
            <td class="lgt"><?= $user['email']; ?></td>
            <td class="lgt"><?= $user['role']; ?></td>
            <td class="lgt"><?=  $user['created_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>

<?php } ?>






