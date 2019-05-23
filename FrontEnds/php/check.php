<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header('location:../FrontEnds/adminLogin.html');
    }
?>