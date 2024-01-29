<?php

$dns = "mysql:host=localhost;dbname=myfirstdatabase";

$dbusername = "root";
$dbpassword = "root";

try {
    $pdo = new PDO($dns,$dbusername,$dbpassword);
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed" . $e->getMessage();
}