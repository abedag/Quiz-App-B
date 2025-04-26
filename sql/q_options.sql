CREATE TABLE q_options (
	id INT AUTO_INCREMENT PRIMARY KEY,
  question_id INT NOT NULL,
  option_text VARCHAR(255) NOT NULL,
	is_correct BOOLEAN DEFAULT FALSE,
	FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);

SELECT * FROM q_options;
