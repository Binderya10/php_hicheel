<?php
session_start();

//if(isset($_SESSION['email']) == false){ // true false
if(!isset($_SESSION['email'])){ // true false
    // false
    header("location: login.php?error=2");
}
?>
<html>
<head>
    <title>Admin веб</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="script/jquery-3.7.1.min.js"></script>
    <script src="script/script.js"></script>
</head>
<body>




<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col">
                    <img src="image/mongol.jpg" width="200px">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Үндсэн цэс
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="newslist.php">Мэдээ</a></li>
                            <li><a class="dropdown-item" href="categorylist.php">Ангилал</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row border-bottom p-3">
                <div class="col text-end">
                    <?php
                    echo $_SESSION['email'];
                    ?> | <a href="logout.php">Гарах</a>
                </div>
            </div>
            <div class="row">
                <div class="col">