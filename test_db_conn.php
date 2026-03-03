<?php
$hosts = ['127.0.0.1', 'localhost'];
foreach ($hosts as $host) {
    try {
        $pdo = new PDO("mysql:host={$host};port=3306;dbname=dgpeec", 'root', '');
        echo $host . ": OK\n";
    } catch (Throwable $e) {
        echo $host . ': ' . $e->getMessage() . "\n";
    }
}
