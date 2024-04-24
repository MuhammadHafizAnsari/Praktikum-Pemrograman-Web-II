<!DOCTYPE html>
<html>

<head>
    <title>Soal 4 - Muhammad Hafiz Ansari</title>
</head>

<body>
    <form action="" method="post">
        Nilai : <input type="number" name="nilai" value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : '' ?>" min="0" required><br>
        <button type="submit" name="konversi">Konversi</button>
    </form>
    <?php

    if (isset($_POST["konversi"])) {
        echo "<h1>";
        if (!empty($_POST["nilai"]) or empty($_POST["nilai"])) {
            echo "Hasil: ";
        }
        if ($_POST["nilai"] == 0) {
            echo "nol";
        } elseif ($_POST["nilai"] >= 1 and $_POST["nilai"] <= 9) {
            echo "satuan";
        } elseif ($_POST["nilai"] >= 11 and $_POST["nilai"] <= 19) {
            echo "belasan";
        } elseif ($_POST["nilai"] >= 10 and $_POST["nilai"] <= 99) {
            echo "puluhan";
        } elseif ($_POST["nilai"] >= 100 and $_POST["nilai"] <= 999) {
            echo "ratusan";
        } elseif ($_POST["nilai"] >= 1000) {
            echo "Anda menginput melebihi limit bilangan";
        }
        echo "</h1>";
    }
    ?>
</body>

</html>