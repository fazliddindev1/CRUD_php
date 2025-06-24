<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
if (!isset($_GET['id'])) {
  header("Location: index.php?message=No student ID given.");
  exit;
}
$id = $_GET['id'];

$result = mysqli_query($connection, "SELECT * FROM students WHERE id = $id");
$student = mysqli_fetch_assoc($result);
?>

<form method="POST">
  <div class="mb-3">
    <label>First Name</label>
    <input type="text" name="f_name" class="form-control" value="<?= htmlspecialchars($student['firs_name']) ?>" required>
  </div>
  <div class="mb-3">
    <label>Last Name</label>
    <input type="text" name="l_name" class="form-control" value="<?= htmlspecialchars($student['last_name']) ?>" required>
  </div>
  <div class="mb-3">
    <label>Age</label>
    <input type="number" name="age" class="form-control" value="<?= htmlspecialchars($student['age']) ?>" required>
  </div>
  <button type="submit" name="update_student" class="btn btn-success">Update</button>
  <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php
if (isset($_POST['update_student'])) {
  $fname = trim($_POST['f_name']);
  $lname = trim($_POST['l_name']);
  $age = trim($_POST['age']);

  if ($fname && $lname && is_numeric($age)) {
    $stmt = $connection->prepare("UPDATE students SET firs_name = ?, last_name = ?, age = ? WHERE id = ?");
    $stmt->bind_param("ssii", $fname, $lname, $age, $id);
    $stmt->execute();

    header("Location: index.php?update_msg=Student updated successfully");
    exit;
  } else {
    echo "<div class='alert alert-danger mt-3'>Please fill all fields correctly.</div>";
  }
}
?>

<?php include('footer.php'); ?>
