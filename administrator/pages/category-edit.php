<?php
include_once('template_parts/admin-header.php');
$Id = $_GET['Id'];
include_once('../includes/category-class.php');
$category = new Category();
$result = $category->getEditCategory($Id);
$result2 = $category->getCategry();

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
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Category Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="actions/category-update.php" method="post" name="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="Name" value="<?php echo $result['Name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select class="form-control" name="ParentId" required>
                                    <?php if ($result['ParentId'] != 0) {
                                        global $db;
                                        $resultParentId = $result['ParentId'];
                                        $query = $db->query("SELECT Id,Name,ParentId FROM categories WHERE Id = '$resultParentId'")->fetch(PDO::FETCH_ASSOC); ?>
                                        <option value="<?php echo $query['Id'] ?>"><?php echo $query['Name']; ?></option>
                                        <?php } ?> 
                                        <option value="0">None</option>
                                        <?php foreach ($result2 as $row) {
                                        if ($row['ParentId'] == 0 && $row['Id'] != $Id && $query['Id'] != $row['Id']) { ?>
                                            <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
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