<?php
//
//$a = 5;
//function print_some($a)
//{
//    $a = 10;
//    echo $a . '<br>';
//}
//
//echo $a . '<br>';
//print_some($a);
//echo $a . '<br>';

//  ====================================================================================================================

//function area($r)
//{
//    return 3.14 * $r * $r;
//}
//
//$r1 = area(5);
//$r2 = area(3);
//
//echo "$r1 - $r2 = " . ($r1 - $r2);

//  ====================================================================================================================

$i = 1;

while ($i < 10) {
    echo $i;
    $i++;
}

?>


<!--=======-->

<select name="" id="">

    <?php
    $j = 1910;
    while ($j <= 2010) {
        echo "<option value=\"$j\">$j</option>";
        $j++;

    }
    ?>
</select>


<!--========-->


<select name="" id="">

    <?php
    for ($k = 1910; $k <= 2010; $k += 2) {
        echo "<option value=\"$k\">$k</option>";


    }

    ?>
</select>


















































