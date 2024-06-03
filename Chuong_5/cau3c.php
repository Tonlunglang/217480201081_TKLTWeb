<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cau3c</title>
</head>
<body>
    <?php
    do{
        $x = rand(1, 100);
        $y= rand(1, 100);
    }while($x <= $y)
    ?>
    <?php
        echo "Cộng: $x + $y = ".($x + $y)."<br>";
        echo "Trừ: $x - $y = ".($x - $y)."<br>";
        echo "Nhân: $x * $y = ".($x * $y)."<br>";
        echo "Chia: $x / $y = ".($x / $y)."<br>";
        echo "Chia lấy dư: $x % $y = ".($x % $y)."<br>";
    ?>
</body>
</html>