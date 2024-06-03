<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Nhiều file</title>
</head>
<body>
    <form action="uploadfile.php" method="post" enctype="multipart/form-data">
    Files upload:<br>
    File 1: <input type="file" name="myfile[]"/><br>
    File 2: <input type="file" name="myfile[]"/><br>
    File 3: <input type="file" name="myfile[]"/><br>
    <input type="submit" value="upload"/>
    </form>
</body>
</html>