<?php


require "config/constants.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_errno($conn)) {
    die(mysqli_errno($conn));
}
