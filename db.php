<?php
$host = "localhost";
$user = "root"; // change if hosted
$pass = "";
$db = "filmesmora";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
