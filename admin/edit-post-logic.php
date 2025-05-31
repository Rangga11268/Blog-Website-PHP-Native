<?php

require "config/database.php";

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $prev_thumbnail = filter_var($_POST['prev_thumbnail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];


    // set is featured ke 0 jika di uncheck
    $is_featured = $is_featured == 1 ?: 0;

    // cek dan validasi input
    if (!$title) {
        $_SESSION['edit-post'] = "Tidak bisa update post. Invalid input edit data";
    } elseif (!$category_id) {
        $_SESSION['edit-post'] = "Tidak bisa update post. Invalid input edit data";
    } elseif (!$body) {
        $_SESSION['edit-post'] = "Tidak bisa update post. Invalid input edit data";
    } else {
        //  hapus thumbnail jika ada thumbnail baru
        if ($thumbnail['name']) {
            $prev_thumbnail_path = '../images/' . $prev_thumbnail;
            if ($prev_thumbnail_path) {
                unlink($prev_thumbnail_path);
            }

            // thumbnail baru
            // Ganti nama gambar
            $time = time(); //buat setiap nama gambar jadi unik
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name;

            // pastikan file yg di kirim gambar
            $allowedFiles = ['jpg', 'jpeg', 'png',];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);
            if (in_array($extension, $allowedFiles)) {
                // pastikan avatar di bawah 2mb
                if ($thumbnail['size'] < 2000000) {
                    // upload avatar
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                } else {
                    $_SESSION['edit-post'] = "Tidak bisa update post, File harus di bawah 2MB";
                }
            } else {
                $_SESSION['edit-post'] = "Tidak bisa update pots, File harus JPG,JPEG,PNG";
            }
        }
    }


    if ($_SESSION['edit-post']) {
        // kemmbali ke manage jika form nya invalid
        header('location:' . ROOT_URL . 'admin/');
        die();
    } else {
        // set is featured semua post ke 0 jika is featured di post ini 1
        if ($is_featured == 1) {
            $zero_is_featured_query = "UPDATE posts SET is_featured = 0";
            $zero_is_featured_result = mysqli_query($conn, $zero_is_featured_query);
        }

        // set thumbnail nama jika yang baru di upload atau tetap dengan yg lama
        $thumbnail_insert = $thumbnail_name ?? $prev_thumbnail;

        $query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_insert', category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1";
        $result = mysqli_query($conn, $query);
    }

    if (!mysqli_errno($conn)) {
        $_SESSION['edit-post-success'] = "Post berhasil di update";
    }
}

header('location:' . ROOT_URL . 'admin/');
die();
