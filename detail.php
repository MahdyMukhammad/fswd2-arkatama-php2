<?php
include "database.php";
$id = $_GET["id"];
$detail = "SELECT * FROM user WHERE id = '$id'";
echo "Detail pengguna : <br>";
$hasil = $koneksi->query($detail);
$row = mysqli_fetch_array($hasil);
echo "
    id =" . $row['id'] . "<br>
    email =" . $row['email'] . "<br>
    name =" . $row['name'] . "<br>
    role =" . $row['role'] . "<br>";
if ($row['avatar'] == null) {
    echo "<img src = 'img/avatar.png' alt=''  width='100px'> <br>";
} else {
    echo "<img src='img/" . $row['avatar'] . "' width='100px'> <br>";
}
echo "
    no_hp = " . $row['no_hp'] . "<br>
    alamat = " . $row['alamat'] . "<br>
    password = " . $row['password'];
