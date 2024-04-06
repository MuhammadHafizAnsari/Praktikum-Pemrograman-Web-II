<?php
$r = 5;
$t = 10;

$volume = 1/3 * pi() * pow($r, 2) * $t;

echo number_format($volume, 3)."m3";
?>