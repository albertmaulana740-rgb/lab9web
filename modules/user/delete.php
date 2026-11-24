<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('user/list');
}

if (!csrfValid()) {
    setFlash('gagal', 'Token keamanan tidak valid.');
    redirect('user/list');
}

$id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);

if ($id) {
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $stmt->execute([$id]);
    setFlash('sukses', 'Data pengguna berhasil dihapus.');
} else {
    setFlash('gagal', 'ID pengguna tidak valid.');
}

redirect('user/list');