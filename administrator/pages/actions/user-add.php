<?php
require_once('../../includes/settings.config.php');
require_once('../../includes/user-class.php');

$Name = $_POST['Name'];
$Surname = $_POST['Surname'];
$Username = $_POST['Username'];
$Pass = md5($_POST['Pass']);
$Mail = $_POST['Mail'];
$Auth = $_POST['Auth'];


$addUser = new User();
$result = $addUser->addUser($Name,$Surname,$Username,$Pass,$Mail,$Auth);
if ($result == true) {
    header('Location:../users.php');
}
    else {
      echo 'User could not be added.';
    }


?>