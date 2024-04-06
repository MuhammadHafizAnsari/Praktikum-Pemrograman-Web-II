<?php

// Deklarasi Array
$daftarSmartphone = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung 
Galaxy A03", "Samsung Galaxy Xcover 5");
?>

<html>

<head>
    <style>
        table {
            font-family: sans-serif;
            color: #232323;
        }

        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <?php foreach ($daftarSmartphone as $ds) : ?>
            <tr>
                <td><?= $ds; ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>