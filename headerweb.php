<?php
include "config.php";
include "database.php";
include "functions/functions.php";

?>
<html>
<head>
    <title><?php echo $SITE_TITLE;?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/custome.css" rel="stylesheet">
    <script src="script/jquery-3.7.1.min.js"></script>
    <script src="script/scriptweb.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col py-3">
            <img src="image/mongol.jpg" width="200">
        </div>
        <div class="col text-end py-3">
            <a href="login.php">Нэвтрэх</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <nav class="nav">
                <a class="nav-link active" aria-current="page" href="index.php">Нүүр</a>
                <a class="nav-link" href="#">Мэдээ</a>
            </nav>
        </div>
    </div>