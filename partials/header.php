<?php

// require_once __DIR__ . '/../admin/config/constants.php';
require "config/database.php";

// fecth data dari database
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $avatar = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Darell Blog web</title>
    <!-- css -->
    <link rel="stylesheet" href="<?= ROOT_URL; ?>dist/style.css" />
    <!-- <link rel="stylesheet" href="<?= ROOT_URL; ?>dist/about.css" /> -->
    <!-- <link rel="stylesheet" href="<?= ROOT_URL; ?>dist/contact.css" /> -->
    <!-- <link rel="stylesheet" href="/dist/blog.css" /> -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= ROOT_URL; ?>assets/icon/logo bg.png" type="image/x-icon">
    <!-- FontAwsome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <!-- Montserrat -->
    <!-- Icon scout -->
    <link
        rel="stylesheet"
        href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- NAV START -->
    <nav>
        <div class="container nav-container">
            <a href="<?= ROOT_URL; ?>" class="nav-logo">DARELL</a>
            <ul class="nav-items">
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user-id'])) : ?>
                    <li class="nav-profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" />
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Log Out</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="signin.php">Sign In</a></li>
                <?php endif ?>
            </ul>
            <button id="open-nav-btn"><i class="fa-solid fa-bars"></i></button>
            <button id="close-nav-btn"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </nav>
    <!-- NAV END -->