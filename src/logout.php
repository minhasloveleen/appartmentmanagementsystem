<?php
include 'includes/database.php';
session_start();
echo"hi";
// destroy the session
session_destroy();
header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'index.php');

?>