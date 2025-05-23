CREATE TABLE quizzes (
	id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) UNIQUE NOT NULL,
  section_id INT NOT NULL,
	created_by INT,
  FOREIGN KEY (section_id) REFERENCES sections(id) ON DELETE CASCADE,
	FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
);

SELECT * FROM quizzes;