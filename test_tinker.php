<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Clear existing jam_operasional first
App\Models\KontakInfo::where('tipe', 'jam_operasional')->delete();

// Add new jam_operasional
App\Models\KontakInfo::create([
    'tipe' => 'jam_operasional',
    'nilai' => 'Test Jam 24 Jam',
    'is_active' => true
]);

$view = view('pages.kontak', ['errors' => new Illuminate\Support\ViewErrorBag]);
$html = $view->render();

if (strpos($html, 'Test Jam 24 Jam') !== false) {
    echo "Found Test Jam 24 Jam in HTML\n";
} else {
    echo "Not found. Rendered HTML substring:\n";
    echo substr(strstr($html, 'Jam Operasional'), 0, 350) . "\n";
}
