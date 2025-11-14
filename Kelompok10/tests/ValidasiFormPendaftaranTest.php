<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../validasi.php';

class ValidasiFormPendaftaranTest extends TestCase
{
    public function test_nama_kosong()
    {
        $this->assertEquals(
            "Nama Lengkap tidak boleh kosong",
            validasi_form_pendaftaran("", "0812345678", "email@gmail.com")
        );
    }

    public function test_telp_kosong()
    {
        $this->assertEquals(
            "Nomor Telepon tidak boleh kosong",
            validasi_form_pendaftaran("Zahrotun", "", "email@gmail.com")
        );
    }

    public function test_telp_mengandung_huruf()
    {
        $this->assertEquals(
            "Nomor Telepon hanya boleh angka",
            validasi_form_pendaftaran("Zahrotun", "08ABCD123", "email@gmail.com")
        );
    }

    public function test_email_tidak_valid()
    {
        $this->assertEquals(
            "Format Email tidak valid",
            validasi_form_pendaftaran("Zahrotun", "0812345678", "salah@")
        );
    }

    public function test_input_valid()
    {
        $this->assertEquals(
            "VALID",
            validasi_form_pendaftaran("Zahrotun", "0812345678", "zahro@mail.com")
        );
    }
}
