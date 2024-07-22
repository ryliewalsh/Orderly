<?php

class DAO {

    public $filename;

    private $host = "us-cluster-east-01.k8s.cleardb.net";
    private $db = "heroku_7470d7db78a1ee5";
    private $user = "b27d5efeabac5a";
    private $pass = "f63ea30c";

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