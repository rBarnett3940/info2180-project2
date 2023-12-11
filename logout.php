<?php
session_start();

// Remove all session variables
session_unset();

// Destroy the session
session_destroy();

// Respond with a JSON success message
echo json_encode(["success" => true]);
?>