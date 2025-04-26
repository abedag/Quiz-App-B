<?php
include 'connection.php';

try {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();

    if ($query->rowCount() > 0) {
      $row = $query->fetch(PDO::FETCH_ASSOC);
      $hashedPassword = $row['password'];

      if (password_verify($password, $hashedPassword)) {
        echo json_encode(["message" => "Logged in successfully"]);
      } else {
        echo json_encode(["error" => "Invalid email or password"]);
      }
    } else {
      echo json_encode(["error" => "Invalid email or password"]);
    }
  }

} catch (PDOException $e) {
  echo json_encode(["error" => "Login error: " . $e->getMessage()]);
}

?>