<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    if (!Schema::hasColumn('berita', 'link')) {
        Schema::table('berita', function (Blueprint $table) {
            $table->string('link')->nullable()->after('kategori_id');
        });
        echo "SUCCESS: Column 'link' successfully added to 'berita' table!\n";
    } else {
        echo "INFO: Column 'link' already exists in 'berita' table.\n";
    }
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
