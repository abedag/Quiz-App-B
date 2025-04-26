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



} catch (PDOException $e) {
echo json_encode(["error" => "Questions call error:" . $e->getMessage()]);
}

?>