<?php
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
} elseif (isset($_POST['chore_id'])) {
    $chore_id = $_POST['chore_id'];

    try {
        $dao->removeChore($chore_id);
        echo json_encode(['success' => true, 'message' => 'Chore removed successfully']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Failed to remove chore: ' . $e->getMessage()]);
    }

} elseif (isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];

    try {
        $dao->removeEvent($event_id);
        echo json_encode(['success' => true, 'message' => 'Event removed successfully']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Failed to remove chore: ' . $e->getMessage()]);
    }
}
else {
    echo json_encode(['success' => false, 'message' => 'Bill or chore ID not provided']);
}
?>
