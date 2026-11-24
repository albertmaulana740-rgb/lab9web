<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= e($basePath) ?>">
    <title><?= e($pageTitle) ?> | Aplikasi PHP Modular</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi PHP Modular</h1>
        <p>Template, function, dan routing sederhana</p>
    </header>

    <nav>
        <a class="<?= isActive('dashboard', $currentPage) ?>" href="<?= e(url('dashboard')) ?>">Dashboard</a>
        <a class="<?= isActive('profil', $currentPage) ?>"    href="<?= e(url('profil')) ?>">Profil</a>
        <a class="<?= isActive('kontak', $currentPage) ?>"    href="<?= e(url('kontak')) ?>">Kontak</a>
        <a class="<?= isActive('helper', $currentPage) ?>"    href="<?= e(url('helper')) ?>">Helper</a>
        <a class="<?= isActive('user', $currentPage) ?>"      href="<?= e(url('user/list')) ?>">Pengguna</a>
    </nav>

    <main>
        <?php if ($flash = getFlash()): ?>
            <div class="alert <?= e($flash['tipe']) ?>"><?= e($flash['pesan']) ?></div>
        <?php endif; ?>