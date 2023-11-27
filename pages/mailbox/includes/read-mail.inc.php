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
        WHERE c.ticketid = ? AND c.convoid <> ? AND c.conReceiverID = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "iii", $tempTicketNum, $tempConvoid, $userId);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die('Error in SQL query: ' . mysqli_error($conn));
}

$data = [];
while ($fetch = mysqli_fetch_assoc($result)) {
    $data[] = $fetch;
}

print_r(json_encode($data));
?>