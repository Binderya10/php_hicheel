<?php
date_default_timezone_set('Asia/Ulaanbaatar');
$conn = mysqli_connect('localhost', 'root', '', 'profile');
$conn->set_charset('utf8mb4');
//$stmt = $conn->prepare("SET GLOBAL time_zone = '+8:00'");
//$stmt->execute();