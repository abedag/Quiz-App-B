<?php
include 'connection.php';

try {
  $query = $conn -> prepare("INSERT INTO questions (quiz_id, question_text, created_by) VALUES (:quiz_id, :question_text, :created_by)");
  
  $quiz_id = $_GET['quiz_id'];
  $question_text = $_GET['question_text'];
  $created_by = $_GET['created_by'];

  $query -> bindParam(':quiz_id', $quiz_id);
  $query -> bindParam(':question_text', $question_text);
  $query -> bindParam(':created_by', $created_by);



} catch(PDOException $e) {
  echo json_encode(["error" => "Quiz creation error:" . $e -> getMessage()]);
}

?>