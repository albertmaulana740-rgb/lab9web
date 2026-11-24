<?php

require_once __DIR__ . '/../helpers/functions.php';

echo "<h2>Pengujian Functions LAB9WEB</h2>";

echo "Format Rupiah: " . formatRupiah(1500000);
echo "<br>";

echo "Diskon 10%: " . formatRupiah(hitungDiskon(100000));
echo "<br>";

echo "Validasi email: ";
var_dump(validasiEmail("albert@gmail.com"));
echo "<br>";

echo "Konversi 30 Celcius: ";
echo konversiCelciusKeFahrenheit(30) . " Fahrenheit";
echo "<br>";

echo "Nilai 90: ";
echo tentukanStatusNilai(90);
echo "<br>";

echo "Total belanja: ";
echo formatRupiah(hitungTotal(25000, 3));
echo "<br>";

echo "Ringkas teks: ";
echo ringkasTeks("Saya sedang belajar PHP menggunakan VS Code untuk praktikum LAB9WEB.", 30);

?>