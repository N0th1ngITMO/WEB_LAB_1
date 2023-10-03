<?php

function validateRValue($r): bool
{
    return !($r == null || $r < 1 || $r > 3);
}

function validateYValue($y): bool
{
    return !(is_nan($y) || $y < -5 || $y > 5);
}

function validateXValue($x): bool
{
    return !(is_nan($x) || $x < -5 || $x > 3);
}

function validateAll($x, $y, $r): bool
{
    return validateXValue($x) && validateYValue($y) && validateRValue($r);
}