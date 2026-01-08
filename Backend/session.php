<?php
session_start();

// Set session lifetime to 1 hour (3600 seconds)
$session_lifetime = 7200; // 2 hour

// Extend session lifetime if the user is active
if (isset($_SESSION['user_id'])) {
    setcookie(session_name(), session_id(), time() + $session_lifetime, "/");
}
?>
