CREATE TABLE quizzes (
	id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) UNIQUE NOT NULL,
  section_id INT NOT NULL,
	created_by INT,
  FOREIGN KEY (section_id) REFERENCES sections(id) ON DELETE CASCADE,
	FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
);

INSERT INTO quizzes (title, section_id, created_by) VALUES 
('Frontend Basics Quiz', (SELECT id FROM sections WHERE name = 'frontend'), 1),
('Backend Basics Quiz', (SELECT id FROM sections WHERE name = 'backend'), 1),
('C/C++ Basics Quiz', (SELECT id FROM sections WHERE name = 'c_cpp'), 1),
('Algorithms Basics Quiz', (SELECT id FROM sections WHERE name = 'algorithms'), 1),
('DevOps Basics Quiz', (SELECT id FROM sections WHERE name = 'devops'), 1),
('Software Engineering Basics Quiz', (SELECT id FROM sections WHERE name = 'software_eng'), 1);

SELECT * FROM quizzes;