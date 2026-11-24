document.addEventListener('DOMContentLoaded', function () {

    // 1. Pesan sukses/gagal hilang otomatis setelah 4 detik
    document.querySelectorAll('.alert').forEach(function (el) {
        setTimeout(function () {
            el.style.transition = 'opacity .5s';
            el.style.opacity = '0';
            setTimeout(function () { el.remove(); }, 500);
        }, 4000);
    });

    // 2. Tombol Simpan dinonaktifkan sesudah diklik (cegah klik ganda)
    document.querySelectorAll('form').forEach(function (form) {
        form.addEventListener('submit', function () {
            var btn = form.querySelector('button[type=submit]');
            if (btn && !btn.classList.contains('btn-danger')) {
                btn.disabled = true;
                btn.textContent = 'Memproses...';
            }
        });
    });

    // 3. Validasi email sederhana di sisi klien
    document.querySelectorAll('input[type=email]').forEach(function (input) {
        input.addEventListener('blur', function () {
            var ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value);
            input.style.borderColor = (input.value === '' || ok) ? '' : '#c0392b';
        });
    });
});