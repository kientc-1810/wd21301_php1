<?php
// Đọc và xóa thông báo
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>
<div class="col-12">
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($error as $err): ?>
                    <li><?= $err  ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>?action=product/store" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm">
        </div>
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="text" name="stock" class="form-control" placeholder="Nhập số lượng sản phẩm">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="id_category">
                <option selected>Chọn danh mục</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name']?></option>
                <?php endforeach; ?> 
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thểm sản phẩm</button>
        <a href="<?= BASE_URL ?>?action=products" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

