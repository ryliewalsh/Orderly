<?php

class DAO {

    public $filename;
    private $host = "ec2-52-54-200-216.compute-1.amazonaws.com";
    private $db = "ddnhtlfuck0irk";
    private $user = "rgauzdxzwidjio";
    private $pass = "a45367df63fdb2b618561cd9410d14da932a9665efb95cf73096827eb9c5f6ce";

    public function getConnection () {
        return
            new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
    }

    public function __construct ($filename = "bills.data") {
        $this->filename = $filename;
    }



    public function getGoods () {
        $stuff = file_get_contents($this->filename);
        $lines = explode("\n", trim($stuff));
        return $lines;
    }


    public function addBill($name, $comment) {
        #$this->logger->LogInfo("saveComment: [{$name}], [{$comment}]");
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO bills
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