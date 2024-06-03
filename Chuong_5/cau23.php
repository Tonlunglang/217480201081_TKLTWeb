<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploadfile</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileupload" value="">
        <input type="submit" name="up" value="upload">
    </form>
    <?php
    $dish = "Tailieu/";
    if(isset($_POST['up']) && 
    isset($_FILES['fileupload'])){
        if($_FILES['fileupload'] ['error'] > 0)
        echo "Upload error";
    else{
        move_uploaded_file($_FILES['fileupload']['tmp_name'],
        $dish.$_FILES['fileupload']['name']);
        echo "Upload success <br>";
        echo "Duong dan: Tailieu/".$_FILES['fileupload']['name']."<br>";
        echo "Loai file: ".$_FILES['fileupload']['type']."<br>";
        echo "Dung luong: ".((int)($_FILES['fileupload']['size'] / 1024))."KB";
    }
    }
    ?>
</body>
</html>