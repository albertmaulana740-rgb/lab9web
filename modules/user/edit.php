<?php
$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);

if (!$id) {
    setFlash('gagal', 'ID pengguna tidak valid.');
    redirect('user/list');
}

$stmt = $pdo->prepare('SELECT id, nama, email FROM users WHERE id = ?');
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    setFlash('gagal', 'Data pengguna tidak ditemukan.');
    redirect('user/list');
}

$errors = [];
$nama   = $user['nama'];
$email  = $user['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfValid()) {
        $errors[] = 'Token keamanan tidak valid.';
    }

    $nama  = trim((string) ($_POST['nama'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));

    if ($nama === '')           $errors[] = 'Nama wajib diisi.';
    if (!validasiEmail($email)) $errors[] = 'Format email tidak valid.';

    if (!$errors) {
        $stmt = $pdo->prepare('UPDATE users SET nama = ?, email = ? WHERE id = ?');
        $stmt->execute([$nama, $email, $id]);
        setFlash('sukses', 'Data pengguna berhasil diperbarui.');
        redirect('user/list');
    }
}
?>
<section>
    <h2>Ubah Pengguna</h2>

    <?php foreach ($errors as $err): ?>
        <div class="alert gagal"><?= e($err) ?></div>
    <?php endforeach; ?>

    <form method="post" action="<?= e(url('user/edit', ['id' => $id])) ?>">
        <?= csrfField() ?>
        <label>Nama</label>
        <input type="text" name="nama" value="<?= e($nama) ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= e($email) ?>" required>

        <button type="submit" class="btn">Perbarui</button>
        <a href="<?= e(url('user/list')) ?>">Batal</a>
    </form>
</section>