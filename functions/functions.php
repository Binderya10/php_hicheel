<?php
function NerHevleh($nershuu){
    echo $nershuu;
}

function niilberOloh($a, $b){
    $total = $a + $b;
    return $total;
}

function fileNameGenegerate($file){
    // ном.doc
    $extention = pathinfo($file, PATHINFO_EXTENSION); // doc

    $onlyName = str_replace($extention, '', $file); // ном.
    $onlyNameShuu = str_replace('.', '', $onlyName); // ном

    $ret = $onlyNameShuu. "-". uniqid(). ".".$extention; // ном-!23asasfsdf.doc

    return $ret;
}

function truncate($str, $lenght){
    return strtok(wordwrap($str, $lenght, '...'), "\n");
}