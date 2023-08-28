<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "yy8isgufrw4g";
$dbPassword = "DrSm@rt2020";
$dbName     = "drsmart";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>