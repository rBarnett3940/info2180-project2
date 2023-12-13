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
        <link rel="stylesheet" href="create-contact.css?v=<?php echo time(); ?>" type="text/css" />
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


        function addNote() {
            var xhr = new XMLHttpRequest();
            var textarea = document.getElementById("note");
            var textareaContent = textarea.value;
            var targetButton = event.target.closest('.noteBtn');
            var contactId = targetButton.getAttribute('contact-id');
            console.log(contactId);
            console.log(textareaContent);
            var url = "contact.php?contact_id=" + contactId + "&comment=" + textareaContent;

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


        function assignedToMe(){
            var hr = new XMLHttpRequest();
            var url = "dashboard.atm.php";
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


        function usu(){
            var hr = new XMLHttpRequest();
            var url = "dashboard-users.php";
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



        function nCt(){
            var hr = new XMLHttpRequest();
            var url = "save-contact.php";
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



        function submitForm() {
            var form = document.getElementById('contactForm');
            var formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    // Handle the response status
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Continue processing the response
                    return response.text(); // or response.blob(), response.json(), etc.
                })
                .then(data => {
                    // Handle the response data
                    const response = JSON.parse(data);

                    // Handle the response data
                    alert(response.message);
                    form.reset();
                    // You can update the UI, show a success message, etc.
                })
                .catch(error => {
                    // Handle errors
                    console.error('Error:', error);
                });
        }



        function submitForm2() {
            var form = document.getElementById('userForm');
            var formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    // Handle the response status
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Continue processing the response
                    return response.text(); // or response.blob(), response.json(), etc.
                })
                .then(data => {
                    // Handle the response data
                    const response = JSON.parse(data);

                    // Handle the response data
                    alert(response.message);
                    form.reset();
                    // You can update the UI, show a success message, etc.
                })
                .catch(error => {
                    // Handle errors
                    console.error('Error:', error);
                });
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

        function atm(){
            var xhr = new XMLHttpRequest();
            var targetButton = event.target.closest('.assign-btn');
            console.log(targetButton);
            var contactId2 = targetButton.getAttribute('data-content-id');
            console.log(contactId2);
            var btn_s = 2;
            var url = "contact.php?contact_id=" + contactId2 + "&switch_btn=" + btn_s;
            
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



        function addUser() {
            var hr = new XMLHttpRequest();
            var url = "newuser.php";
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


        function logout() {
            // Make an AJAX request to logout.php
            fetch('logout.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect to the login page if the logout was successful
                        window.location.href = 'login.php';
                    } else {
                        // Handle any errors if needed
                        console.error('Logout failed.');
                    }
                })
                .catch(error => {
                    // Handle AJAX errors if needed
                    console.error('AJAX error:', error);
                });
        }

    </script>
</html>