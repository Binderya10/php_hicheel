<?php

// Функц
function miniifuncner($a, $b="nom", $a1, $a2, $a3){
    // Хувьсагч
    $size = 2;
    $size = "Mongol uls";
    echo "<h1>".$size."</h1>";
    echo "<br>";

    // үйлдэл

    // хариу буцаах, Буцах утга
    if($a1 == "1206")
        return "zuv";
    else
        return "buruu";


    return "butsah utga";
}

echo miniifuncner(1,"text shuu", 1250,0,0);

// Класс
class ClassnameShuu{
    private number $a; // 1, 3, 10.105 , -1000
    private String $str; // Mongol uls shuu, tets ,123123
    private bool $tiimUgui; // true, false
    private text $t;

    //байгуулагч функ
    public function __construct()
    {

    }

    public function a(){
        return 5+10;
    }

    //protected
    private function b(){

    }
}

$classes = new ClassnameShuu();

echo $classes->a();



// Давталт
$total = 20;
echo "<br>";

for($i = 1; $i<=$total; $i++){
    echo $i."<br>";
}

// Нөхцөлт давталт
$b =5;
while ($b < $total){
    if($b == 5){
        $b = 20;
    }
    echo "text shuu<br>";
}

include ("hicheel02.php");
include("functions.php");

// functions.php Файл дээрээс функц дуудаж байна. include хийсэн файлаас функцийг нь дуудаж болдог
echo "<br>";
echo niilberOloh(100, 300);
echo "<br>";
NerHevleh("Bold-Ochir");