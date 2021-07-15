<?php
require_once('../../includes/settings.config.php');
require_once('../../includes/user-class.php');

$Id = $_POST['Id'];
$Username = $_POST['Username'];
$Pass = md5($_POST['Pass']);
$Auth = $_POST['Auth'];


$updateUser = new User();
$result = $updateUser->editUser($Id,$Username,$Pass,$Auth);
if ($result ==  true) {
    header('Location:../users.php');
}
    else {
      echo 'User could not be updated.';
    }


?>