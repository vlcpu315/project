<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
include_once('database/database.php');



if(isset($_GET["query"])){
  $query = $_GET["query"];
  include_once('apiFunctions/queryOne.php');
} else {
  if(isset($_POST["query"])){
    if("" !=  trim($_POST["query"])){
      $query= $_POST["query"];
      include_once('apiFunctions/queryOne.php');
    }
  }
}

  if(isset($_POST["delete"])){
    if("" !=  trim($_POST["delete"])){
      $query= $_POST["delete"];
      include_once('apiFunctions/delete.php');
    }
  }



if(isset($_GET["all"]) || isset($_POST["all"])){
  include_once('apiFunctions/queryAll.php');
}

if(isset($_POST["create"])){
  if("" != trim($_POST["create"])){
    include_once('apiFunctions/create.php');
  }
}

if(isset($_POST["update"])){
  if("" != trim($_POST["update"])){
    include_once('apiFunctions/update.php');
  }
}



 ?>
