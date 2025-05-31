<?php

// require "config/database.php";
require "../partials/header.php";

// cek login status 
if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'signin.php');
    die();
}
