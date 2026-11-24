<?php
$totalUser = 0;

try {
    $totalUser = (int) $pdo->query(
        'SELECT COUNT(*) FROM users'
    )->fetchColumn();
} catch (PDOException $e) {
    $totalUser = 0;
}

$deskripsi = 'Aplikasi ini memisahkan template, konfigurasi, helper, dan modul fitur ke dalam direktori yang berbeda.';
?>

<section>
    <h2>Dashboard</h2>

    <p>
        <?= e(ringkasTeks($deskripsi, 150)) ?>
    </p>

    <div class="cards">
        <div class="card">
            <strong><?= $totalUser ?></strong>
            <span>Total Pengguna</span>
        </div>

        <div class="card">
            <strong><?= e(formatRupiah(1500000)) ?></strong>
            <span>Contoh formatRupiah()</span>
        </div>
    </div>

    <p>
        <a class="btn" href="<?= e(url('user/list')) ?>">
            Kelola Pengguna
        </a>
    </p>
</section>
