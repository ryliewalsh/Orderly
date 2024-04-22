<?php
session_start();

// Include DAO.php
require_once "DAO.php";
$dao = new DAO();

if (isset($_POST['billId'])) {

    $billId = $_POST['billId'];


    $dao->payBill($billId);


    echo json_encode(['success' => true]);
} else {

    echo json_encode(['success' => false, 'message' => 'Bill ID not provided']);
}
?>
