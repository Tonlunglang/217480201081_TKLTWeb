<?php
echo "Chao ban, <br>";
if(isset($_COOKIE['tgTruycap'])){
    echo "Thoi gian truy cap gan day nhat la: ".date('d/m/Y H:i:s', $_COOKIE['tgTruycap']);
    setcookie('tgTruycap', time(), time() + 600);
}
else{
    setcookie('tgTruycap', time(), time() + 600);
}
?>