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
    public function addHousehold($household_name) {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO households (household_name) VALUES (:household_name)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":household_name", $household_name);
        $q->execute();
    }

    public function addUser($email, $username, $password_hash, $household_id, $first_name) {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO users (email, username, password_hash, household_id, first_name)
            VALUES (:email, :username, :password_hash, :household_id,  :first_name)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":email", $email);
        $q->bindParam(":username", $username);
        $q->bindParam(":password_hash", $password_hash);
        $q->bindParam(":household_id", $household_id);
        $q->bindParam(":first_name", $first_name);

        $q->execute();
    }
    public function getUser($username) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function getGoods () {
        $stuff = file_get_contents($this->filename);
        $lines = explode("\n", trim($stuff));
        return $lines;
    }



    public function addBill($user_id,$description, $amount, $due_date, $is_recurring ) {
        #$this->logger->LogInfo("saveComment: [{$name}], [{$comment}]");
        $conn = $this->getConnection();
        $is_paid = 0;
        $saveQuery =
            "INSERT INTO bills(user_id, description, amount, due_date, is_recurring, is_paid)
            VALUES(:user_id,:description, :amount, :due_date, :is_recurring, :is_paid )";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user_id", $user_id);
        $q->bindParam(":description", $description);
        $q->bindParam(":amount", $amount);
        $q->bindParam(":due_date", $due_date);
        $q->bindParam(":is_recurring", $is_recurring);
        $q->bindParam(":is_paid", $is_paid);
        $q->execute();
    }


    public function addChore($user_id,$description, $due_date, $is_recurring ) {
        #$this->logger->LogInfo("saveComment: [{$name}], [{$comment}]");
        $conn = $this->getConnection();
        $is_done = 0;
        $saveQuery =
            "INSERT INTO chores(user_id, description, due_date, is_recurring, is_done)
            VALUES(:user_id,:description,  :due_date, :is_recurring, :is_done )";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user_id", $user_id);
        $q->bindParam(":description", $description);
        $q->bindParam(":due_date", $due_date);
        $q->bindParam(":is_recurring", $is_recurring);
        $q->bindParam(":is_paid", $is_done);
        $q->execute();
    }

    public function getBills () {
        $conn = $this->getConnection();
        return $conn->query("SELECT description, amount, due_date, is_paid FROM bills ORDER BY due_date desc")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getChores () {
        $conn = $this->getConnection();
        return $conn->query("SELECT description, due_date, is_done FROM chores ORDER BY due_date desc")->fetchAll(PDO::FETCH_ASSOC);
    }
}