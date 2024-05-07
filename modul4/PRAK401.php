<!DOCTYPE html>
<html>
<head>
    <title>Soal 1 - Muhammad Hafiz Ansari</title>
    <style>
        table, td{text-align : center; border-collapse : collapse;}
    </style>
</head>
<body>
    <form action="" method="post">
        Panjang : <input type="text" name="pjg" value="<?php if(isset($_POST['cetak'])){echo $_POST['pjg'];}?>">
        <br/>
        Lebar : <input type="text" name="lbr" value="<?php if(isset($_POST['cetak'])){echo $_POST['lbr'];}?>">
        <br/>
        Nilai : <input type="text" name="nilai" value="<?php if(isset($_POST['cetak'])){echo $_POST['nilai'];}?>">
        <br/>
        <input type="submit" value="Cetak" name="cetak">
    </form>

    <?php
        if(isset($_POST['cetak'])){
            $pjg = $_POST['pjg'];
            $lbr = $_POST['lbr'];
            $nilai = $_POST['nilai'];
            $nTabel = $pjg * $lbr;

            $nilaiPisah = explode (" ", $nilai);
            $n = count($nilaiPisah);

            if ($n == $nTabel) {
                echo "<br/>";
                $a = 0;
                for ($i=0; $i < $pjg; $i++) { 
                    for ($j=0; $j < $lbr; $j++) { 
                        $tampilNilai[$i][$j] = $nilaiPisah[$a];
                        $a++;
                    }
                }
                echo "<table border=1>";
                for ($i=0; $i < $pjg; $i++) { 
                    echo "<tr>";
                    for ($j=0; $j < $lbr; $j++) { 
                        echo "<td width=25px height=25px>".$tampilNilai[$i][$j]."</td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "<br/>";
                echo "Panjang nilai tidak sesuai dengan ukuran matriks";
            }
        }
    ?>
</body>
</html>