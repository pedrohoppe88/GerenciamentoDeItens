<?php

class Conexao 
{
    protected $host;
    protected $dbname;
    protected $user;
    protected $password;
    protected $conn;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = "db";
        $this->user = 'root';
        $this->password = 'ratazana@1';
        $this->connect();
    }
// so colar o codigo que esta em Banco.sql na query do SQL Workbench
// login teste é cadastro

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro de conexão: ' . $e->getMessage());
        }

        return $this->conn;
    }

    public function close()
    {
        $this->conn = null;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}   


?>