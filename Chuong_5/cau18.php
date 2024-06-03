<?php
// Chuỗi cần kiểm tra
$s = "TRUONG DAI HOC BAC LIEU.";

// Tách chuỗi thành các từ
$words = explode(" ", $s);

// Khởi tạo biến lưu trữ từ có độ dài lớn nhất
$longest_word = "";
$sokytu = 0;

// Lặp qua từng từ và tìm từ có độ dài lớn nhất
foreach ($words as $word) {
    // Loại bỏ các ký tự đặc biệt từ các từ
    $word = preg_replace('/[^a-zA-Z]/', '', $word);
    
    $chieudai = strlen($word);

    // Kiểm tra độ dài của từ
    if (strlen($word) > strlen($longest_word)) {
        $longest_word = $word;
        $sokytu = $chieudai;
    }
}

// Hiển thị từ có độ dài lớn nhất
echo "Từ có số ký tự nhiều nhất trong chuỗi là: $longest_word, $sokytu ký tự.";
?>
