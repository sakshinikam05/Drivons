<?php
session_start();
$_SESSION['car_selected'] = false;
echo json_encode(["success" => true]);
?>