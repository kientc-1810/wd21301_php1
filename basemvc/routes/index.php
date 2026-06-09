<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/' => (new HomeController)->index(),
    // Hiển thị danh sách sản phẩm
    'products' => (new ProductController)->index(),
    // trả về form thêm
    'product/create' => (new ProductController)->create(),
    // xử lý thêm
    'product/store' => (new ProductController)->store(),
};
