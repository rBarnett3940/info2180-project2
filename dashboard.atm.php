<?php

session_start();

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


if(session_status() == 'PHP_SESSION_ACTIVE'){

    $id = $_SESSION['user_id'];


    $statement = $conn->query("SELECT * FROM Contacts WHERE assigned_to = $id");
    $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);

}




?>

<?php if(session_status() == 'PHP_SESSION_ACTIVE'){?>

<div class="heading" id="heading">
    <h1 id="hdr">Dashboard</h1>
    <button class="addContact-btn" id="lf-btn" id="nCt" onclick="nCt()">               
        <img src="plus.png" alt="plus image">
        <span>Add Contact</span>
    </button>
</div>
<br>
<div class="contact-table" id="contact-table">
    <div class="filter" id="filter">
        <img src="filter.png" alt="filter icon">
        <p>Filter By:</p>
        <div id="fetchval" value="Please">
            <button class="<?= $class1; ?>" id="all" name="All" onclick="all_d()">All</button>
            <button class="<?= $class2; ?>" id="sl" name="Sales Lead" onclick="salesLead()">Sales Leads</button>
            <button class="<?= $class3; ?>" id="sp" name="Support" onclick="support()">Support</button>
            <button class="<?= $class4; ?>" id="as" name="Assigned to me" onclick="assignedToMe()">Assigned to me</button>
        </div>
    </div>
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
            <td><button class="view-btn" onclick="loadContactDetails()" data-contact-id="<?= $contact['id']; ?>">View</button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php } ?>






