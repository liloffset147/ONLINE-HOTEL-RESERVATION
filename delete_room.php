<?php
require_once 'connect.php';

// Check if room_id is provided
if (!isset($_REQUEST['room_id'])) {
    die("Error: Room ID not provided.");
}

// Prepare and execute the delete query
$stmt = $conn->prepare("DELETE FROM `room` WHERE `room_id` = ?");
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$room_id = $_REQUEST['room_id'];
$stmt->bind_param("i", $room_id); // Assuming room_id is an integer

if ($stmt->execute()) {
    $stmt->close();
    header("location: room.php");
    exit();
} else {
    die("Error executing query: " . $stmt->error);
}
?>