<?php

require "config/constants.php";
// hancurkan semua sesi dan kembali ke home page
session_destroy();
header('location:' . ROOT_URL);
die();
