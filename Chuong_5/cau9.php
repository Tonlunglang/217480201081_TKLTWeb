<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Cửu Chương</title>
    <style>
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 15px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: center;
            padding: 10px;
        }
        h1 {
            text-align: center;
            margin: 0;
            padding: 10px 0;
        }
        .inner-table {
            border-spacing: 5px;
            width: 100%;
        }
        .inner-table td {
            border: none;
        }
    </style>
</head>
<body>
    <h1>BẢNG CỬU CHƯƠNG</h1>
    <table>
        <tr>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<td>";
                echo "<table class='inner-table'>";
                for ($j = 1; $j <= 10; $j++) {
                    echo "<tr><td>{$i} x {$j} = " . ($i * $j) . "</td></tr>";
                }
                echo "</table>";
                echo "</td>";
                if ($i % 5 == 0) { // Sau 5 bảng nhân, xuống dòng
                    echo "</tr><tr>";
                }
            }
            ?>
        </tr>
    </table>
</body>
</html>
