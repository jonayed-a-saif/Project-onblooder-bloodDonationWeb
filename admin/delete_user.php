<?php
include 'config.php';
$id=$_GET['id'];
// sql to delete a record
$sql = "DELETE FROM user WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: all_user.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>