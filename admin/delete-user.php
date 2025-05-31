<?php

require "config/database.php";

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fecth form user dari database
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // pastikan hanya satu user
    if (mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;
        // hapus gambar jika ada gambarnya
        if ($avatar_path) {
            unlink($avatar_path);
        }
    }

    // buat nanti
    // fecth semua thumbnails user dan hapus
    $thumbnails_query = "SELECT thumbnail FROM posts WHERE author_id=$id";
    $thumbnails_result = mysqli_query($conn, $thumbnails_query);
    if (mysqli_num_rows($thumbnails_result) > 0) {
        while ($thumbnail = mysqli_fetch_assoc($thumbnails_result)) {
            $thumbnail_path = '../images/' . $thumbnail['thumbnail'];
            // hapus thumbnail 
            if ($thumbnail_path) {
                unlink($thumbnail_path);
            }
        }
    }



    // hapus user dari database
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($conn, $delete_user_query);
    if (mysqli_errno($conn)) {
        $_SESSION['delete-user'] = "Tidak bisa Menghapus user '{$user['firstname']} '{$user['firstname']}'";
    } else {
        $_SESSION['delete-user-success'] = "User '{$user['firstname']} '{$user['firstname']}' berhasil di hapus";
    }
}
header('location:' . ROOT_URL . 'admin/manage-users.php');
