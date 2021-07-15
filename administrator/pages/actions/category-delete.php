<?php

require_once('../../includes/settings.config.php');
require_once('../../includes/category-class.php');

$Id = $_GET['Id'];

$deleteCategory = new Category();
$result = $deleteCategory->deleteCategory($Id);
if ($result ==  true) {
    header('Location:../categories.php');
}
    else {
      echo 'Category could not be deleted.';
    }

?>
