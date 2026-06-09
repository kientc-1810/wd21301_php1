<?php
class ProductController{
    private Product $productModel;
    private Category $categoryModle;
    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModle = new Category();
    }
    public function index(){
        $products = $this->productModel->getAll();
        $view = 'products/index';
        $title = "Danh sach sản phẩm";
        require_once PATH_VIEW_MAIN;
    }
}