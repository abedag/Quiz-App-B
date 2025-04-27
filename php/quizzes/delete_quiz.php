<?php
include 'connection.php';

try {
  if (!isset($_POST['quiz_id'])) {
    echo json_encode(["error" => "quiz_id is required"]);
    exit;
  }

  $quiz_id = $_POST['quiz_id'];

  $query = $conn->prepare("DELETE FROM quizzes WHERE id = :quiz_id");

  $query->bindParam(':quiz_id', $quiz_id, PDO::PARAM_INT);

  if ($query->execute()) {
    if ($query->rowCount() > 0) {
      echo json_encode(["message" => "Quiz deleted successfully"]);
    } else {
      echo json_encode(["error" => "Quiz not found"]);
    }
  } else {
    echo json_encode(["error" => "Failed to delete quiz"]);
  }

} catch(PDOException $e) {
  echo json_encode(["error" => "Quiz deletion error:" . $e -> getMessage()]);
}

?>