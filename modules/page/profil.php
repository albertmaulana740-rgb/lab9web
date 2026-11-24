<?php
// modules/page/profil.php

$profil = [
    'Nama' => 'Albert Maulana',
    'NIM' => '312510162',
    'Kelas' => 'TI.25.B',
    'Program Studi' => 'Teknik Informatika',
    'Email' => 'Albertmaulana740@gmail.com',
];

$hobi = [
    'Coding',
    'Membaca',
    'Musik',
];
?>

<section>
    <h2>Profil</h2>

    <p>
        Halaman ini menampilkan informasi profil mahasiswa
        pada aplikasi PHP Modular.
    </p>

    <div class="card">
        <h3>Identitas Mahasiswa</h3>

        <table class="table">
            <?php foreach ($profil as $label => $isi): ?>
                <tr>
                    <th><?= e($label) ?></th>
                    <td><?= e($isi) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="card">
        <h3>Hobi</h3>

        <ul>
            <?php foreach ($hobi as $item): ?>
                <li><?= e($item) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
