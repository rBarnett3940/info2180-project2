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

$btn_s = 0;

$contactId = isset($_GET['contact_id']) ? $_GET['contact_id'] : null;
$btn_s = isset($_GET['switch_btn']) ? $_GET['switch_btn'] : null;

$sl = "Sales Lead";
$sp = "Support";


$statement = $conn->query("SELECT id, title, firstname, lastname, email, CONCAT(SUBSTRING(telephone, 1, 3), '-', SUBSTRING(telephone, 4, 3), '-', SUBSTRING(telephone, 7, 4)) AS telephone, company, type, assigned_to, created_by, CONCAT(MONTHNAME(created_at),' ',DATE_FORMAT(created_at, '%m, %Y')) AS created_at, CONCAT(MONTHNAME(updated_at),' ',DATE_FORMAT(updated_at, '%m, %Y')) AS updated_at FROM Contacts WHERE id = $contactId");
$contact_det = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($btn_s == 1 && $contact_det[0]["type"] == "Support"){
    $statement4 = $conn->query("UPDATE Contacts SET type = 'Sales Lead', updated_at = CURRENT_TIMESTAMP WHERE id = $contactId");
    $user3 = $statement4->fetchAll(PDO::FETCH_ASSOC); 
} else if($btn_s == 1 && $contact_det[0]["type"] == "Sales Lead"){
    $statement4 = $conn->query("UPDATE Contacts SET type = 'Support', updated_at = CURRENT_TIMESTAMP WHERE id = $contactId");
    $user3 = $statement4->fetchAll(PDO::FETCH_ASSOC); 
}

$cb = $contact_det[0]["created_by"];
$cb2 = $contact_det[0]["assigned_to"];

$statement2 = $conn->query("SELECT firstname, lastname FROM Users WHERE id = $cb");
$user1 = $statement2->fetchAll(PDO::FETCH_ASSOC);

$statement3 = $conn->query("SELECT firstname, lastname FROM Users WHERE id = $cb2");
$user2 = $statement3->fetchAll(PDO::FETCH_ASSOC);


if ($contact_det[0]["type"] == "Support" && $btn_s == 1){
    $swButton = 'Support';
} else if ($contact_det[0]["type"] == "Sales Lead" and $btn_s == 1){
    $swButton = 'Sales Lead';
} else if ($contact_det[0]["type"] == "Sales Lead"){
    $swButton = 'Support';
} else if ($contact_det[0]["type"] == "Support"){
    $swButton = 'Sales Lead';
}

?>


<div class="tlevel">
    <div class="profile">
        <img src="user.png" alt="profile icon">
        <div class="p-content">
            <h1><?= $contact_det[0]["title"], '. ' .$contact_det[0]["firstname"].' '.$contact_det[0]["lastname"]; ?></h1>
            <p>Created on <?= $contact_det[0]["created_at"]?> by <?= $user1[0]["firstname"].' '.$user1[0]["lastname"]; ?></p>
            <p>Updated on <?= $contact_det[0]["updated_at"]?></p>
        </div>
    </div>
    <div class="tbtn">
        <button class="btn assign-btn">               
            <img  src="hand.png">
            <span>Assign to me</span>
        </button>
        <button class="btn switch-btn" onclick="switchBtn()" data-content-id="<?= $contactId?>">               
            <img  src="swap.png">
            <span>Switch to <?= $swButton?></span>
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
        <p><?= $user2[0]["firstname"].' '.$user2[0]["lastname"]; ?></p>
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
