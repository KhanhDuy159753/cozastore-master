<?php

use App\Model\thuonghieu;

$thuonghieu = new thuonghieu(1, 'Apple', 'apple.jpg');
$thuonghieu->hienthi();

$get_all = $thuonghieu->getall_thuonghieu();

if (isset($get_all)) {
    foreach ($get_all as $value) {
        $thuonghieu = new thuonghieu($value['id'], $value['ten'], $value['hinhanh']);
        $thuonghieu->hienthi();
    }
}
