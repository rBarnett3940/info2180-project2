<?php
global $class4, $class2, $class1, $class3, $contacts;
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>" type="text/css" />
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>
            <section id="main-container">
                <div class="heading">
                    <h1>Dashboard</h1>
                    <button class="addContact-btn">               
                        <img src="media/plus.png" alt="plus image">
                        <span>Add Contact</span>
                    </button>
                </div>
                <br>
                <div class="contact-table">
                    <div class="filter">
                        <img src="media/filter.png" alt="filter icon">
                        <p>Filter By:</p>
                        <a href="dashboard.php">
                            <button class="<?= $class1; ?>">All</button>
                        </a>
                        <a href="dashboard-sl.php">
                            <button class="<?= $class2; ?>">Sales Leads</button>
                        </a>
                        <a href="dashboard-s.php">
                            <button class="<?= $class3; ?>">Support</button>
                        </a>
                        <a href="#">
                            <button class="<?= $class4; ?>">Assigned to me</button>
                        </a>
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
                                <td><a href="contact.php?cid=<?= $contact['id']; ?>">View</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <?php include 'sidebar.php'; ?>
        </div>
    </body>
</html>