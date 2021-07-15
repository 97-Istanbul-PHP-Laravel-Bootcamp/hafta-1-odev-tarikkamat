<?php
include_once('template_parts/admin-header.php');
$Id = $_GET['Id'];
include_once('../includes/user-class.php');
$user = new User();
$result = $user->getEditUser($Id);
?>
<?php if ($result['Auth'] == 3) {
    echo '<h1>su account cannot be changed. </h1>';
} ?>
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
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">User Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="actions/user-update.php" method="post" name="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" name="Username" value="<?php echo $result['Username']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="Pass" placeholder="*******" required>
                                </div>
                                <div class="form-group">
                                    <label>Auth</label>
                                    <select class="form-control" name="Auth" required>
                                        <option value="2">Admin</option>
                                        <option value="1">User</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="Id" name="Id" value="<?php echo $result['Id']; ?>">
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
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