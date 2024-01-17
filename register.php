<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nott Shop | User Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .no-decoration{
        text-decoration: none;
        color: blue;
    }
</style>

<body>
    <div class="container">
        <div class="box form-box">

            <?php
            include("../koneksi.php");
            if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $verify_query = mysqli_query($con, "SELECT email FROM pelanggan WHERE email='$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
            <p>Email Ini Sudah Digunakan</p></div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Kembali</button></a>";
                } else {
                    mysqli_query($con, "INSERT INTO pelanggan(nama, email, username, password) VALUES('$nama', '$email', '$username', '$password')") or die("error");

                    echo "<div class='message'>
            <p>Berhasil Registrasi</p></div> <br>";
                    echo "<a href='login.php'><button class='btn'>Login</button></a>";
                }
            } else {

            ?>

                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Registrasi" required>
                    </div>
                    <div class="links">
                        Sudah Punya Akun? <a href="login.php" class="no-decoration">Login</a>
                    </div>
                </form>
        </div>
    <?php } ?>
    </div>
</body>