<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cau13</title>
</head>
<body>
    <h1>Number Array Operations</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="numbers">Enter integers separated by commas:</label><br>
        <input type="text" id="numbers" name="numbers" required><br><br>
        <input type="radio" id="max" name="operation" value="max" required>
        <label for="max">Find Max</label><br>
        <input type="radio" id="min" name="operation" value="min">
        <label for="min">Find Min</label><br>
        <input type="radio" id="perfect_square" name="operation" value="perfect_square">
        <label for="perfect_square">Find Perfect Squares</label><br>
        <input type="radio" id="even" name="operation" value="even">
        <label for="even">Find Even Numbers</label><br>
        <input type="radio" id="odd" name="operation" value="odd">
        <label for="odd">Find Odd Numbers</label><br>
        <input type="radio" id="sort" name="operation" value="sort">
        <label for="sort">Sort in Ascending Order</label><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numbers = explode(",", $_POST["numbers"]);
        $numbers = array_map('trim', $numbers);
        $numbers = array_map('intval', $numbers);

        $operation = $_POST["operation"];

        switch ($operation) {
            case "max":
                $max = max($numbers);
                echo "<h2>Max Value: $max</h2>";
                break;

            case "min":
                $min = min($numbers);
                echo "<h2>Min Value: $min</h2>";
                break;

            case "perfect_square":
                echo "<h2>Perfect Squares:</h2>";
                foreach ($numbers as $number) {
                    if (sqrt($number) == floor(sqrt($number))) {
                        echo "$number ";
                    }
                }
                break;

            case "even":
                echo "<h2>Even Numbers:</h2>";
                foreach ($numbers as $number) {
                    if ($number % 2 == 0) {
                        echo "$number ";
                    }
                }
                break;

            case "odd":
                echo "<h2>Odd Numbers:</h2>";
                foreach ($numbers as $number) {
                    if ($number % 2 != 0) {
                        echo "$number ";
                    }
                }
                break;

            case "sort":
                sort($numbers);
                echo "<h2>Sorted Numbers:</h2>";
                echo implode(", ", $numbers);
                break;
            ;

            default:
                echo "<h2>Invalid Operation</h2>";
                break;
        }
    }
    ?>
</body>
</html>
