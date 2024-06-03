<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select</title>
</head>
<body>
    <h1 style="text-align: center;">SELECT</h1>
<?php
    $D = date("Y");
    echo "<select id='cars'>";
    for ($i = 1900; $i <= $D; $i++){
        echo "<option value=''>";
      
        echo $i;
        
        echo "</option>";
    }
    echo"</select>";
?>
</body>
</html>