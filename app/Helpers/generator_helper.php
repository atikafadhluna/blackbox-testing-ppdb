<?php 

function enterAfterByWord($value, $num)
{
    // substring every $num character
    $result = '';
    $words = explode(' ', $value);
    foreach ($words as $i => $word) {
        $result .= $word . ' ';
        if (($i + 1) % $num == 0) {
            $result .= "<br>";
        }
    }
    return $result;
}

?>