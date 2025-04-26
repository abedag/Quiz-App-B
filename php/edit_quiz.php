<?php
include 'connection.php';

try {
  if (!isset($_POST['quiz_id'])) {
    echo json_encode(["error" => "quiz_id is required"]);
    exit;
  }

  $quiz_id = $_POST['quiz_id'];
  $fields = [];
  $params = [];


} catch (PDOException $e) {
  echo json_encode(["error" => $e->getMessage()]);
}
?>