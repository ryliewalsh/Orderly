<?php
session_start();


require_once "DAO.php";
$dao = new DAO();

header('Content-Type: application/json');

if (isset($_POST['bill_id'])) {
    session_start();


    require_once "DAO.php";
    $dao = new DAO();

    header('Content-Type: application/json');

    if (isset($_POST['bill_id'])) {
        $bill_id = $_POST['bill_id'];


        try {
            $dao->payBill($bill_id);
            echo json_encode(['success' => true]);

        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Failed to pay bill: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Bill ID not provided']);
    }


    $bill_id = $_POST['bill_id'];


    try {
        $dao->payBill($bill_id);
        echo json_encode(['success' => true]);

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Failed to pay bill: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Bill ID not provided']);
}
?>
