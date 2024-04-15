<?php
session_start();
require_once 'Dao.php';

$name = $_POST['name'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

$messages = array();
$_SESSION['sentiment'] = "bad";

if(0 == strlen($name)) {
    $messages[] = "please enter a name";
}

if(0 == strlen($comment)) {
    $messages[] = "please enter a comment";
}

if (0 < count($messages)) {
    $_SESSION['messages'] = $messages;
    $_SESSION['inputs'] = $_POST;
    header("Location: https://orderly-b0075f006315.herokuapp.com/pay.php");
    exit();
}


$dao = new Dao();


$_SESSION['sentiment'] = "good";
$messages[] = "Thanks for the comment!";
$_SESSION['messages'] = $messages;

header("Location: https://orderly-b0075f006315.herokuapp.com/pay.php");
exit();
?>