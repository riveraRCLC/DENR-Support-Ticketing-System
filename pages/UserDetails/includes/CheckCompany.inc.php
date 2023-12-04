<?php

include("dbh.inc.php");
session_start();

$sql = "SELECT compname FROM company WHERE ";

$result = mysqli_query($conn, $sql);
$data = [];
while ($fetch = mysqli_fetch_assoc($result)) {
    $data[] = $fetch;
}
print_r(json_encode($data));
?>