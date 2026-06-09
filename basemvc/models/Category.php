<?php

class Category extends BaseModel{
    protected $table = "categories";
    // lấy ra tất cả danh mục
    public function getAll(){
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}