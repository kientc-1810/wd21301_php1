<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/' => (new HomeController)->index(),
    // Hiển thị danh sách sản phẩm
    'products' => (new ProductController)->index(),

};
