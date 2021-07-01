<?php
$conn = new mysqli('localhost', 'root', '', 'quick_search');
if ($conn->connect_error) {
    die('connection failed' . $conn->connect_error);
}
return $conn;
?>
