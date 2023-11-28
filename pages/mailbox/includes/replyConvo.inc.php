<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("dbh.inc.php");
session_start();

// Get data from AJAX request
$conSub = $_POST['conSub'];
$conSenderID = $_POST['conSenderID'];
$conReceiverID = $_POST['conReceiverID'];
$conbody = $_POST['conbody'];
$currentTicketID = $_POST['currentTicketID'];

// Assume you have stored user information in session
$userID = $_SESSION["id"];

$sqlConversation = "INSERT INTO `conversation` (`ticketid`, `convonum`, `conSenderID`, `conReceiverID`, `conSub`, `conbody`) 
                                VALUES ($currentTicketID, 'CONVO001', $conSenderID, $conReceiverID, '$conSub', '$conbody')";
if(mysqli_query($conn, $sqlConversation)){
    $response = [
        'status' => 'ok',
        'success' => true,
        'message' => 'Record created successfully!',
    ];
    print_r(json_encode($response));
}else {
    $response = [
        'status' => 'error',
        'message' => 'Failed to Reply Conversation.',
    ];
    print_r(json_encode($response));
}
?>
