<?php
include "db.php";

$result = $conn->query("SELECT nama, pesan, waktu FROM ucapan ORDER BY waktu DESC");
$ucapan = [];

while ($row = $result->fetch_assoc()) {
    $ucapan[] = $row;
}

header('Content-Type: application/json');
echo json_encode($ucapan);

$conn->close();
?>
