<?php
session_start();
ob_start();
$_SESSION["user_id"] = null;
$_SESSION["username"] = null;
$_SESSION["fullname"] = null;

$_SESSION["email"] = null;
$_SESSION["bio"] = null;
$_SESSION["work"] = null;
$_SESSION["birthdate"] = null;

session_destroy();
header('Location: ./index.php');
