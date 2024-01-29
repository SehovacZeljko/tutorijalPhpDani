<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["user_name"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];


    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO users (user_name, pwd, email) VALUES (?,?,?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $pwd, $email]);
        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
        echo $e->getMessage();
    }
} else {
    header("Location: ../index.php");
}
