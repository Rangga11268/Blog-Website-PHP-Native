<?php
require "config/database.php";


if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch post dari database untuk menghapus thumbnail
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($conn, $query);

    // pastikan hanya ada 1 post yang di fetch
    if (mysqli_num_rows($result) == 1) {
        $post = mysqli_fetch_assoc($result);
        $thumbnail_name = $post['thumbnail'];
        $thumbnail_path = '../images/' . $thumbnail_name;


        // hapus gambar
        if ($thumbnail_path) {
            unlink($thumbnail_path);

            // hapus post 
            $delete_post_query = "DELETE FROM posts WHERE id=$id LIMIT 1";
            $delete_post_result = mysqli_query($conn, $delete_post_query);

            if (!mysqli_errno($conn)) {
                $_SESSION['delete-post-success'] = "Post berhasil dihapus";
            }
        }
    }
}


header('location:' . ROOT_URL . 'admin/');
die();
