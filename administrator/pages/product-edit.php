<?php

include_once('template_parts/admin-header.php');

$Id = $_GET['Id'];

include_once('../includes/category-class.php');
include_once('../includes/product-class.php');

$category = new Category();
$result2 = $category->getCategry();

$product = new Product();
$result = $product->getEditProduct($Id);



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
                            <h3 class="card-title">Product Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="actions/product-update.php" method="post" name="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="Name" value="<?php echo $result['Name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="ckeditor" id="ckeditor1" name="Description"><?php echo $result['Description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="CategoryId" required>
                                        <?php foreach ($result2 as $row) {
                                            if ($row['ParentId'] == 0) { ?>
                                                <option value="<?php echo $row['Id']; ?>"><?php echo $row['Name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="Image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span>Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Stock Code</label>
                                    <input type="text" class="form-control" name="Name" value="<?php echo $result['Name']; ?>" required>
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