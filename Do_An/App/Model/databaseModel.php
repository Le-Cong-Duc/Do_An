<?php
class databaseModel
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbName = DB_NAME;
    private $conn;
    private $stm;

    function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=".$this->host.";port=3307;dbname=".$this->dbName, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function get_one($sql){
        $this->stm = $this->conn->prepare($sql);
        $this->stm->execute();
        $this->stm->setFetchMode(PDO::FETCH_ASSOC);

        return $this->stm->fetch();
    }
    function get_all($sql)
    {
        $this->stm = $this->conn->prepare($sql);
        $this->stm->execute();
        $this->stm->setFetchMode(PDO::FETCH_ASSOC);

        return $this->stm->fetchAll();
    }

    function exec($sql){
        $this->stm = $this->conn->prepare($sql);
        $this->stm->execute();

        return $this->stm;
    }

// CRUD
}
?>