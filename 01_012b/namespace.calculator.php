<?php

namespace calculator;

function add($numbers)
{
    return array_sum($numbers);
}

function subtract($start, $numbers)
{
    return $start - array_sum($numbers);
}

function multiply($numbers)
{
    return array_product($numbers);
}

function divide($start, $numbers)
{
    return $start / array_product($numbers);
}

function remainder($start, $numbers)
{
    foreach( $numbers as $num ) {
        $start = $start % $num;
        if ($start == 0) return $start;
    }

    return $start;
}

function average($numbers)
{
    return array_sum($numbers) / count($numbers);
}
