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
}