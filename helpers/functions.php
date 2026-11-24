<?php
// helpers/functions.php

/* ===== Latihan 2: function wajib ===== */

function e(?string $nilai): string
{
    return htmlspecialchars($nilai ?? '', ENT_QUOTES, 'UTF-8');
}

function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungDiskon(float $harga, float $persen = 10): float
{
    return $harga * ($persen / 100);
}

function validasiEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $maks = 50): string
{
    if (mb_strlen($teks) <= $maks) {
        return $teks;
    }
    return rtrim(mb_substr($teks, 0, $maks)) . '...';
}

/* ===== Latihan function (bagian E) ===== */

function konversiCelciusKeFahrenheit(float $c): float
{
    return ($c * 9 / 5) + 32;
}

function tentukanStatusNilai(float $nilai): string
{
    if ($nilai >= 85) return 'A';
    if ($nilai >= 70) return 'B';
    if ($nilai >= 55) return 'C';
    if ($nilai >= 40) return 'D';
    return 'E';
}

function hitungTotal(float $harga, int $jumlah): float
{
    return $harga * $jumlah;
}

/* ===== Helper routing ===== */

function url(string $page, array $params = []): string
{
    $url = 'index.php?page=' . $page;
    if ($params) {
        $url .= '&' . http_build_query($params);
    }
    return $url;
}

function redirect(string $page, array $params = []): void
{
    header('Location: ' . url($page, $params));
    exit;
}

// Menu aktif: 'user' akan aktif untuk user/list, user/add, dst.
function isActive(string $route, ?string $current): string
{
    if ($current === null) return '';
    $aktif = ($current === $route) || str_starts_with($current, $route . '/');
    return $aktif ? 'active' : '';
}

/* ===== Flash message (tantangan mandiri) ===== */

function setFlash(string $tipe, string $pesan): void
{
    $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}

function getFlash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}

/* ===== CSRF ===== */

function csrfToken(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrfField(): string
{
    return '<input type="hidden" name="csrf" value="' . e(csrfToken()) . '">';
}

function csrfValid(): bool
{
    $token = $_POST['csrf'] ?? '';
    return is_string($token) && hash_equals($_SESSION['csrf'] ?? '', $token);
}