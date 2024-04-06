<?php
$celsius = 37.841;

$fahrenheit = ($celsius * 9/5) + 32;

$reamur = $celsius * 4/5;

$kelvin = $celsius + 273.15;

echo "Fahrenheit (F) = " . number_format($fahrenheit, 4) . "<br>";
echo "Reamur (R) = " . number_format($reamur, 4) . "<br>";
echo "Kelvin (K) = " . number_format($kelvin, 4) . "<br>";
?>
