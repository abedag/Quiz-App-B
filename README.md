QuizMaster API — PHP + MySQL (Full CRUD)
QuizMaster API is a complete backend system built with PHP and MySQL that provides user authentication and full management (CRUD) for Quizzes and Questions via clean RESTful APIs.

🚀 Features:
✅ Register / Sign up users

🔐 Login users

📝 Create quizzes

📚 Get all quizzes

✏️ Edit quizzes

🗑️ Delete quizzes

🧠 Create questions

📋 Get questions of a specific quiz

✏️ Edit questions

🗑️ Delete questions

🛠️ Tech Stack:
Backend: PHP 8+

Database: MySQL

API Format: REST (JSON)

📜 API Endpoints:

Method	Endpoint	Description:
--	/authentication/register.php	Register new user
--	/authentication/login.php	Login user
--	/quizzes/createQuiz.php	Create a new quiz
--	/quizzes/getQuizzes.php	Get all quizzes
--	/quizzes/editQuiz.php?id={quiz_id}	Edit a quiz
--	/quizzes/deleteQuiz.php?id={quiz_id}	Delete a quiz
--	/questions/createQuestion.php	Create a question under a quiz
--	/questions/getQuestions.php?quiz_id={quiz_id}	Get all questions for a quiz
--	/questions/editQuestion.php?id={question_id}	Edit a question
--	/questions/deleteQuestion.php?id={question_id}	Delete a question
