-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     firstname VARCHAR(50),
--     lastname VARCHAR(50),
--     email VARCHAR(100),
--     password VARCHAR(100),
--     department INT
-- );

INSERT INTO users (firstname, lastname, email, password, department) VALUES
('John', 'Doe', 'john.doe@example.com', 'password123', 1),
('Jane', 'Smith', 'jane.smith@example.com', 'letmein', 2),
('Michael', 'Johnson', 'michael.johnson@example.com', 'securepass', 3),
('Emily', 'Brown', 'emily.brown@example.com', 'password123', 1),
('David', 'Davis', 'david.davis@example.com', 'p@ssw0rd', 2),
('Sarah', 'Wilson', 'sarah.wilson@example.com', 'qwerty', 3);



-- CREATE TABLE departments (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(50)
-- );

INSERT INTO departments (name) VALUES
('Sales'),
('Marketing'),
('HR'),
('IT'),
('Finance'),
('Operations');

-- CREATE TABLE categories (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(50)
-- );

INSERT INTO categories (name) VALUES
('Category 1'),
('Category 2'),
('Category 3'),
('Category 4'),
('Category 5');



--processes

INSERT INTO processes (title, creator, responsible, represented, department, category, offset_days, status, last_updated_by, is_active, next, previous, parent, date) VALUES
('Process 1', 1, 2, 3, 4, 1, 10, 'Pending', 3, TRUE, 2, NULL, NULL, '2024-02-07'),
('Process 2', 2, 3, 4, 5, 2, 15, 'In Progress', 4, TRUE, 3, 1, NULL, '2024-02-07'),
('Process 3', 3, 4, 5, 1, 3, 20, 'Completed', 5, FALSE, 4, 2, NULL, '2024-02-07'),
('Process 4', 4, 5, 1, 2, 4, 25, 'Pending', 1, TRUE, 5, 3, NULL, '2024-02-07'),
('Process 5', 5, 1, 2, 3, 5, 5, 'In Progress', 2, TRUE, 1, 4, NULL, '2024-02-07');
