<?php
include 'connection.php';

try {
  if (isset($_POST['email']) && isset($_GET['username']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $username = $_GET['username'];
    $password = $_POST['password'];

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = $conn->prepare("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)");

    $query->bindParam(':email', $email);
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);

    if ($query->execute()) {
      echo json_encode(["message" => "Registered successfully"]);
    } else {
      echo json_encode(["error" => "Registration Failed"]);
    }
  }

} catch(PDOException $e) {
  echo json_encode(["error" => "Registration error: " . $e -> getMessage()]);
}

?>