<?php
include "database.php";
$id = $_GET["id"];
$sql_del = "DELETE FROM user WHERE id ='$id'";
if ($koneksi->query($sql_del) === TRUE) {
    echo "Berhasil dihapus";
} else {
    echo "Gagal menghapus";
}
