<?php

session_start();
if (!isset($_SESSION['data']))
    $_SESSION['data'] = array();

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