<?php

class DAO {

    public $filename;

    private $host = "thh2lzgakldp794r.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $db = "ks1fg6ao8s6swsi5";
    private $user = "jo0w6x5oajq53ucf";
    private $pass = "xlz7v6pfxv3q3udc";

    public function getConnection () {
        return
            new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
    }

    public function __construct ($filename = "stuff.data") {
        $this->filename = $filename;
    }

    public function getGoods () {
        $stuff = file_get_contents($this->filename);
        $lines = explode("\n", trim($stuff));
        return $lines;
    }

    public function saveComment($name, $comment) {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO comments
            (comment, name)
            VALUES
            (:comment, :name)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":comment", $comment);
        $q->bindParam(":name", $name);
        $q->execute();
    }

    public function getComments () {
        $conn = $this->getConnection();
        return $conn->query("SELECT comment, date_entered, id FROM comments ORDER BY date_entered desc")->fetchAll(PDO::FETCH_ASSOC);
    }

}
