<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;

return [
    // Mengubah pengaturan cache konfigurasi. Setel ini ke boolean false, atau 
    // hapus direktifnya, untuk menonaktifkan caching konfigurasi. Mengubah 
    // mode pengembangan juga akan menonaktifkannya secara default; bersihkan 
    // cache konfigurasi menggunakan `composer clear-config-cache`.
    ConfigAggregator::ENABLE_CACHE => false,

    // Mengaktifkan debugging; biasanya digunakan untuk memberikan informasi 
    // kesalahan pemrograman dalam template.
    'debug'  => true,
];