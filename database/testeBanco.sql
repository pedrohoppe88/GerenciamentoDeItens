CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE subperfis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    avatar VARCHAR(255), 
    FOREIGN KEY (user_id) REFERENCES usuarios(id)
);