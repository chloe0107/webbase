
CREATE DATABASE IF NOT EXISTS sianmanlapaz;
USE sianmanlapaz;

DROP TABLE IF EXISTS enrollments;
DROP TABLE IF EXISTS subjects;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_no VARCHAR(30) NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','student') NOT NULL DEFAULT 'student'
);

CREATE TABLE subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_code VARCHAR(20) NOT NULL UNIQUE,
    subject_name VARCHAR(100) NOT NULL,
    units INT NOT NULL
);

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    subject_id INT NOT NULL,
    UNIQUE(student_id, subject_id),
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

-- Passwords below were created using PHP password_hash().
-- Admin login: admin / admin123
INSERT INTO users (student_no, full_name, username, password, role) VALUES
(NULL, 'System Administrator', 'admin', '$2y$12$kyGmVMqZHnhqCyh89Q9jxeVZ1Z9xoBCd4ZX/rIFo3I.laZWK0XJde', 'admin');

-- Student login: juan / student123
INSERT INTO users (student_no, full_name, username, password, role) VALUES
('2026-0001', 'Juan Dela Cruz', 'juan', '$2y$12$K2wcAyd47mAWVY5dDxRGp.yFlRKWj73Rrzvc9jgYSrgb0PI0av9vW', 'student');

INSERT INTO subjects (subject_code, subject_name, units) VALUES
('IT101', 'Introduction to Computing', 3),
('IT102', 'Computer Programming 1', 3),
('GE101', 'Mathematics in the Modern World', 3),
('GE102', 'Understanding the Self', 3);

-- Juan is enrolled in the first two subjects.
INSERT INTO enrollments (student_id, subject_id) VALUES
(2, 1),
(2, 2);
