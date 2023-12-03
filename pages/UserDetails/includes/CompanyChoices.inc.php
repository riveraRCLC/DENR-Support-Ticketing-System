<?php
 session_start();
include("dbh.inc.php");

// Assuming $_SESSION["id"] is the current user's ID


$sql = "SELECT compname FROM company";

$result = mysqli_query($conn, $sql);
$data = [];
while ($fetch = mysqli_fetch_assoc($result)) {
    $data[] = $fetch;
}
print_r(json_encode($data));
?>