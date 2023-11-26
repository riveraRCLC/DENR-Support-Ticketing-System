<?php
include("dbh.inc.php");

session_start();
$conSub = $_POST['conSub'];
$conSenderID = $_POST['conSenderID'];
$conReceiverID = $_POST['conReceiverID'];
$conbody = $_POST['conbody'];

// Assume you have stored user information in session
//$userID = $_SESSION["id"];

$email = mysqli_real_escape_string($conn, $conReceiverID); // Protect against SQL injection
$sqlGetReceiverID = "SELECT `userid` FROM `user` WHERE `uemail` = '$email' LIMIT 1";
$sqlGetReceiverIDResult = mysqli_query($conn, $sqlGetReceiverID);

$row = mysqli_fetch_assoc($sqlGetReceiverIDResult);
$receiverID = $row['userid'];

// Insert into ticket table
$sqlTicket = "INSERT INTO `ticket` (`ticketnum`, `userid`, `compid`) VALUES ('TICKET001', $conSenderID, (SELECT `udcompid` FROM `userdetails` WHERE `uduserid` = $conSenderID LIMIT 1))";
mysqli_query($conn, $sqlTicket);

// Get the ticketid of the newly inserted ticket
$ticketid = mysqli_insert_id($conn);

// Insert into conversation table
$sqlConversation = "INSERT INTO `conversation` (`ticketid`, `convonum`, `conSenderID`, `conReceiverID`, `conSub`, `conbody`)
                    VALUES ($ticketid, 'CONVO001', $receiverID, $conReceiverID, '$conSub', '$conbody')";
mysqli_query($conn, $sqlConversation);

// Get the convoid of the newly inserted conversation
$convoid = mysqli_insert_id($conn);

// Insert into ticketdetails table
$sqlTicketDetails = "INSERT INTO `ticketdetails` (`tdticketid`, `tdconvoid`, `tdremarks`)
                    VALUES ($ticketid, $convoid, 'Ticket Created')";
mysqli_query($conn, $sqlTicketDetails);

$response = [
    'status' => 'ok',
    'success' => true,
    'message' => 'Record created successfully!',
];
print_r(json_encode($response));
?>