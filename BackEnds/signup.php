<?php
if (isset($_POST['email'])) {
    createSession();
}

// create a session variable
function createSession() {
    session_start();
    $_SESSION['userlogin'] = $_POST['email'];
    echo $_POST['email'];
    exit;
}

?>