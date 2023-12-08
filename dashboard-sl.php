<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';
$class1 = 'fl';
$class2 = 'nt';
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

$statement = $conn->query("SELECT * FROM Contacts WHERE type = 'Sales Lead'");
$contacts = $statement->fetchAll(PDO::FETCH_ASSOC);

require 'dashboard-view.php';

?>