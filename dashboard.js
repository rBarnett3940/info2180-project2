window.onload = function(){
    var hr = new XMLHttpRequest();
    var url = "dashboard-all.php";
    hr.onreadystatechange = function(){
        if(hr.readyState == XMLHttpRequest.DONE){
            if(hr.status == 200){
                alert("Testing");
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

    var all_btn = document.getElementById("all");
    all_btn.addEventListener("click", function(e){
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
    });

    var sl_btn = document.getElementById("sl");
    sl_btn.addEventListener("click", function(e){
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
    });

    var sp_btn = document.getElementById("sp");
    sp_btn.addEventListener("click", function(e){
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
    });

    var hm_btn = document.getElementById("hm");
    hm_btn.addEventListener("click", function(e){
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
    });

};