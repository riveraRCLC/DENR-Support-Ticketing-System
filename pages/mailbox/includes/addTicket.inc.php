<?php
include("dbh.inc.php");
$conSub = $_POST['conSub'];
$conSenderID = $_POST['conSenderID'];
$conReceiverID = $_POST['conReceiverID'];
$conbody = $_POST['conbody'];

// Insert into ticket table
$sqlTicket = "INSERT INTO `ticket` (`ticketnum`, `userid`, `compid`) VALUES ('TICKET001', $conSenderID, 1)";
mysqli_query($conn, $sqlTicket);

// Get the ticketid of the newly inserted ticket
$ticketid = mysqli_insert_id($conn);

// Insert into conversation table
$sqlConversation = "INSERT INTO `conversation` (`ticketid`, `convonum`, `conSenderID`, `conReceiverID`, `conSub`, `conbody`)
                    VALUES ($ticketid, 'CONVO001', $conSenderID, $conReceiverID, '$conSub', '$conbody')";
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