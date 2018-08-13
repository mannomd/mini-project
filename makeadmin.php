<?php
$conn = new mysqli("localhost", "root", "root", "miniproject");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id = $_GET['id'];
$sql = "UPDATE data SET isadmin=1 where email='".$id."'";
$query=$conn->query($sql);

if ($query === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>