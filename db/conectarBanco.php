<?php


$host = "200.19.1.18";
$db = "brenowiebbelling";
$user = "brenowiebbelling";
$password = "breno";

$dsn = "pgsql:host=$host;port=5432;dbname=$db;";


/*
$host = "localhost";
$db = "postgres";
$user = "postgres";
$password = "breno";

$dsn = "pgsql:host=$host;port=5000;dbname=$db;";
*/

$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$pdo->query("set search_path = internet2");

return $pdo;
?>