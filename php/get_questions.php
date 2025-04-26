<?php
include 'connection.php';
//get questions with there options

try {
  $query = $conn->prepare("
    SELECT 
      questions.id AS question_id,
      questions.question_text,
      quizzes.title AS quiz_title
    FROM questions
    JOIN quizzes ON questions.quiz_id = quizzes.id
    ORDER BY questions.id DESC
");

$query -> execute();
$questions = $query -> fetchAll(PDO::FETCH_ASSOC);

$result = [];

foreach ($questions as $question) {
  $option_query = $conn->prepare("
      SELECT id AS option_id, option_text, is_correct
      FROM q_options
      WHERE question_id = :question_id
  ");
  $option_query->bindParam(':question_id', $question['question_id'], PDO::PARAM_INT);
  $option_query->execute();
  $options = $option_query->fetchAll(PDO::FETCH_ASSOC);

  $result[] = [
      "question_id" => $question['question_id'],
      "question_text" => $question['question_text'],
      "quiz_title" => $question['quiz_title'],
      "options" => $options
  ];
}

echo json_encode($result);

} catch (PDOException $e) {
echo json_encode(["error" => "Questions call error:" . $e->getMessage()]);
}

?>