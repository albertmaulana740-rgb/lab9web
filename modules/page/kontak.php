<?php
// modules/page/kontak.php

$kontak = [
    'Nama' => 'Albert Maulana',
    'Program Studi' => 'Teknik Informatika',
    'Universitas' => 'Universitas Pelita Bangsa',
    'Email' => 'Albertmaulana740@gmail.com',
];
?>

<section>
    <h2>Kontak</h2>

    <p>
        Halaman ini berisi informasi kontak dan identitas
        untuk keperluan informasi lebih lanjut.
    </p>

    <div class="card">
        <h3>Informasi Kontak</h3>

        <?php foreach ($kontak as $label => $isi): ?>
            <p>
                <strong><?= e($label) ?>:</strong>
                <?= e($isi) ?>
            </p>
        <?php endforeach; ?>
    </div>
</section>
