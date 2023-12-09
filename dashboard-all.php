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

$statement = $conn->query("SELECT * FROM Contacts");
$contacts = $statement->fetchAll(PDO::FETCH_ASSOC);




?>


<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Type</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($contacts as $contact): ?>
    <tr>
        <td><strong><?= $contact['title'].'. '.$contact['firstname'].' '.$contact['lastname']; ?></strong></td>
        <td class="lgt"><?= $contact['email']; ?></td>
        <td class="lgt"><?= $contact['company']; ?></td>
        <td><p class="<?= $b = $contact['type']=='Sales Lead' ? "sl" : "sp" ?>"><?= strtoupper($contact['type']); ?></p></td>
        <td><button class="view-btn" onclick="loadContactDetails()">View</button></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>


<script>
    function loadContactDetails() {
        alert("Checking");
    }
</script>

