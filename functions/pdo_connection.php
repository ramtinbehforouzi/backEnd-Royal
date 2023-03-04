<?php
global $pdo;
try {
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    $pdo = new PDO("mysql:host=localhost;dbname=royal", 'root', '', $option);
    return $pdo;
} catch (PDOException $e) {
    echo 'error' . $e->getMessage();
    exit;
}
