CREATE TABLE sections (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) UNIQUE NOT NULL
);

INSERT INTO sections (name) VALUES
  ('frontend'),
  ('backend'),
  ('c_cpp'),
  ('algorithms'),
  ('git'),
  ('devops'),
  ('software_eng');
