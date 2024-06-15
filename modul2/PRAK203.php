<!DOCTYPE html>
<html>

<head>
    <title>Soal 3 - Muhammad Hafiz Ansari</title>
</head>

<body>
    <form action="" method="post">
        Nilai : <input type="number" name="nilai" value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : '' ?>"><br>
        Dari : <br>
        <input type="radio" name="dari" value="celcius" <?php echo isChecked("dari", "celcius"); ?>>Celcius<br>
        <input type="radio" name="dari" value="fahrenheit" <?php echo isChecked("dari", "fahrenheit"); ?>>Fahrenheit<br>
        <input type="radio" name="dari" value="reamur" <?php echo isChecked("dari", "reamur"); ?>>Reamur<br>
        <input type="radio" name="dari" value="kelvin" <?php echo isChecked("dari", "kelvin"); ?>>Kelvin<br>
        Ke : <br>
        <input type="radio" name="ke" value="celcius" <?php echo isChecked("ke", "celcius"); ?>>Celcius<br>
        <input type="radio" name="ke" value="fahrenheit" <?php echo isChecked("ke", "fahrenheit"); ?>>Fahrenheit<br>
        <input type="radio" name="ke" value="reamur" <?php echo isChecked("ke", "reamur"); ?>>Reamur<br>
        <input type="radio" name="ke" value="kelvin" <?php echo isChecked("ke", "kelvin"); ?>>Kelvin<br>
        <button type="submit" name="konversi">Konversi</button>
    </form>

    <?php
    if (isset($_POST["konversi"])) {
        $nilai = $_POST["nilai"];
        $from = $_POST["dari"];
        $to = $_POST["ke"];

        $konversi = [
            "celcius" => [
                "fahrenheit" => (9 / 5 * $nilai) + 32,
                "reamur" => 4 / 5 * $nilai,
                "kelvin" => $nilai + 273
            ],
            "fahrenheit" => [
                "celcius" => 5 / 9 * ($nilai - 32),
                "reamur" => 4 / 9 * ($nilai - 32),
                "kelvin" => 5 / 9 * ($nilai - 32) + 273
            ],
            "reamur" => [
                "celcius" => 5 / 4 * $nilai,
                "fahrenheit" => (9 / 4 * $nilai) + 32,
                "kelvin" => 5 / 4 * $nilai + 273
            ],
            "kelvin" => [
                "celcius" => $nilai - 273,
                "fahrenheit" => 9 / 5 * ($nilai - 273) + 32,
                "reamur" => 4 / 5 * ($nilai - 273)
            ]
        ];

        echo "<h1>Hasil Konversi: " . number_format($konversi[$from][$to], 1) . " &deg" . strtoupper(substr($to, 0, 1)) . "</h1>";
    }

    function isChecked($name, $value)
    {
        if (isset($_POST[$name]) && $_POST[$name] == $value) {
            return "checked";
        }
        return "";
    }
    ?>
</body>

</html>