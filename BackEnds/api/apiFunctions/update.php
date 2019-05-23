<?php
$database = new Database();
$conn = $database->getConnection();

$json = $_POST["update"];

$data = json_decode($json,true);

foreach($data as $item){

  if(!empty($item["email"])){
      if(!empty($item["referee"])){
        $sql ="UPDATE user SET referee = \"".$item["referee"]."\" WHERE email=\"" . $item["email"]."\"";
        echo $sql;
        mysqli_query($conn, $sql);
      } else {
        $sql ="UPDATE user SET referee = NULL WHERE email=\"" . $item["email"]."\"";
        mysqli_query($conn, $sql);
      }
    } else {
      echo "No email value";
    }

}

 ?>
