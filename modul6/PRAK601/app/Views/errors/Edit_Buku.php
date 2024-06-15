<!-- app/Views/edit_buku.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Buku</h1>
        <form action="<?= site_url('buku/update/'.$buku['id']); ?>" method="post">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" value="<?= esc($buku['judul']); ?>" required>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" name="penulis" id="penulis" value="<?= esc($buku['penulis']); ?>" required>
            </div>
            <div the="form-group">
                <label for="penerbit">Penerbit:</label>
                <input type="text" name="penerbit" id="penerbit" value="<?= esc($buku['penerbit']); ?>" required>
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" value="<?= esc($buku['tahun_terbit']); ?>" required min="1801" max="2023">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
