<?php
// Kelompok10/tests/test_validasi_ci.php

// ambil fungsi validasi
require __DIR__ . '/../validasi.php';

$gagal = 0;

function cek($namaTes, $kondisi)
{
    global $gagal;
    if ($kondisi) {
        echo $namaTes . " : OK\n";
    } else {
        echo $namaTes . " : FAIL\n";
        $gagal++;
    }
}

// P1 – Nama kosong
cek(
    "P1 Nama kosong",
    validasi_form_pendaftaran('', '08123456789', 'zahrotun@gmail.com')
        === 'Nama Lengkap tidak boleh kosong'
);

// P2 – Telp kosong
cek(
    "P2 Telp kosong",
    validasi_form_pendaftaran('Zahrotun', '', 'zahrotun@gmail.com')
        === 'Nomor Telepon tidak boleh kosong'
);

// P3 – Telp mengandung huruf
cek(
    "P3 Telp huruf",
    validasi_form_pendaftaran('Zahrotun', '08ABC1234', 'zahrotun@gmail.com')
        === 'Nomor Telepon hanya boleh angka'
);

// P4 – Email tidak valid
cek(
    "P4 Email tidak valid",
    validasi_form_pendaftaran('Zahrotun', '08123456789', 'zahrotun@gmail')
        === 'Format Email tidak valid'
);

// P5 – Semua valid
cek(
    "P5 Semua valid",
    validasi_form_pendaftaran('Zahrotun', '08123456789', 'zahrotun@gmail.com')
        === 'VALID'
);

// jika ada yang gagal → exit code 1 (supaya GitHub Actions jadi merah)
if ($gagal > 0) {
    echo "Ada $gagal tes yang gagal\n";
    exit(1);
}

echo "Semua tes LULUS\n";
exit(0);
