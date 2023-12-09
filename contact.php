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

$statement = $conn->query("SELECT * FROM Contacts WHERE id = 1081");
$contact_det = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($contact_det);


?>

<?php
// view-contact.php
$contactId = $_GET['id'];
error_log("Contact ID: $contactId");

// Rest of your code...
?>

<script src="dashboard.js"></script>

<div class="tlevel">
    <div class="profile">
        <img src="user.png" alt="profile icon">
        <div class="p-content">
            <h1><?= $contact_det[0]["title"], '. ' .$contact_det[0]["firstname"].' '.$contact_det[0]["lastname"]; ?></h1>
            <p>Created on <?= $contact_det[0]["created_at"]?> by <?= $contact_det[0]["created_by"]?></p>
            <p>Updated on <?= $contact_det[0]["updated_at"]?></p>
        </div>
    </div>
    <div class="tbtn">
        <button class="btn assign-btn">               
            <img  src="hand.png">
            <span>Assign to me</span>
        </button>
        <button class="btn switch-btn">               
            <img  src="swap.png">
            <span>Switch to Sales Lead</span>
        </button>
    </div>
</div>
<br>
<div class="dets">
    <div class="email">
        <h4>Email</h4>
        <p><?= $contact_det[0]["email"]?></p>
    </div>
    <div class="telephone">
        <h4>Telephone</h4>
        <p><?= $contact_det[0]["telephone"]?></p>
    </div>
    <div class="company">
        <h4>Company</h4>
        <p><?= $contact_det[0]["company"]?></p>
    </div>
    <div class="assigned_to">
        <h4>Assigned to</h4>
        <p><?= $contact_det[0]["assigned_to"]?></p>
    </div>
</div>
<br>
<div class="notes">
    <div class="hnotes">
        <img  src="notes.png">
        <h3>Assign to me</h3>
    </div>
    <hr>
    <div class="txt">
        <form method="post">
            <p><label for="note">Add a note about <?= $contact_det[0]["firstname"]?></label></p><br>
            <textarea id="note" name="note">
            
            </textarea>
        </form>
    </div>
</div>