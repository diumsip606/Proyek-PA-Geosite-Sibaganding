<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

Illuminate\Support\Facades\DB::statement("CREATE TABLE IF NOT EXISTS visitors (id bigint unsigned not null auto_increment primary key, ip_address varchar(255) null, date date null, created_at timestamp null, updated_at timestamp null) default character set utf8mb4 collate 'utf8mb4_general_ci'");
echo "Done.\n";
