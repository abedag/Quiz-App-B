<?php
include 'connection.php';

try {
  $query = $conn -> prepare("INSERT INTO quizzes (title, section_id, created_by) VALUES (:title, :section_id, :created_by)");
  
  $title = $_GET['title'];
  $section_id = $_GET['section_id'];
  $created_by = $_GET['created_by'];

  $query -> bindParam(':title', $title);
  $query -> bindParam(':section_id', $section_id);
  $query -> bindParam(':created_by', $created_by);

  if ($query->execute()) {
    echo json_encode(["message" => "Quiz created successfully", "quiz_id" => $conn->lastInsertId()]);
  } else {
    echo json_encode(["error" => "Failed to create quiz"]);
  }

} catch(PDOException $e) {
  echo json_encode(["error" => "Quiz creation error:" . $e -> getMessage()]);
}

?>