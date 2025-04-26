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

  if ($query->execute()) {
    $options = json_decode($_GET['options'], true);

    foreach ($options as $option) {
      $option_query = $conn->prepare("INSERT INTO q_options (question_id, option_text, is_correct) VALUES (:question_id, :option_text, :is_correct)");
      $option_query->bindParam(':question_id', $question_id);
      $option_query->bindParam(':option_text', $option['text']);
      $option_query->bindParam(':is_correct', $option['is_correct'], PDO::PARAM_BOOL);
      $option_query->execute();
    }

    echo json_encode(["message" => "Question with options added successfully", "question_id" => $conn->lastInsertId()]);
  } else {
    echo json_encode(["error" => "Failed to create question"]);
  }

} catch(PDOException $e) {
  echo json_encode(["error" => "Quiz creation error:" . $e -> getMessage()]);
}

?>