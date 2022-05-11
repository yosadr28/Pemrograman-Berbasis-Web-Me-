<?php
function createConnection(){
$hostname = '127.0.0.1';
$username = 'root';
$password = 'a';
$db = 'matkul';
try {
    $conn = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
}