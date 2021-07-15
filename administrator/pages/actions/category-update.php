<?php
require_once('../../includes/settings.config.php');
require_once('../../includes/category-class.php');

$Id = $_POST['Id'];
$Name = $_POST['Name'];
$ParentId = $_POST['ParentId'];



$updateCategory = new Category();
$result = $updateCategory->editCategory($Id,$Name,$ParentId);
if ($result ==  true) {
    header('Location:../categories.php');
}
    else {
      echo 'Category could not be updated.';
    }


?>