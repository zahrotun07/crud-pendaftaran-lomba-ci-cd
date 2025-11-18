<?php

use PHPUnit\Framework\TestCase;

// panggil file validasi.php
require_once __DIR__ . '/../validasi.php';

class ValidasiFormPendaftaranTest extends TestCase
{
    // P1 – Nama kosong
    public function test_nama_kosong()
    {
        $hasil = validasi_form_pendaftaran(
            "",                    // nama kosong
            "08123456789",         // telp normal
            "zahrotun@gmail.com",  // email normal
            "Nyanyi"               // pilihan lomba
        );

        $this->assertEquals(
            "Nama Lengkap tidak boleh kosong",
            $hasil
        );
    }

    // P2 – Telp kosong
    public function test_telp_kosong()
    {
        $hasil = validasi_form_pendaftaran(
            "Zahrotun",            // nama diisi
            "",                    // telp kosong
            "zahrotun@gmail.com",  // email normal
            "Melukis"              // pilihan lomba
        );

        $this->assertEquals(
            "Nomor Telepon tidak boleh kosong",
            $hasil
        );
    }

    // P3 – Telp mengandung huruf / simbol
    public function test_telp_mengandung_huruf()
    {
        $hasil = validasi_form_pendaftaran(
            "Zahrotun",
            "08ABC1234",           // telp berisi huruf 
            "zahrotun@gmail.com",
            "Nyanyi"
        );

        $this->assertEquals(
            "Nomor Telepon hanya boleh angka",
            $hasil
        );
    }

    // P4 – Email tidak valid
    public function test_email_tidak_valid()
    {
        $hasil = validasi_form_pendaftaran(
            "Zahrotun",
            "08123456789",
            "zahrotun@gmail",      // email tidak valid (tanpa .com)
            "Melukis"
        );

        $this->assertEquals(
            "Format Email tidak valid",
            $hasil
        );
    }

    // P5 – Semua input valid
    public function test_input_valid()
    {
        $hasil = validasi_form_pendaftaran(
            "Zahrotun",
            "08123456789",
            "zahrotun@gmail.com",
            "Melukis"               
        );

        $this->assertEquals(
            "VALID",
            $hasil
        );
    }
}
