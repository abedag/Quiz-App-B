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

  if (!empty($_POST['options'])) {
    $options = json_decode($_POST['options'], true);

    if (!is_array($options)) {
      echo json_encode(["error" => "Invalid options format"]);
      exit;
    }

    foreach ($options as $option) {
      if (!isset($option['option_id'], $option['option_text'], $option['is_correct'])) {
        continue;
      }

      $query = $conn->prepare("
        UPDATE q_options
        SET option_text = :option_text, is_correct = :is_correct
        WHERE id = :option_id AND question_id = :question_id
      ");

      $query->bindParam(':option_text', $option['option_text']);
      $query->bindParam(':is_correct', $option['is_correct'], PDO::PARAM_BOOL);
      $query->bindParam(':option_id', $option['option_id'], PDO::PARAM_INT);
      $query->bindParam(':question_id', $question_id, PDO::PARAM_INT);

      $query->execute();
    }
  }

} catch (PDOException $e) {
  echo json_encode(["error" => $e->getMessage()]);
}

?>