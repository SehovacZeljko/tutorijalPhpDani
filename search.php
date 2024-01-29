<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userSearch = $_POST["userSearch"];



    try {
        require_once "includes/dbh.inc.php";
        $query = "SELECT * FROM comments WHERE user_name=:userSearch ;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":userSearch", $userSearch);


        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
        //  echo $e->getMessage();

    }
} else {
    header("Location: ../index.php");
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Search Results</h3>
    <?php

    $firstUserName = true;

    if (empty($results)) {
        echo "<div>";
        echo "<p>There were no results!</p>";
        echo "</div>";
    } else {
        //var_dump($results);
        // echo "<div>";
        // echo "<p>There were no results</p>";
        // echo "</div>";

        foreach ($results as $row) {
            echo "<div>";

            if ($firstUserName) {
                echo "<p>" . htmlspecialchars($row["user_name"]) . "</p>";
                echo "<br>";
                $firstUserName = false;
            }

            echo "<p>" . htmlspecialchars($row["comment_text"]) . "</p>";
            echo "<br>";
            echo "<p>" . htmlspecialchars($row["createt_at"]) . "</p>";
            echo "</div>";
        }
    }


    ?>
</body>

</html>