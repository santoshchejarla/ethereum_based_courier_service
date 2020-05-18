<?php
$conn= new mysqli("localhost","root","JyothirmayeE@77","courier");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>