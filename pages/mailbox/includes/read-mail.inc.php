<?php
session_start();
include("dbh.inc.php");
$tempConvoid = $_POST['tempConvoid'];
$tempTicketNum = $_POST['tempTicketNum'];

// Assuming $_SESSION["id"] is the current user's ID
$userId = $_SESSION["id"];

$sql = "SELECT c.convoid, c.ticketid, c.convonum, c.conSenderID, c.conReceiverID, c.conSub, c.conbody, c.condate, t.ticketnum, u.ufname, u.ulname
        FROM conversation c
        JOIN ticket t ON c.ticketid = t.ticketid
        JOIN user u ON c.conSenderID = u.userid
        WHERE c.ticketid = $tempTicketNum AND c.convoid <> $tempConvoid AND c.conReceiverID = $userId";

$result = mysqli_query($conn, $sql);
$data = [];
while ($fetch = mysqli_fetch_assoc($result)) {
    $data[] = $fetch;
}
print_r(json_encode($data));
?>