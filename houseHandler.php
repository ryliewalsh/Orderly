<?php
session_start();
require_once 'DAO.php';
$dao = new DAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    $enteredHouseName = $_POST['houseName'];
    $enteredHouseKey = $_POST['houseKey'];

    if (isset($_POST['createNewHousehold'])) {
        $newKey = generateNewKey();
        if ($newKey === null) {
            $errors[] = "Failed to generate a new key. Please try again later.";
        }
    }

    if (empty($errors)) {
        // Verify household name and key
        $householdId = $dao->getHouseId($enteredHouseName, $enteredHouseKey);
        if ($householdId !== null) {
            // Household exists, proceed with adding the household member
            $user_id = $dao->getUser($_SESSION['username']);
            $success = $dao->addHouseholdMember($user_id, $householdId);
            if ($success) {
                // add message
                header("Location: https://orderly-b0075f006315.herokuapp.com/index.php");
                exit();
            } else {
                // Error adding household member
                $errors[] = "Failed to add household member. Please try again.";
            }
        } else {
            // Household does not exist
            $errors[] = "Household name or key is incorrect. Please try again or create a new household.";
        }
    }

    // Redirect back to the form page with errors
    header("Location: https://orderly-b0075f006315.herokuapp.com/form_page.php?errors=" . urlencode(implode(",", $errors)));
    exit();
}

function generateNewKey() {
    // Implement your logic to generate a new key
    // Return the generated key or null if generation fails
}

?>
