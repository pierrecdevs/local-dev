<?php
require_once('config.php');

try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    if ($pdo) {
        echo sprintf('Connected to the %s database successfully!<br/><a href="/">Return</a>', $db);
    }
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}