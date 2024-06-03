<?php
// Chuỗi lớn
$s = "Hello, chao the gioi! Kính chào mọi người đến với PHP cùng với chúng thôi, ching chong";

// Chuỗi con cần đếm số lần xuất hiện
$sub_str = "ch";

// Sử dụng hàm substr_count() để đếm số lần xuất hiện của chuỗi con trong chuỗi lớn
$count = substr_count($s, $sub_str);

// Hiển thị số lần xuất hiện
echo "Số lần xuất hiện của chuỗi \"$sub_str\" trong chuỗi lớn là: $count";
?>
