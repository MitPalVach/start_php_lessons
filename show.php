<?php

$apps = file('shapka.txt');

echo '<table>';

foreach ($apps as $line) {
    $arr = explode('-|-', $line);
    echo '<tr>';

    foreach ($arr as $one) {
        echo "<td>$one</td>";
    }
    echo '</tr>';
}

echo '</table>';

?>

<style>
    table, td {
        border: 1px solid #000000;
        border-collapse: collapse;
        padding: 5px 15px;
        font-size: 25px;
        line-height: 30px;
    }
</style>








































