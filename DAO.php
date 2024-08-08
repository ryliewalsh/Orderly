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

    public function __construct ($filename = "bills.data") {
        $this->filename = $filename;
    }
    public function addHousehold($household_name, $house_key) {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO households (household_name, house_key) VALUES (:household_name, :house_key)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":household_name", $household_name);
        $q->bindParam(":house_key", $house_key);
        $q->execute();
    }

    public function addUser($email, $username, $password_hash, $first_name) {
     
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO users (email, username, password_hash,  first_name)
            VALUES (:email, :username, :password_hash,   :first_name)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":email", $email);
        $q->bindParam(":username", $username);
        $q->bindParam(":password_hash", $password_hash);
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
    public function getUserHouse() {
        $conn = $this->getConnection();
        $user_id = $_SESSION['user_id'];
       
        $stmt = $conn->prepare("SELECT household_id FROM users WHERE user_id = :user_id ");
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ALL);
    }



    function getHouseId($houseName, $houseKey) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT household_id FROM households WHERE household_name = ? AND house_key = ?");
        $stmt->execute([$houseName, $houseKey]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return $row['household_id'];
        } else {
            return null;
        }
    }

    function addHouseholdMember($user_id, $household_id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE users SET household_id = :householdId WHERE user_id = :userId");


        $stmt->bindParam(':userId', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':householdId', $household_id, PDO::PARAM_INT);
    }




    public function addBill($user_id,$description, $amount, $due_date ) {
        $conn = $this->getConnection();
        $is_paid = 0;
        $saveQuery =
            "INSERT INTO bills(user_id, description, amount, due_date, is_paid)
            VALUES(:user_id,:description, :amount, :due_date,  :is_paid )";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user_id", $user_id);
        $q->bindParam(":description", $description);
        $q->bindParam(":amount", $amount);
        $q->bindParam(":due_date", $due_date);

        $q->bindParam(":is_paid", $is_paid);
        $q->execute();
    }

    public function addEvent($user_id,$event_name, $event_description, $event_date ) {

        $conn = $this->getConnection();
      
        $saveQuery =
            "INSERT INTO events(user_id, event_name, event_description, event_date )
            VALUES(:user_id, :event_name, :event_description,  :event_date)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user_id", $user_id);
        $q->bindParam(":event_name", $event_name);
        $q->bindParam(":event_description", $event_description);
        $q->bindParam(":event_date", $event_date);
       

        $q->execute();
    }

    public function addChore($user_id,$description, $due_date ) {

        $conn = $this->getConnection();
        $is_done = 0;
        $saveQuery =
            "INSERT INTO chores(user_id, description, due_date, is_done)
            VALUES(:user_id,:description,  :due_date,  :is_done )";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user_id", $user_id);
        $q->bindParam(":description", $description);
        $q->bindParam(":due_date", $due_date);
        $q->bindParam(":is_done", $is_done);
        $q->execute();
    }
    public function getTodaysBills() {
        $conn = $this->getConnection();
        $user_id = $_SESSION['user_id'];

        $today = date('Y-m-d');

        $stmt = $conn->prepare("SELECT description, amount, due_date, is_paid FROM bills WHERE user_id = :user_id AND is_paid = 0 AND due_date = :today");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':today', $today);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBills() {
        $conn = $this->getConnection();
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT description, amount, due_date, is_paid, bill_id FROM bills WHERE user_id = :user_id AND is_paid = 0 ORDER BY due_date DESC");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getTodaysChores() {
        $conn = $this->getConnection();
        $user_id = $_SESSION['user_id'];

        $today = date('Y-m-d');

        $stmt = $conn->prepare("SELECT description,  due_date FROM chores WHERE user_id = :user_id AND is_done = 0 AND due_date = :today");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':today', $today);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getChores() {
        $conn = $this->getConnection();
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT description, due_date, chore_id FROM chores WHERE user_id = :user_id AND is_done = 0 ORDER BY due_date DESC");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEvents(){
        $conn = $this->getConnection();
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT event_name, event_description, event_date FROM events WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getTodaysEvents() {
        $conn = $this->getConnection();
        $user_id = $_SESSION['user_id'];

        $today = date('Y-m-d');

        $stmt = $conn->prepare("SELECT event_description,  event_date FROM events WHERE user_id = :user_id  AND event_date = :today");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':today', $today);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function payBill($bill_id) {
        $conn = $this->getConnection();


        $stmt = $conn->prepare("UPDATE bills SET is_paid = '1' WHERE bill_id = :bill_id ");
        $stmt->bindParam(':bill_id', $bill_id);


        $stmt->execute();


    }
    public function removeChore($chore_id) {
        $conn = $this->getConnection();


        $stmt = $conn->prepare("UPDATE chores SET is_done = '1' WHERE chore_id = :chore_id ");
        $stmt->bindParam(':chore_id', $chore_id);


        $stmt->execute();


    }
    public function removeEvent($event_id) {
        $conn = $this->getConnection();


        $stmt = $conn->prepare("UPDATE events SET is_done = '1' WHERE event_id = :event_id ");
        $stmt->bindParam(':event_id', $event_id);


        $stmt->execute();


    }


}
