<?php
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
  $id = $_POST['delete_id'];

  $stmt = $connection->prepare("DELETE FROM students WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  header("Location: index.php?delete_msg=Student deleted.");
  exit;
}
?>
