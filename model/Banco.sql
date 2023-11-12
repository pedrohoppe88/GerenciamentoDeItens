-- Tabela de Usuários
CREATE TABLE usuarios (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Senha VARCHAR(255) NOT NULL
);

CREATE TABLE grupos (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NomeGrupo VARCHAR(255) NOT NULL,
    Descricao TEXT
);

-- Tabela de Associação entre Usuários e Grupos
CREATE TABLE usuariosGrupos (
    IDUsuarioGrupo INT AUTO_INCREMENT PRIMARY KEY,
    IDUsuario INT,
    IDGrupo INT,
    FOREIGN KEY (IDUsuario) REFERENCES Usuarios(ID),
    FOREIGN KEY (IDGrupo) REFERENCES Grupos(ID)
);

-- Tabela de Itens
CREATE TABLE itens (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NomeItem VARCHAR(255) NOT NULL,
    Descricao TEXT,
    IDGrupo INT,
    FOREIGN KEY (IDGrupo) REFERENCES Grupos(ID)
);