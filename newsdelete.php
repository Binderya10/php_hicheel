<?php
include ("database.php");
//echo $_GET['id'];
//echo is_int($_GET['id']);
if(isset($_GET['id'])){
    $number = (int)$_GET['id'];
    if($number != 0){
//        echo "OK";
        $stmt = $conn->prepare("delete from news where id = ?");
        $stmt->bind_param('s', $_GET['id']);
        $stmt->execute();
    }
}