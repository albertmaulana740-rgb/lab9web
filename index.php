<?php
// index.php : titik masuk aplikasi + router
ob_start();
session_start();

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/helpers/functions.php';

// WHITELIST rute (min. 5 rute)
$routes = [
    'dashboard'   => __DIR__ . '/views/dashboard.php',
    'profil'      => __DIR__ . '/modules/page/profil.php',
    'kontak'      => __DIR__ . '/modules/page/kontak.php',
    'helper'      => __DIR__ . '/modules/page/helper.php',
    'user/list'   => __DIR__ . '/modules/user/list.php',
    'user/add'    => __DIR__ . '/modules/user/add.php',
    'user/edit'   => __DIR__ . '/modules/user/edit.php',
    'user/delete' => __DIR__ . '/modules/user/delete.php',
];

$titles = [
    'dashboard'   => 'Dashboard',
    'profil'      => 'Profil',
    'kontak'      => 'Kontak',
    'helper'      => 'Demo Helper',
    'user/list'   => 'Data Pengguna',
    'user/add'    => 'Tambah Pengguna',
    'user/edit'   => 'Ubah Pengguna',
    'user/delete' => 'Hapus Pengguna',
];

$page = $_GET['page'] ?? 'dashboard';

if (!is_string($page) || !array_key_exists($page, $routes)) {
    http_response_code(404);
    $currentPage = null;
    $pageTitle   = '404 - Tidak ditemukan';
    $contentFile = __DIR__ . '/views/404.php';
} else {
    $currentPage = $page;
    $pageTitle   = $titles[$page];
    $contentFile = $routes[$page];
}

// base path agar aset tetap termuat jika URL di-rewrite (.htaccess)
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/';

require_once __DIR__ . '/views/header.php';
require $contentFile;
require_once __DIR__ . '/views/footer.php';

ob_end_flush();