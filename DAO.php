<?php

class DAO {

    public $filename;

    private $host = "cb5ajfjosdpmil.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com";
    private $db = "d1epleqn6m9red";
    private $user = "u42lgkdc8r0k9t";
    private $pass = "pd0adf2a1bcddc57c84ed8f54ccfb1a989f656662b3da54dfe639f26cd35700d2";

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
