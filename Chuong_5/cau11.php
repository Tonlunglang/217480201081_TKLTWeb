<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colorful Text</title>
</head>
<body>
    <?php
    $colors = ['black', 'blue', 'green', 'red', 'brown', 'magenta'];
    $text = 'black blue green red brown magenta';
    
    // Tạo mảng chứa các từ trong câu
    $words = explode(' ', $text);

    // Hiển thị mỗi từ với màu tương ứng
    foreach ($words as $word) {
        $color = array_shift($colors); // Lấy màu đầu tiên ra khỏi mảng
        if (empty($color)) { // Nếu hết màu, lặp lại mảng màu
            $colors = ['black', 'blue', 'green', 'red', 'brown', 'magenta'];
            $color = array_shift($colors);
        }
        echo "<span style='color: $color'>$word </span>";
    }
    ?>
</body>
</html>
