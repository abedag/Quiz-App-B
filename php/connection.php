<?php
$server_name = "localhost";
$username = "root";
$password = "abed680890";
$db_name = "webappdb";

try {
  $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);

} catch(PDOException $e) {
  echo json_encode(["error" => "Connection failed:" . $e->getMessage()]);
}

?>