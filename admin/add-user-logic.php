<?php
require "config/database.php";

// jika submit button di click ambil datanya

if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createPass = filter_var($_POST['createpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmPass = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // validasi input
    if (!$firstname) {
        $_SESSION['add-user'] = "Masukan Nama Depan Anda";
    } else if (!$lastname) {
        $_SESSION['add-user'] = "Masukan Nama Belakang Anda";
    } else if (!$lastname) {
        $_SESSION['add-user'] = "Masukan Nama Belakang Anda";
    } else if (!$username) {
        $_SESSION['add-user'] = "Masukan User Name Anda";
    } else if (!$email) {
        $_SESSION['add-user'] = "Masukan Email Valid Anda";
    } else if (strlen($createPass) < 8 || strlen($confirmPass) < 8) {
        $_SESSION['add-user'] = "Password Harus 8 + karakter";
    } else if (!$avatar['name']) {
        $_SESSION['add-user'] = "Masukan Avatar anda";
    } else {
        // cek jika password tidak sama
        if ($confirmPass !== $createPass) {
            $_SESSION['add-user'] = "Password tidak sama";
        } else {
            // hash password
            $hashPass = password_hash($createPass, PASSWORD_DEFAULT);

            // Jika username atau email sudah ada di database
            $userCheckQuery = "SELECT * FROM users WHERE 
            username = '$username' OR email = '$email' ";
            $userCheckResult = mysqli_query($conn, $userCheckQuery);
            if (mysqli_num_rows($userCheckResult) > 0) {
                $_SESSION['add-user'] = "Username Atau Email Sudah Ada";
            } else {
                // Avatar
                // Rename avatar
                $time = time(); //buat setiap gambar unique
                $avatarName = $time . $avatar['name'];
                $avatarTempName = $avatar["tmp_name"];
                $avatarPath = '../images/' . $avatarName;

                // check files gambar
                $allowedFiles = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatarName);
                $extension = end($extension);

                if (in_array($extension, $allowedFiles)) {
                    // pastikan gambar ukuran nya tidak terlalu besar
                    if ($avatar['size'] < 1000000) {
                        // Upload avatar
                        move_uploaded_file($avatarTempName, $avatarPath);
                    } else {
                        $_SESSION['add-user'] = "Ukuran File terlalu besar , harus di bawah 1mb";
                    }
                } else {
                    $_SESSION['add-user'] = "Files harus PNG, JPG, OR JPEG";
                }
            }
        }
    }

    // Kembali ke signup jika ada masalah
    if (isset($_SESSION['add-user'])) {
        // pass from data ke sigup page
        $_SESSION['add-user-data'] = $_POST;
        header("location:" . ROOT_URL . "/admin/add-user.php");
        die();
    } else {
        // Insert user ke database
        $insertUserQuery = "INSERT INTO users (firstname, lastname, username, email, password, avatar,
        is_admin) VALUES('$firstname', '$lastname', '$username', '$email', '$hashPass', '$avatarName', $is_admin)";
        $insertUserResult = mysqli_query($conn, $insertUserQuery);

        if (!mysqli_errno($conn)) {
            // Kembali ke login dengan sukses pesan
            $_SESSION['add-user-success'] = "User baru $firstname $lastname berhasil di tambahkan";
            header("location:" . ROOT_URL . "admin/manage-users.php");
            die();
        }
    }
} else {
    // jika submit tidak di klik maka akan kembali ke singup
    header("location:" . ROOT_URL . "admin/add-users.php");
    die();
}
