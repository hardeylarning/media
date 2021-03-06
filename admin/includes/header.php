<?php include "includes/db.php";?>
<?php include "../admin/catFunction.php";?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="b4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <title>Quality Express</title>
</head>
<body class="bg-light">
<div class="jumbotron-fluid bg-dark sticky-top">
    <nav class="navbar navbar-expand-md navbar-dark">
        <a href="" class="navbar-brand ">
            <h4 class="mb-0 mr-5"> ROCKMEDIA &reg;</h4>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#main">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around" id="main">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown "><a href="musics.php" class="nav-link" data-toggle="dropdown">
                        <i class="fa fa-user"><?php echo $_SESSION['username']; ?></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="" class="dropdown-item">Profile</a>
                        <a href="../includes/logout.php" class="dropdown-item"><i class="fa fa-sign-out"></i>Log Out</a>
                        <a href="" class="dropdown-item">Settings</a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</div>