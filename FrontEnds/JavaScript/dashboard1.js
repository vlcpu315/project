var apiURL= "http://localhost:8081/BackEnds/api/apiLaunch.php?all";

window.onload=function(){
    checkSession();
    console.log("a")
}

// check if there is a session variable
function checkSession(){
    var clickBtnValue = "checkSession";
    var ajaxurl = '../BackEnds/dashboard.php',
    data =  {'action': clickBtnValue};
    $.post(ajaxurl, data, function (response) {
        if(response == "noSession"){
            window.location.href = "adminLogin.html";
        } else {
            getData();
        }
    });
}

// get data from db and display on web page
function getData(){
    $.ajax({
        type: 'GET',
        dataType: "jsonp",
        contentType: 'application/json',
        url: apiURL,
        success: function(response) {
            console.log(response);
            arr = response;

            let dataSet = [];
            for(let i = 0; i < arr.length; i++){
                let tmp = [];
                tmp.push(arr[i][0].email, arr[i][0].referee, arr[i][0].time, arr[i][0].ip, arr[i][0].NumOfReferals);
                dataSet.push(tmp);
            }

            console.log(dataSet);

            // create a table
            $(document).ready(function() {
                $('#tableList').DataTable( {
                    data: dataSet,
                    columns: [
                        { title: "email" },
                        { title: "referee" },
                        { title: "time" },
                        { title: "ip" },
                        { title: "NumOfReferals" }
                    ]
                } );
            } );
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: " + textStatus);
        }
    });
}

// logout
function logout(){
    var clickBtnValue = "logout";
    var ajaxurl = '../BackEnds/dashboard.php',
    data =  {'action': clickBtnValue};
    $.post(ajaxurl, data, function (response) {
        if(response == "unset"){
            window.location.href = "adminLogin.html";
        } else {
            alert("Error: cannot logput");
        }
    });
}
