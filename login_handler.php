<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    // If the username and password are set, attempt to authenticate the user
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'DAO.php';
    $dao = new DAO();

    $user = $dao->getUser($username);

    if ($user && password_verify($password, $user['password_hash'])) {
        // If authentication is successful, set session variables
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['user_id'];

        // Clear the password from the POST data
        unset($_POST['password']);
    } else {
        // If authentication fails, set a session variable to indicate login failure
        $_SESSION['login_failed'] = true;
    }
}

// Unset all session variables if the login page is loaded


// Redirect the user based on authentication status
if ($_SESSION['authenticated']) {
    header("Location: https://orderly-b0075f006315.herokuapp.com/index.php");
} else {
    header("Location: https://orderly-b0075f006315.herokuapp.com/login.php");
}
session_unset();
exit();
?>
