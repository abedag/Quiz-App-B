<?php
include 'connection.php';

try {
  if (!isset($_POST['question_id'])) {
    echo json_encode(["error" => "question_id is required"]);
    exit;
  }

  $question_id = $_POST['question_id'];
  
} catch (PDOException $e) {
  echo json_encode(["error" => $e->getMessage()]);
}

?>