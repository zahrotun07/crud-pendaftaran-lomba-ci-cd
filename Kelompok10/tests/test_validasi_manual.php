<?php
require 'validasi.php';   // panggil fungsi validasi_form_pendaftaran

function cek($namaTes, $kondisi) {
    echo $namaTes . ' : ' . ($kondisi ? "LOLOS" : "GAGAL") . "<br>";
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
    "P3 Telp mengandung huruf",
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
