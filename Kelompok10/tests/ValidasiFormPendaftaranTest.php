<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../validasi.php';

class ValidasiFormPendaftaranTest extends TestCase
{
    public function test_nama_kosong()
    {
        $hasil = validasi_form_pendaftaran("", "08123456789", "zahrotun@gmail.com");
        $this->assertEquals("Nama Lengkap tidak boleh kosong", $hasil);
    }

    public function test_telp_kosong()
    {
        $hasil = validasi_form_pendaftaran("Zahrotun", "", "zahrotun@gmail.com");
        $this->assertEquals("Nomor Telepon tidak boleh kosong", $hasil);
    }

    public function test_telp_mengandung_huruf()
    {
        $hasil = validasi_form_pendaftaran("Zahrotun", "08ABC123", "zahrotun@gmail.com");
        $this->assertEquals("Nomor Telepon hanya boleh angka", $hasil);
    }

    public function test_email_tidak_valid()
    {
        $hasil = validasi_form_pendaftaran("Zahrotun", "08123456789", "zahrotun@gmail");
        $this->assertEquals("Format Email tidak valid", $hasil);
    }

    public function test_input_valid()
    {
        $hasil = validasi_form_pendaftaran("Zahrotun", "08123456789", "zahrotun@gmail.com");
        $this->assertEquals("VALID", $hasil);
    }
}
