<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr, th, td {
            text-align: center;
            padding: 10px 10px;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>Số n</th>
            <th>Số n<sup>2</sup></th>
        </tr>
        <?php
        for($i = 0;$i <= 50; $i++){
            $n = $i*$i;
            echo ("<tr>
            <td> $i </td> <td> $n </td> </tr>");
        }
        ?>
    </table>
</body>
</html>