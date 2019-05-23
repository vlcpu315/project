<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'checkSession':
            checkSession();
            break;
        case 'logout':
            logout();
            break;
    }
}

// check if there is a session variable
function checkSession() {
    session_start();
    if(!isset($_SESSION["username"])){
        echo "noSession";
    } else {
        echo "a";
    }
    exit;
}

// destroy all session and return a string
function logout() {
    session_start();
    session_destroy();
    // if(!isset($_SESSION["username"])){
    //     echo "unset";
    // }
    echo "unset";
    exit;
}
?>