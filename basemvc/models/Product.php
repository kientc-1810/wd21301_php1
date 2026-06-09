<?php

class Product extends BaseModel{
    // khai báo thuộc tính
    protected $table = 'products';
    // lấy ra danh sách sản phẩm
    public function getAll(){
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    // xây dựng hàm chức năng thêm
    public function create($data){
        $sql = "INSERT INTO {$this->table} (name, price, stock, image, description, id_category)
        VALUES (:name, :price, :stock, :image, :description, :id_category)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'name' => $data['name'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'image' => $data['image'],
            'description' => $data['description'],
            'id_category' => $data['id_category'],
        ]);
    }
}