<?php
require "config/database.php";

if (isset($_POST['submit'])) {
    // ambil updated data dari form
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    // cek valid input
    if (!$firstname || !$lastname) {
        $_SESSION['edit-user'] = "Invalid Input Di Edit Page";
    } else {
        // Update user
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin=$is_admin
        WHERE id=$id LIMIT 1 ";
        $result = mysqli_query($conn, $query);

        if (mysqli_errno($conn)) {
            $_SESSION['edit-user'] = "Gagal Update User";
        } else {
            $_SESSION['edit-user-success'] = "User $firstname $lastname Berhasil Di Update";
        }
    }
}

header('location:' . ROOT_URL . '/admin/manage-users.php');
die();
