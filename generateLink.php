<?php
$email = $_POST["email"];


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
echo "Your link is:http://localhost/project/signup.php?i=". encrypt($email);


?>
