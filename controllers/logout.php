<?php
include '../lib/config.php';
include '../lib/function.php';

$user_id = $_SESSION['user_id'];
log_data(6, 0, $user_id, "");
session_destroy();
header("Location: ../login.php");


?>