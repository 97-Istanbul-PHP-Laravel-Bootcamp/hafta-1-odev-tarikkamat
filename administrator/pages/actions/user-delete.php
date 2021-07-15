<?php

require_once('../../includes/settings.config.php');
require_once('../../includes/user-class.php');

$Id = $_GET['Id'];

$deleteUser = new User();
$result = $deleteUser->deleteUser($Id);
if ($result ==  true) {
    header('Location:../users.php');
}
    else {
      echo 'User could not be deleted.';
    }

?>
