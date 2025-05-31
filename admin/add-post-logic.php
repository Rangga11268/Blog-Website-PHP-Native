<?php
require "config/database.php";

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'] ?? '', FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // set jika featured 0 jika tidak di check
    $is_featured = $is_featured == 1 ?: 0;


    // validasi data
    if (!$title) {
        $_SESSION['add-post'] = "Masukan judul pada title";
    } elseif (!$category_id) {
        $_SESSION['add-post'] = "Pilih kategori";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Isi artikel pada body";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "Pilih gambar thumbnail";
    } else {

        // ganti nama gambar
        $time = time(); // buat setiap gambar unik
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_path = '../images/' . $thumbnail_name;

        // pastikan file nya gambar
        $allowedFiles = ['jpg', 'jpeg', 'png'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if (in_array($extension, $allowedFiles)) {
            // pastikan ukuran gambar tidak terlalu besar
            if ($thumbnail['size'] < 2_000_000) {
                // simpan gambar
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_path);
            } else {
                $_SESSION['add-post'] = "Ukuran gambar terlalu besar harus kurang dari 2Mb";
            }
        } else {
            $_SESSION['add-post'] = "File harus Jpg, png atau jpeg";
        }
    }
    // balik kembali dengan form ke add-post.php jika ada error
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('location:' . ROOT_URL . 'admin/add-post.php');
        die();
    } else {
        // set is_featured untuk semua post 0 jika post ini 1
        if ($is_featured == 1) {
            $zero_is_featured_query = "UPDATE posts SET is_featured = 0";
            $zero_is_featured_result = mysqli_query($conn, $zero_is_featured_query);
        }
        // insert posts ke database
        $query = "INSERT INTO posts(title, body, thumbnail, category_id, author_id, is_featured) 
        VALUES('$title', '$body', '$thumbnail_name', $category_id, $author_id, $is_featured)";
    }
    $result = mysqli_query($conn, $query);

    if (!mysqli_errno($conn)) {
        $_SESSION['add-post-success'] = "Artikel berhasil ditambahkan";
        header('location:' . ROOT_URL . 'admin/');
        die();
    }
}
header('location:' . ROOT_URL . 'admin/add-post.php');
die();
