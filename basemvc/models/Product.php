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

    // Lấy sản phẩm theo id (trang chi tiết, chức năng sửa sản phẩm)
    public function getById($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Cập nhật sản phẩm
    public function update($data){
        $sql = "UPDATE {$this->table} SET name = :name, price = :price, stock = :stock, 
                image = :image, description = :description, id_category = :id_category
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'image' => $data['image'],
            'description' => $data['description'],
            'id_category' => $data['id_category']
        ]);
    }

    // Xóa sản phẩm theo id
    public function delete($id){
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}