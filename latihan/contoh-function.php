<?php
require_once __DIR__ . '/../helpers/functions.php';

echo formatRupiah(150000) . '<br>';
echo konversiCelciusKeFahrenheit(100) . ' °F<br>';
echo tentukanStatusNilai(88) . '<br>';
echo formatRupiah(hitungTotal(15000, 3)) . '<br>';
echo e('<script>alert("uji")</script>');