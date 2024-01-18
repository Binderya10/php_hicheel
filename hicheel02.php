<?php

//  Session эхлүүлж байна
session_start();

// Сешшион утгаж байна
session_abort();

session_commit();

session_cache_expire();

session_unset();


// php функцууд байдаг
$str = "Mongol uls";
echo strlen($str);
echo "<br>";
$text = substr("Mongol uls",3, 3);
echo $text;