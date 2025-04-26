CREATE TABLE questions (
	id INT AUTO_INCREMENT PRIMARY KEY,
  quiz_id INT NOT NULL,
  question_text TEXT NOT NULL,
	created_by INT,
	FOREIGN KEY (quiz_id) REFERENCES quizzes(id) ON DELETE CASCADE
);

SELECT * FROM questions;

