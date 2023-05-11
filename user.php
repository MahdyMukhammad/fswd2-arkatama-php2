<?php
if (isset($_POST['submit']) && isset($_FILES['avatar'])) {
    include "database.php";
    echo "Halaman User. <br>";

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $avatar = $_FILES['avatar']['nama'];
    $avatar_tmp = $_FILES['avatar']['tmp_nama'];

    echo "avatar nama = " . $avatar;
    echo "avatar tmp =  " . $avatar_tmp;
    echo "<br>";

    $img_ex = pathinfo($avatar, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $avatarName = uniqid("IMG-", true) . '.' . $img_ex_lc;

    echo "avatar nama new = " . $avatarName;

    $sql_post = "INSERT INTO user (id, email, nama, `role` , avatar, no_hp, alamat, password , created_at, updated_at) VALUES ('$id', '$email', '$nama', '$role', '$avatarName', '$no_hp', '$alamat', '$password', DEFAULT, DEFAULT);";

    if ($conn->query($sql_post) === TRUE) {
        echo "Insert user Successfully <br>";
        $img_upload_path = 'image/' . $avatarName;
        move_uploaded_file($avatar_tmp, $img_upload_path);
    } else {
        echo "Error: " . $sql_post . "<br>" . $conn->error;
    }

    $sql_read = "select * from user where id = $id";
    $result = $conn->query($sql_read);

    $row = mysqli_fetch_array($result);
    echo "id = " . $row['id'] . "<br>
    email = " . $row['email'] . "<br>
    nama = " . $row['nama'] . "<br>
    role = " . $row['role'] . "<br>
    avatar = <img src='image/" . $row['avatar'] . "' width = 150px> <br>
    no_hp = " . $row['no_hp'] . "<br>
    alamat = " . $row['alamat'] . "<br>
    password = " . $row['password'] . "<br>
    created_at = " . $row['created_at'] . "<br>
    updated_at = " . $row['updated_at'];
} else {
    echo "error";
}
