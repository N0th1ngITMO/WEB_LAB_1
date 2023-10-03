<?php

function fourthQuarter($x, $y, $r)
{
    $d = ($x - $r) * (-$r) - $y * (-$r);
    return !($d <= 0) && $y <= 0 && $x >= 0;
}

function firstQuarter($x, $y, $r)
{
    return $x >= 0 && $x <= $r && $y >= 0 && $y <= $r;
}

function secondQuarter($x, $y, $r)
{
    return sqrt(pow($x, 2) + pow($y, 2)) <= $r/2 && $y >= 0 && $x <= 0;
}

function thirdQuarter($x, $y, $r){
    return false;
}

function checkArea($x, $y, $r)
{
    if (firstQuarter($x, $y, $r) || secondQuarter($x, $y, $r) || thirdQuarter($x, $y, $r) || fourthQuarter($x, $y, $r)) return 'Попадание!';
    return 'Промах!';
}