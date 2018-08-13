<?php
$conn = new mysqli("localhost", "root", "root", "miniproject");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id = $_POST['id'];
$sql = "DELETE FROM data WHERE email='".$id."'";


if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>