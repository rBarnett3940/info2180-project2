<?php
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
        <link rel="stylesheet" href="contact-styles.css?v=<?php echo time(); ?>" type="text/css" />
        <script src="dashboard.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>
            <section id="main-container">
                <div class="heading">
                    <h1>Dashboard</h1>
                    <button class="addContact-btn">               
                        <img src="plus.png" alt="plus image">
                        <span>Add Contact</span>
                    </button>
                </div>
                <br>
                <div class="contact-table">
                    <div class="filter">
                        <img src="filter.png" alt="filter icon">
                        <p>Filter By:</p>
                        <div id="fetchval" value="Please">
                            <button class="<?= $class1; ?>" id="all" name="All">All</button>
                            <button class="<?= $class2; ?>" id="sl" name="Sales Lead">Sales Leads</button>
                            <button class="<?= $class3; ?>" id="sp" name="Support">Support</button>
                            <button class="<?= $class4; ?>" id="as" name="Assigned to me">Assigned to me</button>
                        </div>
                    </div>
                    <div id="tb"></div>
                </div>
            </section>
            <?php include 'sidebar.php'; ?>
        </div>
    </body>
</html>


