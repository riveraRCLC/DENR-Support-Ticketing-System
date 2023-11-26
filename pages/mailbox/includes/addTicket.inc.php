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

// Assume you have stored user information in session
$userID = $_SESSION["id"];

// Get the userid for the conReceiverID
$email = mysqli_real_escape_string($conn, $conReceiverID); // Protect against SQL injection
$sqlGetReceiverID = "SELECT `userid` FROM `user` WHERE `uemail` = '$email' LIMIT 1";
$result = mysqli_query($conn, $sqlGetReceiverID);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row !== null) {
        $conReceiverID = $row['userid'];

        // Insert data into the ticket table
        $sqlTicket = "INSERT INTO `ticket` (`ticketnum`, `userid`, `compid`) VALUES ('TICKET001', $userID, (SELECT `udcompid` FROM `userdetails` WHERE `uduserid` = $userID LIMIT 1))";

        if (mysqli_query($conn, $sqlTicket)) {
            // If ticket is inserted successfully, get the ticket ID
            $ticketID = mysqli_insert_id($conn);

            // Insert data into the conversation table
            $sqlConversation = "INSERT INTO `conversation` (`ticketid`, `convonum`, `conSenderID`, `conReceiverID`, `conSub`, `conbody`) 
                                VALUES ($ticketID, 'CONVO001', $conSenderID, $conReceiverID, '$conSub', '$conbody')";

            if (mysqli_query($conn, $sqlConversation)) {
                // If conversation is inserted successfully, get the conversation ID
                $convoID = mysqli_insert_id($conn);

                // Insert data into the ticketdetails table
                $sqlTicketDetails = "INSERT INTO `ticketdetails` (`tdticketid`, `tdconvoid`, `tdremarks`) 
                                     VALUES ($ticketID, $convoID, 'Ticket Created')";

                if (mysqli_query($conn, $sqlTicketDetails)) {
                    $response = [
                        'status' => 'ok',
                        'success' => true,
                        'message' => 'Record created successfully!',
                    ];
                    print_r(json_encode($response));
                } else {
                    $response = [
                        'status' => 'ok',
                        'success' => false,
                        'message' => 'Record creation failed for ticketdetails!',
                    ];
                    print_r(json_encode($response));
                }
            } else {
                $response = [
                    'status' => 'ok',
                    'success' => false,
                    'message' => 'Record creation failed for conversation!',
                ];
                print_r(json_encode($response));
            }
        } else {
            $response = [
                'status' => 'ok',
                'success' => false,
                'message' => 'Record creation failed for ticket!',
            ];
            print_r(json_encode($response));
        }
    } else {
        // Handle the case where no results were returned for the given email
        $response = [
            'status' => 'error',
            'success' => false,
            'message' => 'No user found for the specified email.',
        ];
        print_r(json_encode($response));
    }
} else {
    // Handle the case where the query to get userid fails
    $response = [
        'status' => 'error',
        'message' => 'Failed to retrieve userid for conReceiverID.',
    ];
    print_r(json_encode($response));
}
?>
