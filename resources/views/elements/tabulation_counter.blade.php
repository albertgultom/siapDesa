<?php
$x = 0;
$y = '';
foreach ($tabulations as $t) {
    # code...
    $x += $t['numeral'];
    $y = $t['identity'];
}
echo $x.' '.$y;
?>