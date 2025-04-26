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

  if (!empty($_POST['title'])) {
    $fields[] = "title = :title";
    $params[':title'] = $_POST['title'];
  }

  if (!empty($_POST['section_id'])) {
    $fields[] = "section_id = :section_id";
    $params[':section_id'] = $_POST['section_id'];
  }

  if (empty($fields)) {
    echo json_encode(["error" => "No fields to update"]);
    exit;
  }

  $sql = "UPDATE quizzes SET " . implode(', ', $fields) . " WHERE id = :quiz_id";
  $query = $conn->prepare($sql);

  foreach ($params as $key => $value) {
    $query->bindValue($key, $value);
  }

  $query->bindValue(':quiz_id', $quiz_id, PDO::PARAM_INT);

  if ($query->execute()) {
    if ($query->rowCount() > 0) {
      echo json_encode(["message" => "Quiz updated successfully"]);
    } else {
      echo json_encode(["error" => "No changes made or quiz not found"]);
    }
  } else {
    echo json_encode(["error" => "Failed to update quiz"]);
  }

} catch (PDOException $e) {
  echo json_encode(["error" => $e->getMessage()]);
}
?>