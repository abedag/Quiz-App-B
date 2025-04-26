<?php
include 'connection.php';

try {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();


  }

} catch (PDOException $e) {
  echo json_encode(["error" => "Login error: " . $e->getMessage()]);
}

?>