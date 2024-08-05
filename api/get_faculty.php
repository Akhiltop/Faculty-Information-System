<?php
include '../config/db.php';

$sql = "SELECT * FROM faculty";
$result = $conn->query($sql);

$faculty = [];
while ($row = $result->fetch_assoc()) {
    $faculty[] = $row;
}

echo json_encode($faculty);

$conn->close();
?>
