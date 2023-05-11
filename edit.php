<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "database.php";
    ?>
    <form action="list.php" method="get">
        <div class="container">
            <h1>EDIT PENGGUNA</h1>
            <div class="col" style="margin: 20px;">
                <label class="namem-label" for="id">Id Pengguna</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Id">
            </div>
            <div class="mb-3" style="margin: 20px;">
                <label class="form-label" for="formGroup">NAMA</label>
                <input type="text" class="form-control" id="formGroup" placeholder="Masukkan Nama Anda" name="nama">
            </div>
            <div class="row" style="margin: 20px;">
                <div class="col">
                    <label class="form-label" for="role">ROLE</label>
                    <select id="role" name="role" class="form-select">
                        <option selected>Pilih Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label" for="password">PASSWORD</label>
                    <input type="text" class="form-control" id="password" placeholder="Masukkan Password Anda" name="password">
                </div>
            </div>
            <div class="row" style="margin: 20px;">
                <div class="col">
                    <label class="form-label" for="email">EMAIL</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan Email Anda" name="email">
                </div>
                <div class="col">
                    <label class="form-label" for="no_hp">NO. HP</label>
                    <input type="text" class="form-control" id="no_hp" placeholder="Masukkan No. HP Anda" name="no_hp">
                </div>
            </div>
            <div class="form-floating" style="margin: 20px;">
                <label class="form-label" for="alamat">ALAMAT LENGKAP</label>
                <textarea class="form-control" id="alamat" placeholder="Leave a comment here" name="alamat" style="height: 100px"></textarea>
            </div>
            <div class="mb-3" style="margin: 20px;">
                <label class="form-label" for="formFile">UNGGAH FOTO</label>
                <input class="form-control" type="file" id="formFile" name="foto">
            </div>
            <div>
                <input type="submit" name="submit" value="Tambah Pengguna">
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>