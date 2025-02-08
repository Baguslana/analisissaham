<?php
session_start();
$title = '';

if (isset($_GET['page']) && $_GET['page'] == 'Login') {
    $title = 'Login';
    $page = 'page/login.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'Register') {
    $title = 'Register';
    $page = 'page/register.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'Dashboard') {
    $title = 'Dashboard';
    $page = 'page/dashboard.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'Saham') {
    $title = 'Saham';
    $page = 'page/saham.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'Analisis') {
    $title = 'Analisis';
    $page = 'page/analisis.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'Logout') {
    $title = 'Analisis';
    $page = 'logout.php';
    include 'main.php';
} else {
    $title = 'Login';
    $page = 'page/login.php';
    include 'main.php';
}
