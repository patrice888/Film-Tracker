<?php

$host = 'localhost';
$dbname = 'film_tracker';
$username = 'bit_academy';
$password = 'bit_academy';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbinding mislukt: ' . $e->getMessage();
}

?>
