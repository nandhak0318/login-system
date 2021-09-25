<?php

$hostname = 'localhost';
$username = 'root';
$pass = '';
$db = 'signup_system';

$conn = new mysqli($hostname, $username, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
