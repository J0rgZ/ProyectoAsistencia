<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'db_controlasistencia';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die('Error de conexión a la base de datos: ' . $ex->getMessage());
}

