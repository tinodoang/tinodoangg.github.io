<?php
session_start();
require "../koneksi.php";

if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
} else {
    $username = $password = "";
}
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($con, "SELECT * FROM pelanggan WHERE username = '$username' OR email = '$username'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            if (isset($_REQUEST["remember"])) {
                setcookie("username", $_REQUEST['username'], time() + 3600);
                setcookie("password", $_REQUEST['password'], time() + 3600);
            } else {
                setcookie("username", $_REQUEST['username'], time() - 10);
                setcookie("password", $_REQUEST['password'], time() - 10);
            }
            header("Location: ../index.php");
            exit();
        } else {
            echo "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo "<script> alert('User Not Registered'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nott Shop | User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .no-decoration {
        text-decoration: none;
        color: blue;
    }

    .form-box form .checkbox {
        display: inline-block;
        margin: 10px;
        width: auto;
        height: 25px;

    }
</style>

<body>
    <div class="container">
        <div class="box form-box ">
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $username ?>" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="<?php echo $password ?>" required>

                </div>
                <div>
                    <li class="checkbox">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                    </li>
                </div>
                <div>
                    <button class="btn btn-succes form-control mt-3" type="submit" name="submit">Login</button>
                </div>
                <div class="links">
                    Tidak Punya Akun? <a href="register.php" class="no-decoration">Registrasi</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>