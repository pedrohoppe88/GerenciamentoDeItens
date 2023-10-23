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
        $this->dbname = "netflix";
        $this->user = 'root';
        $this->password = 'lasanh@123';
        $this->connect();
    }

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