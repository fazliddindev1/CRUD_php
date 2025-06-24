<?php
include('dbcon.php');

if (isset($_POST['add_students'])) {
  $fname = trim($_POST['f_name']);
  $lname = trim($_POST['l_name']);
  $age = trim($_POST['age']);

  if ($fname && $lname && is_numeric($age)) {
    $stmt = $connection->prepare("INSERT INTO students (firs_name, last_name, age) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $fname, $lname, $age);
    $stmt->execute();

    header("Location: index.php?insert_msg=Student added successfully");
    exit;
  } else {
    header("Location: index.php?message=Please fill all fields correctly.");
    exit;
  }
}
?>
