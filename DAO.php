<?php

class DAO {

    public $filename;
    private $host = "us-cluster-east-01.k8s.cleardb.net";
    private $db = "heroku_1d54b3f3ff98f88";
    private $user = "bbf816cd32fc09";
    private $pass = "0c51babd";

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
    public function addUser($description, $amount, $due_date, $is_recurring ) {
        #$this->logger->LogInfo("saveComment: [{$name}], [{$comment}]");
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO bills
            (user_id, description, amount, due_date, is_recurring, is_paid)
            VALUES
            (1,:description, :amount, :due_date, :is_recurring, 0 )";

        $q = $conn->prepare($saveQuery);
        $q->bindParam(":description", $description);
        $q->bindParam(":amount", $amount);
        $q->bindParam(":due_date", $due_date);
        $q->bindParam(":is_recurring", $is_recurring);
        $q->execute();
    }


    public function addBill($description, $amount, $due_date, $is_recurring ) {
        #$this->logger->LogInfo("saveComment: [{$name}], [{$comment}]");
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO bills
            (user_id, description, amount, due_date, is_recurring, is_paid)
            VALUES
            (1,:description, :amount, :due_date, :is_recurring, 0 )";

        $q = $conn->prepare($saveQuery);
        $q->bindParam(":description", $description);
        $q->bindParam(":amount", $amount);
        $q->bindParam(":due_date", $due_date);
        $q->bindParam(":is_recurring", $is_recurring);
        $q->execute();
    }

    public function getComments () {
        $conn = $this->getConnection();
        return $conn->query("SELECT comment, date_entered, id FROM comments ORDER BY date_entered desc")->fetchAll(PDO::FETCH_ASSOC);
    }
}