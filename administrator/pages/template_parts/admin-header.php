<?php

session_start();
if ($_SESSION['session']==false) {
  header("Location:../index.php");
}

$uid = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$auth = $_SESSION['auth'];

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../theme_folder/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../theme_folder/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="home.php" class="navbar-brand">
        <span class="brand-text font-weight-light">Administrator</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="home.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="categories.php" class="nav-link">Categories</a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link">Products</a>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link">Users</a>
          </li>
        </ul>
      </div>
      

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">
              <?php 
                if ($name !=null) {
                  echo 'Hi, '.$name.'!'; 
                }else {
                  echo 'Hi!';
                }
              ?>
            </span>
            <?php if($auth == 2){ ?>
            <div class="dropdown-divider"></div>
            <a href="user-edit.php?Id=<?php echo $uid; ?>" class="dropdown-item">
            <i class="fas fa-users-cog"></i> User Settings
            </a>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-th-large"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Settings</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-cog"></i> Site Settings
            </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->