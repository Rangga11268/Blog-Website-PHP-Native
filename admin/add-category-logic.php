<?php

require "config/database.php";

if (isset($_POST['submit'])) {
    // ambil data dari form
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$title) {
        $_SESSION['add-category'] = "Masukan Title";
    } elseif (!$description) {
        $_SESSION['add-category'] = "Masukan deskripsi";
    }

    // balik ke add-category dengan form data jika ada error/invalid
    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location:' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        // masukan category ke database
        $query = "INSERT INTO categories (title,description) VALUES ('$title', '$description') ";
        $result = mysqli_query($conn, $query);
        if (mysqli_errno($conn)) {
            $_SESSION['add-category'] = "Tidak bisa tambah kategori";
            header('location:' . ROOT_URL . 'admin/add-category.php');
            die();
        } else {
            $_SESSION['add-category-success'] = "Judul $title kategori berhasil di tambahkan";
            header('location:' . ROOT_URL . 'admin/manage-categories.php');
            die();
        }
    }
}
