<?php

include_once('template_parts/admin-header.php');

include_once('../includes/category-class.php');
include_once('../includes/product-class.php');

$category = new Category();
$result2 = $category->getCategry();

$product = new Product();



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
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post" id="mutli_image" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="Name" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="ckeditor" id="ckeditor1" name="Description"></textarea>
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
                                    <label for="exampleInputEmail1">Stock Code</label>
                                    <input type="text" class="form-control" name="Name" placeholder="Stock code" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Images</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <form action="" method="post" id="mutli_image" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="Image">Images</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="Image[]" class="custom-file-input" id="Image" multiple accept=".jpg, .png, .gif">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="showImage"></div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        </form>
                        <script>
                            $(document).ready(function() {
                                $("#mutli_image").on("submit", function(e) {
                                    e.preventDefault();
                                    var imageName = $("#Image").val();
                                    if (imageName == "") {
                                        alert("Choose a image");
                                        return false;
                                    } else {
                                        $.ajax({
                                            url: "action/images-upload.php",
                                            data: new FormData(this),
                                            type: "post",
                                            processData: false,
                                            cache: false,
                                            contentType: false,
                                            success: function(e) {
                                                alert(e);
                                            }
                                        });
                                    }
                                });
                            });
                        </script>
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