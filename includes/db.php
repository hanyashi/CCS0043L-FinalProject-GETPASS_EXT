<?php
$host = 'sql12.freesqldatabase.com';
$db = 'sql12789991';
$user = 'sql12789991';
$pass = 'QWDlbG56Dx';
$port = 3306;

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}
?>