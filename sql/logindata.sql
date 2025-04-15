CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL -- hashed passwords are long
);

INSERT INTO users (username, password) VALUES
('admin', 'iamadministrator'),
('guest', 'guest');