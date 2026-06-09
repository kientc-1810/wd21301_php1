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

    // validate dữ liệu
    private function validate($data= []){
        $error = [];
        if(empty($data['name'])){
            $error[] = "Tên sản phẩm không được bỏ trống";
        }
        if(empty($data['price'])){
            $error[] = "Giá sản phẩm không được bỏ trống";
        }elseif(!is_numeric($data['price']) || $data['price'] < 0){
            $error[] = "Giá sản phẩm phải là số dương";
        }
        if(empty($data['stock'])){
            $error[] = "Số lượng sản phẩm không được bỏ trống";
        }elseif(!is_numeric($data['stock']) || $data['stock'] < 0){
            $error[] = "Số lượng sản phẩm phải là số dương";
        }
        if(empty($data['id_category'])){
            $error[] = "Danh mục không được bỏ trống";
        }
        return $error;
    }
    // validate file
    private function validateImage($data=[]){
        $error = [];
        if(empty($data['image']['name'])){
            $error[] = "Ảnh không được bỏ trống";
        }else{
            // định dạng file
            $allowedType = ['image/jpeg','image/png','image/gif'];
            if(!in_array($data['image']['type'], $allowedType)){
                $error[] = "Ảnh sản phẩm phải đúng định dạng(jpeg,png,gif)";
            }
            // kích thước file tối đa 2MB
            $maxSize = 2 * 1024 *1024;
            if($data['image']['size']>$maxSize){
                $error[] = "Ảnh không được lớn hơn 2MB";
            }
        }
        return $error;
    }

    // Hiển thị ra form thêm (get)
    public function create(){
        $title = "Thêm sản phẩm";
        $view = "products/create";
        // lấy đc các giá trị của category
        $categories = $this->categoryModle->getAll();
        require_once PATH_VIEW_MAIN;
    }

    // post dữ liệu của thêm
    public function store(){
        $errors = $this->validate($_POST);
        $imageErrors = $this->validateImage($_FILES);
        if(!empty($errors) || !empty($imageErrors)){
            $errors = array_merge($errors,$imageErrors);
            $_SESSION['error'] = $errors;
            header("Location: ".BASE_URL."?action=product/create");
            exit;
        }else{
            $data = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'description' => $_POST['description'],
                'id_category' => $_POST['id_category'],
                'image' => null,
            ];
            // xử lý upload file
            try{
                $imagePath = upload_file('products',$_FILES['image']);
                $data['image'] = $imagePath;
            }catch(Exception $e){
                $_SESSION['error'] = $e->getMessage();
                header("Location: ".BASE_URL."?action=product/create");
                exit;
            }
            if($this->productModel->create($data)){
                $_SESSION['success'] = "Sản phẩm đã thêm thành công";
                header("Location: ".BASE_URL."?action=products");
                exit;
            }else{
                $_SESSION['error'] = "Thêm sản phẩm thất bại";
                header("Location: ".BASE_URL."?action=product/create");
                exit;
            }
        }
    }
}