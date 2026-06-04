<?php
$sock = @fsockopen('smtp.gmail.com', 587, $errno, $errstr, 10);
if ($sock) { echo "Port 587 (TLS): OPEN\n"; fclose($sock); }
else { echo "Port 587 (TLS): BLOCKED - " . $errstr . "\n"; }

$sock2 = @fsockopen('ssl://smtp.gmail.com', 465, $errno, $errstr, 10);
if ($sock2) { echo "Port 465 (SSL): OPEN\n"; fclose($sock2); }
else { echo "Port 465 (SSL): BLOCKED - " . $errstr . "\n"; }
