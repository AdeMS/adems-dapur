<?php

declare(strict_types=1);

return static function (): array {
    $host = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? ''; // Mengambil nama host dari variabel server HTTP_HOST atau SERVER_NAME, jika tersedia. Jika tidak, gunakan string kosong.
    $host = preg_replace('/:\d+$/', '', trim((string) $host)); // Menghapus port dari nama host jika ada (misalnya, ":8080") dan menghapus spasi di awal dan akhir.
    $hostNormalized = strtolower($host); // Menormalisasi nama host menjadi huruf kecil.

    $domainPattern = preg_quote(getenv('PRIMARY_DOMAIN_NAME') ?: 'adems.id', '/');
    $hostWithoutDomain = preg_replace(
        '/(?:\.' . $domainPattern . ')$/i',
        '',
        $hostNormalized
    );
    $hostWithoutDomain = rtrim($hostWithoutDomain, '.');

    return [
        'normalized' => $hostNormalized,
        'without_domain' => $hostWithoutDomain,
        'normalized_underscored' => str_replace('.', '_', $hostNormalized),
        'without_domain_underscored' => str_replace('.', '_', $hostWithoutDomain),
    ];
};
