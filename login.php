<?php
session_start();


if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: list.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['logged_in'] = true;
        header("Location: list.php");
        exit();
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
</head>

<body>
    <h2>Silakan login untuk melihat data pengguna</h2>

    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="list.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>

</body>

</html>