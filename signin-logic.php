<?php

require "config/database.php";

if (isset($_POST['submit'])) {
    // ambil data dari form
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$username_email) {
        $_SESSION['signin'] = "Username atau email harus di isi";
    } elseif (!$password) {
        $_SESSION['signin'] = "Password harus di isi";
    } else {
        // fetch data ke database
        $fetchUserQuery = "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email' ";
        $fetchUserResult = mysqli_query($conn, $fetchUserQuery);

        if (mysqli_num_rows($fetchUserResult) == 1) {
            // Confert ke array
            $user = mysqli_fetch_assoc($fetchUserResult);
            $db_pass = $user['password'];
            // membandingkan password dengan yang di database
            if (password_verify($password, $db_pass)) {
                // set session untuk akses kontrol
                $_SESSION['user-id'] = $user['id'];
                // set session apakah user admin
                if ($user['is_admin'] == 1) {
                    $_SESSION['user-id-admin'] = true;
                }

                // Login user
                header('location:' . ROOT_URL . 'admin/');
            } else {
                $_SESSION['signin'] = "Tolong cek lagi inputnya";
            }
        } else {
            $_SESSION['signin'] = "User Tidak di temukan";
        }
    }

    // jika ada masalah , kembali ke signin page dengan login detail
    if (isset($_SESSION['signin'])) {
        $_SESSION['signin-data'] = $_POST;
        header('location:' . ROOT_URL . 'signin.php');
        die();
    }
} else {
    header('location:' . ROOT_URL . 'signin.php');
}
