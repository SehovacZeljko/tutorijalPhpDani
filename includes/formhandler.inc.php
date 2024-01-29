<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["user_name"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];


    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO users (user_name, pwd, email) VALUES (:user_name, :pwd, :email);";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":user_name", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":email", $email);

        $stmt->execute();
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
