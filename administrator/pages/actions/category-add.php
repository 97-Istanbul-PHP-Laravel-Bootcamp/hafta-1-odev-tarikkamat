<?php
require_once('../../includes/settings.config.php');
require_once('../../includes/category-class.php');

$Name = $_POST['Name'];
$ParentId = $_POST['ParentId'];


$addCategory = new Category();
$result = $addCategory->addCategory($Name,$ParentId);
if ($result == true) {
    header('Location:../categories.php');
}
    else {
      echo 'Category could not be added.';
    }


?>