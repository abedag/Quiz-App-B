<?php
include 'connection.php';

try {
  if (!isset($_POST['question_id'])) {
    echo json_encode(["error" => "question_id is required"]);
    exit;
  }

  $question_id = $_POST['question_id'];
  
  if (!empty($_POST['question_text'])) {
    $query = $conn->prepare("UPDATE questions SET question_text = :question_text WHERE id = :question_id");
    $query->bindParam(':question_text', $_POST['question_text']);
    $query->bindParam(':question_id', $question_id, PDO::PARAM_INT);
    $query->execute();
  }

} catch (PDOException $e) {
  echo json_encode(["error" => $e->getMessage()]);
}

?>