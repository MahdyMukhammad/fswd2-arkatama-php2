<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>
</head>

<body>
    <?php
    if (isset($_POST['submit']) && isset($_FILES['avatar'])) {
        include "database.php";
        echo "Halaman User. <br>";

        $id = $_POST['id'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $avatar = $_FILES['avatar']['name'];
        $avatar_tmp = $_FILES['avatar']['tmp_name'];

        "avatar name = " . $avatar;
        "avatar tmp =  " . $avatar_tmp;
        "<br>";

        $img_ex = pathinfo($avatar, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $avatarname = uniqid("IMG-", true) . '.' . $img_ex_lc;

        $sql_post = "INSERT INTO user (id, email, name, `role` , avatar, no_hp, alamat, password) VALUES ('$id', '$email', '$name', '$role', '$avatarname', '$no_hp', '$alamat', '$password');";

        if ($koneksi->query($sql_post) === TRUE) {
            echo "Insert user Successfully <br>";
            $img_upload_path = 'img/' . $avatarname;
            move_uploaded_file($avatar_tmp, $img_upload_path);
        } else {
            echo "Error: " . $sql_post . "<br>" . $koneksi->error;
        }

        $sql_read = "select * from user where id = $id";
        $result = $koneksi->query($sql_read);

        $row = mysqli_fetch_array($result);
        echo "id = " . $row['id'] . "<br>
    email = " . $row['email'] . "<br>
    name = " . $row['name'] . "<br>
    role = " . $row['role'] . "<br>
    avatar = <img src='img/" . $row['avatar'] . "' width = 150px> <br>
    no_hp = " . $row['no_hp'] . "<br>
    alamat = " . $row['alamat'] . "<br>
    password = " . $row['password'];
    } else {
        echo "error";
    }
    echo "<br> <a href='list.php'><button type='button' class='btn btn-success'>List User</button></a>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>