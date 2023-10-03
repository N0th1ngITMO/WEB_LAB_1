<?php
require_once 'AreaChecker.php';
require_once 'ValuesValidators.php';

function pushData(): void
{
    foreach ($_SESSION['data'] as $elem){
        echo '<tr>
    <td>' . $elem['x'] . ' </td>
    <td>' . $elem['y'] . '</td>
    <td> ' . $elem['r'] . '</td>
    <td>' . $elem['ct'] . '</td>
    <td>' . $elem['end'] . '</td>';
        if ($elem['res'] == 'Промах!') {
            echo '<td class="lose">' . $elem['res'] . '</td>
</tr>';
        } else {
            echo '<td class="win">' . $elem['res'] . '</td>
</tr>';
        }
    }
}

session_start();
if (!isset($_SESSION['data']))
    $_SESSION['data'] = array();

if (isset($_GET['y']) && isset($_GET['x']) && isset($_GET['r']) && isset($_GET['timezone'])) {
    $y = $_GET['y'];
    $x = $_GET['x'];
    $r = $_GET['r'];
    $current_time = $_GET['timezone'];
    if (validateAll($x, $y, $r)) {
        $result = checkArea($x, $y, $r);
        $end = round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"], 5);
        $answer = array('x'=>$x, 'y'=>$y, 'r'=>$r, 'ct'=>$current_time, 'end'=>$end, 'res'=>$result);
        array_push($_SESSION['data'], $answer);
        pushData();
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(400);
}