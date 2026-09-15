<?php

declare(strict_types=1);

use Laminas\ServiceManager\ServiceManager;

/* Memuat konfigurasi dasar yang akan digunakan */
$config = require __DIR__ . '/config/default.php';

/**
 * Memuat file konfigurasi modul utama berdasarkan nama host yang diterima dari permintaan HTTP.
 * 
 * Menentukan file konfigurasi yang akan dimuat berdasarkan nama host yang 
 * diterima dari permintaan HTTP.
 * 1. <full-host>-config.php (dots allowed)
 * 2. <full-host-with-underscores>-config.php
 * 3. <subdomain>-config.php (subdomain of PRIMARY_DOMAIN_NAME)
 * 4. <subdomain-with-underscores>-config.php
 */
$getCurrentHost = require __DIR__ . '/host.php';
$host = $getCurrentHost();

if ($host['normalized'] !== '') {
    $filesToCheck = [
        sprintf('%s/container/config/%s.php', getcwd(), $host['normalized']),
        sprintf('%s/container/config/%s.php', getcwd(), $host['normalized_underscored']),
        sprintf('%s/container/config/%s.php', getcwd(), $host['without_domain']),
        sprintf('%s/container/config/%s.php', getcwd(), $host['without_domain_underscored']),
        sprintf('%s/container/config/default.php', getcwd()), // file config default
    ];

    foreach ($filesToCheck as $file) {
        if (is_file($file)) {
            $hostConfig = require $file;
            if (! is_array($hostConfig)) {
                throw new \RuntimeException(sprintf('Host config file "%s" must return an array.', $file));
            }

            $config = array_replace_recursive($config, $hostConfig);
            break;
        }
    }
}

/**
 * Memisahkan konfigurasi dependensi dari konfigurasi lainnya, 
 * sehingga kita dapat mengelola layanan dan dependensi aplikasi dengan lebih 
 * mudah. Dengan memisahkan konfigurasi ini, kita dapat menjaga kode tetap 
 * bersih dan terorganisir, serta memudahkan pengelolaan dependensi dalam 
 * aplikasi.
 */
$dependencies                       = $config['dependencies'];
$dependencies['services']['config'] = $config;


/* hilangkan komentar pada baris-baris berikut untuk men--debug */
/*
echo "<pre>";
var_dump($dependencies['services']['config']);
echo "</pre>";
die();
*/

/* Membuat instance ServiceManager dengan konfigurasi dependensi yang telah dipisahkan sebelumnya.
 * ServiceManager ini akan digunakan untuk mengelola dan menyuntikkan dependensi ke dalam
 * aplikasi, seperti layanan, middleware, dan komponen lainnya. Dengan menggunakan ServiceManager,
 * kita dapat mengatur dependensi dengan lebih mudah dan menjaga kode tetap bersih dan terorganisir.
 */
return new ServiceManager($dependencies);