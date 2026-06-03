<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

Illuminate\Support\Facades\DB::table('migrations')->insert(['migration' => '2026_05_24_074316_create_destinasi_table', 'batch' => 2]);
Illuminate\Support\Facades\DB::statement('DROP TABLE IF EXISTS visitors');
echo "Done.\n";
