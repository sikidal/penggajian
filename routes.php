<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "";
}

switch ($page) {
    case "":
    case "dashboard":
        include 'pages/dashboard.php';
        break;
    case "bagian":
        include 'pages/bagian.php';
        break;
    case "bagiantambah":
        include 'pages/bagiantambah.php';
        break;
    default:
        include 'pages/404.php';
}
