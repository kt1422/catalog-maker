<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title><?php echo ucfirst($_GET['page']); ?> - Catalog Maker</title>
    <style>
        .active {
            color: yellow !important;
        }
        .thumbnail {
            width: 70px;
            height: 70px;
        }
    </style>
</head>
<body>
<?php
include './controllers/controller.php';
session_start();
if(isset($_GET['action']) && $_GET['action']=="logout"){
    logout();
}elseif(isset($_SESSION['user'])){
    if(isset($_GET['page'])){
        if($_GET['page']=="login"){
            header("Location: ./index.php?page=home");
        }
        include './views/nav.php';
        include './views/'.$_GET['page'].'.php';
    }else{
        header("Location: ./index.php?page=home");
    }
}else{
    if(isset($_GET['page']) && $_GET['page']=="login"){
        include './views/login.php';
    }else{
        header("Location: ./index.php?page=login");
    }
}
?>
</body>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</html>