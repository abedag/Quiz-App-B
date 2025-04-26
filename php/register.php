<?php
include 'connection.php';

try {
  if (isset($_POST['email']) && isset($_GET['username']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $username = $_GET['username'];
    $password = $_POST['password'];

    $hashed = password_hash($password, PASSWORD_DEFAULT);

  }

} catch(PDOException $e) {
  echo json_encode(["error" => "Registration error: " . $e -> getMessage()]);
}

?>