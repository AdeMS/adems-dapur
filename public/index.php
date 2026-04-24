<?php

declare(strict_types=1);

/**
 * Menampilkan semua pesan error di lingkungan pengembangan, 
 * tetapi menyembunyikannya di lingkungan produksi.
 */
if ($_SERVER['DAPUR_ENV'] === 'development') {
    error_reporting(E_ALL);
    ini_set("display_errors", '1');
}

/**
 * Mengubah direktori kerja saat ini ke direktori root proyek,
 * yang ditentukan oleh variabel lingkungan DAPUR_ROOT, atau ke direktori induk
 */
chdir($_SERVER['DAPUR_ROOT'] ?? dirname(__DIR__));

/**
 * Memuat autoloader yang dihasilkan oleh Composer untuk mengelola dependensi 
 * dan autoloading kelas.
 */
require getcwd() . '/vendor/autoload.php';