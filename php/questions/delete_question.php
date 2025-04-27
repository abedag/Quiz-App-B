<?php
include 'connection.php';

try {
  if (!isset($_POST['question_id'])) {
    echo json_encode(["error" => "question_id is required"]);
    exit;
  }

  $quiz_id = $_POST['question_id'];

  $query = $conn->prepare("DELETE FROM questions WHERE id = :question_id");

  $query -> bindParam(':question_id', $question_id, PDO::PARAM_INT);

  if ($query -> execute()) {
    if ($query -> rowCount() > 0) {
      echo json_encode(["message" => "Question deleted successfully"]);
    } else {
      echo json_encode(["error" => "Question not found"]);
    }
  } else {
    echo json_encode(["error" => "Failed to delete question"]);
  }

} catch(PDOException $e) {
  echo json_encode(["error" => "Question deletion error:" . $e -> getMessage()]);
}

?>