<?php

//var_dump($_SERVER["REQUEST_METHOD"]);

if($_SERVER["REQUEST_METHOD"]== "POST"){

$firstName= htmlspecialchars($_POST["firstname"]);
$lastName= htmlspecialchars($_POST["lastname"]);
$favoritePet= htmlspecialchars($_POST["favoritepet"]);

if (empty($firstName)) {
  exit();
  header("Location: ../index.php");
}

echo "These are data that user submitted";
echo "<br>";
echo $firstName;
echo "<br>";
echo $lastName;
echo "<br>";
echo $favoritePet;

header("Location: ../index.php");
} else {

    header("Location: ../index.php");

}