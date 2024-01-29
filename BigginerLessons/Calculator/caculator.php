<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="<?php echo htmlspecialchars($SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num01" placeholder="Num One">
        <br>
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <br>
        <input type="number" name="num02" placeholder="Num Two">
        <button>Calculate</button>
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // grab data from inputs and sanitize data
        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);

        // error handlers
        $errors = false;

        if (empty($num01) || empty($num02) || empty($operator)) {
            echo "<p>Fill all required fields!</p>";
            $error = true;
        };
        if (!is_numeric($num01) || !is_numeric($num02)) {
            echo "<p>Only numbers are allowed!</p>";
            $error = true;
        };
        $value=0;
        if (!$error) {
            switch ($operator) {
                case 'add':
                    $value = $num01 + $num02;
                    break;
                case 'subtract':
                    $value = $num01 - $num02;
                    break;
                case 'multiply':
                    $value = $num01 * $num02;
                    break;
                case 'divide':
                    $value = $num01 / $num02;
                    break;

                default:
                    echo "<p>Error occurred</p>";
                    
            };
            echo "<p>Value is:" . $value . "</p>";
           
        };
        
    };
    
  //  echo "<p>$num01</p><br><p>$operator</p><br><p>$num02</p>";
 
    ?>


</body>

</html>