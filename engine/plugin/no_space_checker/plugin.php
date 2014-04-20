<?php

// Mengatasi input komentar tanpa spasi
function no_space_checker($teks, $max_txt = 57) {
    $split_text = explode(" ",$teks);
    $split_count = count($split_text);
    $max = $max_txt;

    for($i = 0; $i <= $split_count; $i++){
        if(strlen($split_text[$i]) >= $max){
            for($j = 0; $j <= strlen($split_text[$i]); $j++){
                $char[$j] = substr($split_text[$i],$j,1);
                if(($j % $max == 0) && ($j != 0)){
                    $result_text .= $char[$j] . ' ';
                }else{
                    $result_text .= $char[$j];
                }
            }
        }else{
            $result_text .= " " . $split_text[$i] . " ";
        }
    }

    return $result_text;
}