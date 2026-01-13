-- Create database
CREATE DATABASE IF NOT EXISTS student_db;

-- Use the database
USE student_db;

-- Create table for student records
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    marks INT NOT NULL
);

-- Insert some sample student records
INSERT INTO students (name, marks) VALUES
('Alice', 78),
('Bob', 65),
('Charlie', 92),
('David', 84),
('Eva', 73),
('Frank', 89),
('Grace', 95),
('Hannah', 56),
('Ian', 70),
('Jack', 88);
