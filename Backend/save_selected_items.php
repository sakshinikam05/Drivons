<?php
session_start();

// Set response header to JSON
header("Content-Type: application/json");

// Read the JSON data from the request
$data = json_decode(file_get_contents("php://input"), true);

// Validate received data
if (!isset($data['selectedItems']) || !is_array($data['selectedItems'])) {
    echo json_encode(["success" => false, "message" => "Invalid data received"]);
    exit;
}

// Save selected items to the session
$_SESSION['selectedItems'] = $data['selectedItems'];

echo json_encode(["success" => true, "message" => "Items saved to session"]);
?>
