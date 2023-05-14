<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta nama="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <h1>Data Pengguna</h1>
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Aksi</th>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "database.php";
            $list = "select id, avatar, name, email, no_hp, role from user u;";

            $hasil_list = $koneksi->query($list);

            while ($row = mysqli_fetch_array($hasil_list)) {
                echo "<tr>
    <th scope='row'>" . $row['id'] . "</th>
    <td>
        <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
            <button type='button' class='btn btn-success'><a href=detail.php?id=" . $row['id'] . ">Detail</a></button>
            <button type='button' class='btn btn-warning'><a href=edit.php?id=" . $row['id'] . ">Edit</a></button>
            <button type='button' class='btn btn-danger'><a href=hapus.php?id=" . $row['id'] . ">Hapus</a></button>
        </div>
    </td>
    <td>";

                if ($row['avatar'] == null) {
                    echo "<img src='img/avatar.png' alt='' width='100px'>";
                } else {
                    echo "<img src='image/" . $row['avatar'] . "' width='100px'>";
                }
                echo "</td>
    <td>" . $row['name'] . "</td>
    <td>" . $row['email'] . "</td>
    <td>" . $row['no_hp'] . "</td>
    <td>" . $row['role'] . "</td>
    </tr>";
            }
            echo "</tbody>
</table>";
            echo "<br> <a href='add.php'><button type='button' class='btn btn-success'>Tambah User</button></a>"
            ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>