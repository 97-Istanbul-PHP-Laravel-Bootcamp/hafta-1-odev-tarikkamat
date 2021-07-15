<?php
include_once('template_parts/admin-header.php');

include_once('../includes/user-class.php');
$users = new User();
$result = $users->getUsers();

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Administrator <small>v1.0</small></h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users</h3>
              <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  <li class="page-item"><a class="page-link" href="user-add.php">New User</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">Id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($result as $row) {

                  ?>
                    <tr>
                      <td><?php echo $row['Id']; ?></td>
                      <td><?php echo $row['Name']; ?></td>
                      <td><?php echo $row['Username']; ?></td>
                      <td>

                        <?php if ($row['Auth'] == 1) {
                        ?>
                          <span class="badge bg-info">User</span>
                        <?php } elseif ($row['Auth'] == 2) {
                        ?>
                          <span class="badge bg-warning">Admin</span>
                        <?php } else {
                        ?>
                          <span class="badge bg-danger">Su</span>
                        <?php } ?>

                      </td>
                      <td>
                        <div class="btn-group">
                          <?php if ($auth == 3 and ($row['Auth'] == 2 or $row['Auth'] == 1)) { ?>
                            <a href="user-edit.php?Id=<?php echo $row['Id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="actions/user-delete.php?Id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a>
                          <?php } elseif ($auth == 2 and $row['Auth'] == 1) { ?>
                            <a href="user-edit.php?Id=<?php echo $row['Id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="actions/user-delete.php?Id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a>
                          <?php } ?>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once('template_parts/admin-footer.php');
?>