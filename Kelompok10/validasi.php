<?php

function validasi_form_pendaftaran(
    string $nama,
    string $telp,
    string $email,
    string $lomba
): string {
    $nama  = trim($nama);
    $telp  = trim($telp);
    $email = trim($email);
    $lomba = trim($lomba); 

    // 1. Nama tidak boleh kosong
    if ($nama === '') {
        return "Nama Lengkap tidak boleh kosong";
    }

    // 2. Nomor telepon tidak boleh kosong
    if ($telp === '') {
        return "Nomor Telepon tidak boleh kosong";
    }

    // 3. Nomor telepon hanya boleh angka
    if (!ctype_digit($telp)) {
        return "Nomor Telepon hanya boleh angka";
    }

    // 4. Email tidak valid (kalau diisi)
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Format Email tidak valid";
    }

    // 5. Semua valid
    return "VALID";
}
