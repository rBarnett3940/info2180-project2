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

$id = $_GET['cid'];

$statement = $conn->query("SELECT * FROM Contacts WHERE id = $id");
$contact_det = $statement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($contact_det);

require 'contact-view.php';

?>