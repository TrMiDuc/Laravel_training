<?php

function format_number_with_space($number) 
{
    $number = preg_replace("[ ]","", $number);
    foreach (str_split($number, 3) as $part) {
        $formatted[] = $part;
    }
    return implode(' ', $formatted);
}
