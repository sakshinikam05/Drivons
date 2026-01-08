<?php
include 'session.php';

// Debug: Log session values
error_log("Session Data: " . print_r($_SESSION, true));

// If a new car is selected, reset selected products
$resetProducts = !isset($_SESSION['car_selected']) || $_SESSION['car_selected'] === false;

header('Content-Type: application/json');
echo json_encode([
    "car_selected" => $_SESSION['car_selected'] ?? false,
    "selectedItems" => $_SESSION['selectedItems'] ?? [],
    "resetProducts" => $resetProducts
]);
?>
