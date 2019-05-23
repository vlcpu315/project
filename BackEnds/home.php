<?php

if(isset($_POST['num'])) {
    getNum();
}

if(isset($_POST['session'])) {
    checkSession();
}

if(isset($_POST['link'])) {
    getLink();
}

if(isset($_POST['logout'])) {
    logOut();
}

$session;

// if there is no session return noSession
function checkSession(){
    // echo "no";
    session_start();
    if(!isset($_SESSION["userlogin"])){
        echo "noSession";
    } else {
        echo $_SESSION['userlogin'];
    }
    exit;
}

// return how many people the user referree
function getNum(){
    $servername = "sql3.freemysqlhosting.net";
    $username = "sql3292759";
    $password = "PclrmNIUKB";
    $databaseName = "sql3292759";
  
    session_start();
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$databaseName);
    // $sql = "SELECT COUNT(referee) FROM apitest WHERE referee =\"". $_SESSION['userlogin']."\"";
    $sql = "SELECT COUNT(referee) FROM user WHERE referee =\"". $_SESSION['userlogin']."\"";
  
    $num = 0;
  
    if ($res = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_array($res)) {
              $num = $row['COUNT(referee)'];
            }
        } else {
          $num = "0";
        }
    }

    echo $num;
    exit;
}

//return user link
function getLink(){
    //Encryption function to encrypt email
    function encrypt($string, $key = 'mykey', $secret = 'SecretKey', $method = 'AES-256-CBC') {
        // hash
        $key = hash('sha256', $key);
        // create iv - encrypt method AES-256-CBC expects 16 bytes
        $iv = substr(hash('sha256', $secret), 0, 16);
        // encrypt
        $output = openssl_encrypt($string, $method, $key, 0, $iv);
        // encode
        return base64_encode($output);
    }

    session_start();
    $email = encrypt($_SESSION['userlogin']);

    echo $email;
}

// delete all session variable and return a string unset
function logOut(){
    session_start();
    session_destroy();
    echo "unset";
    exit;
}
?>