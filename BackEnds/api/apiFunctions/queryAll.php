<?php





  $database = new Database();
  $conn = $database->getConnection();






  $sql = "SELECT email,referee,time,ip FROM user";
  $arr1 = array();
  $arr2 = array();
  $finalArray = array();
  if ($res = mysqli_query($conn, $sql)) {
      if (mysqli_num_rows($res) > 0) {
          while ($r = mysqli_fetch_assoc($res)) {
              $row = $r;
              $sql = "SELECT COUNT(referee) as NumOfReferals FROM user  WHERE referee = \"".$row['email']."\"";
              $count = mysqli_fetch_assoc(mysqli_query($conn, $sql));
              $arr = array($count + $r);
              array_push($finalArray,$arr);
          }

          http_response_code(200);
          //echo json_encode($finalArray);
          echo $_GET['callback'] . '('.json_encode($finalArray).')';

      } else {
        http_response_code(404);
          echo json_encode(
          array("message" => "No users found")
      );
      }
  }



 ?>
