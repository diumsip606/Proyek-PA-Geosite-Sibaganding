<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Test sending email using Laravel Mail
try {
    Illuminate\Support\Facades\Mail::raw('Test email dari Geosite Sibaganding. Jika Anda menerima email ini, konfigurasi SMTP berhasil!', function($message) {
        $message->to('geositesibaganding@gmail.com')
                ->subject('Test Email SMTP - Geosite Sibaganding');
    });
    echo "Email berhasil dikirim!\n";
} catch (Exception $e) {
    echo "Gagal: " . $e->getMessage() . "\n";
}
