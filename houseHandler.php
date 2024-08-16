
<?php
session_start();
require_once 'DAO.php';
$dao = new DAO();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    $enteredHouseName = $_POST['houseName'];
    $enteredHouseKey = $_POST['houseKey'];
    $action = $_POST['action'];
    if (empty($enteredHouseName) ) {
        $errors[] = "Household name is required.";
    } else {
        if ($action === "join") {
            $householdId = $dao->getHouseId($enteredHouseName, $enteredHouseKey);
            if ($householdId !== null) {
                // Household exists, proceed with adding the household member
                $user_id = $dao->findUser($_SESSION['username']);
                 $dao->addHouseholdMember($user_id, $householdId);

                    // add message
                    header("Location: https://orderly-b0075f006315.herokuapp.com/index.php");
                    exit();
                } else {
                    // Error adding household member
                    $errors[] = "Failed to add household member. Please try again.";
                }
            } elseif ($action === "create") {
                $new_key = generateNewKey();
                 $_SESSION['inputs'] = array(
                'houseName' => $enteredHouseName,
                'houseKey' => $new_key
                  );
                $dao->addHousehold($enteredHouseName, $new_key);
                $_SESSION['house_key']= $new_key;
               
                exit();

            }
        }


}

function generateNewKey() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $key = '';
    $length = 4;

    for ($i = 0; $i < $length; $i++) {
        $key .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $key;
}
if (isset($_SESSION['error_messages'])) {
    foreach ($_SESSION['error_messages'] as $error) {
        echo "<div class='message error-message'>$error</div>";
    }
    unset($_SESSION['error_messages']);
}
?>
