<?php

include("dbh.inc.php");


$sql = "SELECT compname FROM company";

$result = mysqli_query($conn, $sql);
$data = [];
while ($fetch = mysqli_fetch_assoc($result)) {
    $data[] = $fetch;
}
print_r(json_encode($data));
?>