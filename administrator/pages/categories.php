<?php
include_once('template_parts/admin-header.php');

include_once('../includes/category-class.php');
$categories = new Category();
$result = $categories->getCategry();
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
              <h3 class="card-title">Categories</h3>

              <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  <li class="page-item"><a class="page-link" href="category-add.php">New Category</a></li>
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
                    <th>Parent Id</th>
                    <th style="width: 30px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($result as $row) { ?>
                    <tr>
                      <td><?php echo $row['Id'] ?></td>
                      <td><?php echo $row['Name'] ?></td>
                      <td>
                        <?php if ($row['ParentId'] != 0) {
                          global $db;
                          $resultParentId = $row['ParentId'];
                          $query = $db->query("SELECT Id,Name,ParentId FROM categories WHERE Id = '$resultParentId'")->fetch(PDO::FETCH_ASSOC);
                          echo $query['Name'];
                        }else {
                          echo 'None';
                        } ?>
                      </td>
                      <td>
                        <div class="btn-group">
                          <a href="category-edit.php?Id=<?php echo $row['Id']; ?>" class="btn btn-primary">Edit</a>
                          <a href="actions/category-delete.php?Id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a>
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