CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
     clearance BOOLEAN NOT NULL DEFAULT 0
);


INSERT INTO users (username, password, clearance) VALUES
('admin', 'iamadministrator', TRUE),
('guest', 'guest', FALSE);