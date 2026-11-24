<?php
// modules/page/helper.php

$harga = 200000;
$persenDiskon = 15;
$diskon = hitungDiskon($harga, $persenDiskon);
$emailUji = 'rina@example';
$teksContoh = 'Modularisasi membuat kode lebih mudah dipelihara dan dikembangkan.';
?>

<section>
    <h2>Demo Helper</h2>

    <p>
        Halaman ini menampilkan hasil pengujian fungsi-fungsi
        yang terdapat di helpers/functions.php.
    </p>

    <table class="table">
        <thead>
            <tr>
                <th>Fungsi</th>
                <th>Hasil</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>formatRupiah(150000)</td>
                <td><?= e(formatRupiah(150000)) ?></td>
            </tr>

            <tr>
                <td>hitungDiskon(200000, 15)</td>
                <td><?= e(formatRupiah($diskon)) ?></td>
            </tr>

            <tr>
                <td>Harga setelah diskon</td>
                <td><?= e(formatRupiah($harga - $diskon)) ?></td>
            </tr>

            <tr>
                <td>validasiEmail('<?= e($emailUji) ?>')</td>
                <td>
                    <?= validasiEmail($emailUji) ? 'Valid' : 'Tidak valid' ?>
                </td>
            </tr>

            <tr>
                <td>ringkasTeks(...)</td>
                <td><?= e(ringkasTeks($teksContoh, 30)) ?></td>
            </tr>

            <tr>
                <td>konversiCelciusKeFahrenheit(30)</td>
                <td><?= e((string) konversiCelciusKeFahrenheit(30)) ?> &deg;F</td>
            </tr>

            <tr>
                <td>tentukanStatusNilai(78)</td>
                <td><?= e(tentukanStatusNilai(78)) ?></td>
            </tr>

            <tr>
                <td>hitungTotal(25000, 4)</td>
                <td><?= e(formatRupiah(hitungTotal(25000, 4))) ?></td>
            </tr>
        </tbody>
    </table>
</section>
