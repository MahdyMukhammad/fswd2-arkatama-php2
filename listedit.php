<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1>Hasil Edit Pengguna</h1>
    <?php
    if (isset($_POST['submit']) && isset($_FILES['avatar'])) {
        include "database.php";

        $id = $_GET['id'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $avatar = $_FILES['avatar']['name'];
        $avatar_tmp = $_FILES['avatar']['tmp_name'];

        $img_ex = pathinfo($avatar, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $avatarname = uniqid("IMG-", true) . '.' . $img_ex_lc;

        $update = "UPDATE user SET email = '$email', name = '$name', `role` = '$role', avatar = '$avatarname', no_hp = '$no_hp', alamat = '$alamat', password = '$password'";

        if ($koneksi->query($update) === TRUE) {
            echo "Insert user Successfully <br>";
            $img_upload_path = 'img/' . $avatarname;
            move_uploaded_file($avatar_tmp, $img_upload_path);
        } else {
            echo "Error: " . $update . "<br>" . $koneksi->error;
        }

        $sql_read = "select * from user where id = $id";
        $result = $koneksi->query($sql_read);

        $row = mysqli_fetch_array($result);
        echo "<table class ='table'>
        <thead>
            <tr class='table-primary'>
                <th scope='col'>ID</th>
                <th scope='col'>Aksi</th>
                <th scope='col'>Avatar</th>
                <th scope='col'>Nama</th>
                <th scope='col'>Email</th>
                <th scope='col'>NO HP</th>
                <th scope='col'>Role</th>
            </tr>
        </thead>
        <tbody>
            <tr>
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
            echo "<img src='img/" . $row['avatar'] . "' width='100px'>";
        }
        echo "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['no_hp'] . "</td>
                <td>" . $row['role'] . "</td>
            </tr>
        </tbody>";
    }
    echo "<br> <a href='list.php'><button type='button' class='btn btn-success'>List User</button></a>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>