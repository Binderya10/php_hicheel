<?php
include ("database.php");
if(isset($_GET['id'])){
    $number = (int)$_GET['id'];
    if($number != 0){
        // Устгах үйлдэл
        $stmt = $conn->prepare("delete from category where id = ?");
        $stmt->bind_param('s', $_GET['id']);
        $stmt->execute();
    }
}