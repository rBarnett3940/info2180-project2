<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Contact</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>" type="text/css" />
        <link rel="stylesheet" href="contact-styles.css?v=<?php echo time(); ?>" type="text/css" />
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>
            <section id="main-container">
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
            </section>
            <?php include 'sidebar.php'; ?>
        </div>
    </body>
</html>