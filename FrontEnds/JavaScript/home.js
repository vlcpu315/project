window.onload=function(){
    checkSession();
    getNum();
    getLink();
}

// check if there is a session variable. If no session variable, then navgate to signup.php
function checkSession(){
    var clickBtnValue = "session";
    var ajaxurl = '../BackEnds/home.php',
    data =  {'session': clickBtnValue};
    $.post(ajaxurl, data, function (response) {

        console.log("response: " + response);

        if(response == "noSession"){
            window.location.href = "signup.php";
        } else {
            let div = document.getElementById("name");
            var t = document.createTextNode(response);
            div.appendChild(t);
        }
    });
}

// get how many people that the user has refered
function getNum(){
    // var clickBtnValue = "session";
    var data = "num";
    var ajaxurl = '../BackEnds/home.php';
    $.post(ajaxurl, data, function (response) {

        console.log("response: " + response);

        let div = document.getElementById("num");
        var t = document.createTextNode(response);
        div.appendChild(t);
    });
}

// get encrypt email and display the email in web page
function getLink(){
    var data = "link";
    var ajaxurl = '../BackEnds/home.php';
    console.log("1.0");
    $.post(ajaxurl, data, function (response) {

        console.log("response: " + response);

        let div = document.getElementById("link");
        var t = document.createTextNode("http://localhost:8081/FrontEnds/signup.php?i=" + response);
        div.appendChild(t);
    });
}

// logout and clean session variable
function logout(){
    var data = "logout";
    var ajaxurl = '../BackEnds/home.php';
    $.post(ajaxurl, data, function (response) {
        // console.log("response: " + response);
        if(response == "unset"){
            window.location.href = "signup.php";
        } else {
            alert("Error: cannot logout");
        }
    });
}