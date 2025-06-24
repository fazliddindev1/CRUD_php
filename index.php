<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<!-- Flash Messages -->
<?php
$messages = ['message', 'insert_msg', 'update_msg', 'delete_msg'];
foreach ($messages as $msg) {
  if (isset($_GET[$msg])) {
    echo "<div class='alert alert-info'>" . htmlspecialchars($_GET[$msg]) . "</div>";
  }
}
?>

<!-- Add Button -->
<div class="mb-3 text-end">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Student</button>
</div>

<!-- Student Table -->
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM students";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['firs_name']}</td>
        <td>{$row['last_name']}</td>
        <td>{$row['age']}</td>
        <td>
          <a href='update_page.php?id={$row['id']}' class='btn btn-sm btn-success'>Edit</a>
          <form method='POST' action='delete_data.php' style='display:inline-block;' onsubmit='return confirm(\"Are you sure?\")'>
            <input type='hidden' name='delete_id' value='{$row['id']}'>
            <button type='submit' class='btn btn-sm btn-danger'>Delete</button>
          </form>
        </td>
      </tr>";
    }
    ?>
  </tbody>
</table>

<!-- Add Student Modal -->
<form action="insert_data.php" method="POST">
  <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title">Add Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="f_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="l_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Age</label>
            <input type="number" name="age" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="add_students" class="btn btn-success">Add</button>
        </div>
      </div>
    </div>
  </div>
</form>

<?php include('footer.php'); ?>
