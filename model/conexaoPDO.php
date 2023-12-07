<?php

class Conexao 
{
    protected $host;
    protected $dbname;
    protected $user;
    protected $password;
    protected $conn;

    public $total = 0;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = "db";
        $this->user = 'root';
        $this->password = '123';
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

        public function Consultar($sql){
            try {
                if ($result = $this->conn->query($sql)){
                    $this->total = $result->rowCount();
                    return $result;
                }
                $this->total = 0;
                return null;
            } catch (Exception) {
                $this->close();
            }
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