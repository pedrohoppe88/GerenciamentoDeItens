CREATE DATABASE db;
USE db;

CREATE TABLE usuarios (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Senha VARCHAR(255) NOT NULL
);

CREATE TABLE grupos (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NomeGrupo VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    Descricao TEXT,
    urlImg VARCHAR(255) DEFAULT NULL
);

CREATE TABLE usuariosGrupos (
    IDUsuarioGrupo INT AUTO_INCREMENT PRIMARY KEY,
    IDUsuario INT,
    IDGrupo INT,
    FOREIGN KEY (IDUsuario) REFERENCES Usuarios(ID),
    FOREIGN KEY (IDGrupo) REFERENCES Grupos(ID)
);

CREATE TABLE itens (
    ID INT AUTO_INCREMENT PRIMARY KEY,
<<<<<<< Updated upstream
    NomeItem VARCHAR(255) NOT NULL,
    Quantidade INT,
    Descricao TEXT,
    Img VARCHAR(255) DEFAULT NULL,
=======
    nome VARCHAR(255) NOT NULL,
    quantidade INT,
    descricao TEXT,
    img VARCHAR(255) DEFAULT NULL,
>>>>>>> Stashed changes
    IDGrupo INT,
    FOREIGN KEY (IDGrupo) REFERENCES Grupos(ID)
);