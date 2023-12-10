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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>
            <section id="main-container">
                <div id="tb"></div>
            </section>
            <?php include 'sidebar.php'; ?>
        </div>
    </body>
    <script>
        var hr = new XMLHttpRequest();
    var url = "dashboard-all.php";
    hr.onreadystatechange = function(){
        if(hr.readyState == XMLHttpRequest.DONE){
            if(hr.status == 200){
                var tabl = hr.responseText;
                var result = document.getElementById("tb");
                result.innerHTML = tabl;
                
            } else {
                alert("Error!!!")
            }
        }
    };
    hr.open("GET", url, true);
    hr.send();


        function loadContactDetails() {
            var xhr = new XMLHttpRequest();
            var targetButton = event.target.closest('.view-btn');
            var contactId = targetButton.getAttribute('data-contact-id');
            var url = "contact.php?contact_id=" + contactId;

            //document.getElementById("contact-table").style.border = 0;

            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        // Handle the response as needed
                        var responseData = xhr.responseText;
                        // You can update a div or perform other actions with the data
                        document.getElementById('tb').innerHTML = responseData;
                    } else {
                        alert("Error loading contact details!");
                    }
                }
            };

            xhr.open("GET", url, true);
            xhr.send();
        }


        function salesLead(){
            var hr = new XMLHttpRequest();
            var url = "dashboard-sl.php";
            hr.onreadystatechange = function(){
                if(hr.readyState == XMLHttpRequest.DONE){
                    if(hr.status == 200){
                        var tabl = hr.responseText;
                        var result = document.getElementById("tb");
                        result.innerHTML = tabl;
                    } else {
                        alert("Error!!!")
                    }
                }
            };
            hr.open("GET", url, true);
            hr.send();
        }

        function support(){
            var hr = new XMLHttpRequest();
            var url = "dashboard-s.php";
            hr.onreadystatechange = function(){
                if(hr.readyState == XMLHttpRequest.DONE){
                    if(hr.status == 200){
                        var tabl = hr.responseText;
                        var result = document.getElementById("tb");
                        result.innerHTML = tabl;
                    } else {
                        alert("Error!!!")
                    }
                }
            };
            hr.open("GET", url, true);
            hr.send();
        }


        function all_d(){
            var hr = new XMLHttpRequest();
            var url = "dashboard-all.php";
            hr.onreadystatechange = function(){
                if(hr.readyState == XMLHttpRequest.DONE){
                    if(hr.status == 200){
                        var tabl = hr.responseText;
                        var result = document.getElementById("tb");
                        result.innerHTML = tabl;
                    } else {
                        alert("Error!!!")
                    }
                }
            };
            hr.open("GET", url, true);
            hr.send();
        }



        function switchBtn() {
            var xhr = new XMLHttpRequest();
            var targetButton = event.target.closest('.switch-btn');
            var contactId2 = targetButton.getAttribute('data-content-id');
            var btn_s = 1;
            var url = "contact.php?contact_id=" + contactId2 + "&switch_btn=" + btn_s;
            console.log(targetButton);
            console.log(contactId2);
            console.log(url);


            //document.getElementById("contact-table").style.border = 0;

            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        // Handle the response as needed
                        var responseData = xhr.responseText;
                        // You can update a div or perform other actions with the data
                        document.getElementById('tb').innerHTML = responseData;
                    } else {
                        alert("Error loading contact details!");
                    }
                }
            };

            xhr.open("GET", url, true);
            xhr.send();
        }

    </script>
</html>