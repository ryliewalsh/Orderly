<?php
session_start();


require_once "DAO.php";
$dao = new DAO();

header('Content-Type: application/json');

if (isset($_POST['bill_id'])) {
    $bill_id = $_POST['bill_id'];


    try {
        $updatedBills = $dao->getBills();
        session_start();


        require_once "DAO.php";
        $dao = new DAO();

        header('Content-Type: application/json');

        if (isset($_POST['bill_id'])) {
            $bill_id = $_POST['bill_id'];


            try {
                $updatedBills = $dao->getBills();
                echo json_encode(['success' => true, 'bills' => $updatedBills]);

            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => 'Failed to pay bill: ' . $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Bill ID not provided']);
        }


        echo json_encode(['success' => true, 'bills' => $updatedBills]);

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Failed to pay bill: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Bill ID not provided']);
}

?>
