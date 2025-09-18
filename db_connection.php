<?php
require_once __DIR__ . "/conf.php"; // load $conf settings

try {
    $dsn = "pgsql:host={$conf['db_host']};port={$conf['db_port']};dbname={$conf['db_name']};user={$conf['db_user']};password={$conf['db_pass']}";
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("❌ Connection failed: " . $e->getMessage());
}
?>