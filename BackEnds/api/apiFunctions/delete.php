<?php

  $database = new Database();
  $conn = $database->getConnection();


$email = $_POST["delete"];

$sql = "SELECT * FROM user WHERE email=\"".$email."\"";
if ($res = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($res) > 0) {

      $sql = "DELETE FROM user WHERE email=\"".$email."\"";
  if(mysqli_query($conn, $sql)){
    http_response_code(200);
//     echo json_encode(
//     array("message" => "Users has been deleted")
// );
echo $_GET['callback'] . '('.json_encode(
array("message" => "Users has been deleted")
).')';

}
} else {
//   echo json_encode(
//   array("message" => "No users found")
// );
http_response_code(404);
echo $_GET['callback'] . '('.json_encode(
array("message" => "No users found")
).')';
}
}


 ?>
