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

        echo "avatar name = " . $avatar;
        echo "avatar tmp =  " . $avatar_tmp;
        echo "<br>";

        $img_ex = pathinfo($avatar, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $avatarname = uniqid("IMG-", true) . '.' . $img_ex_lc;

        echo "avatar name new = " . $avatarname;

        $update = "UPDATE user SET email = '$email', name = '$name', `role` = '$role', avatar = '$avatarName', no_hp = '$no_hp', alamat = '$alamat', password = '$password'";

        if ($koneksi->query($update) === TRUE) {
            echo "Insert user Successfully <br>";
            $img_upload_path = 'image/' . $avatarname;
            move_uploaded_file($avatar_tmp, $img_upload_path);
        } else {
            echo "Error: " . $update . "<br>" . $koneksi->error;
        }

        $sql_read = "select * from user where id = $id";
        $result = $koneksi->query($sql_read);

        $row = mysqli_fetch_array($result);
        echo "id = " . $row['id'] . "<br>
    email = " . $row['email'] . "<br>
    name = " . $row['name'] . "<br>
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