<?php
// Đọc và xóa thông báo
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>
<div class="col-12">
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($error as $err): ?>
                    <li><?= $err  ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>?action=product/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="<?= $product['name'] ?? '' ?>" class="form-control" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" value="<?= $product['price'] ?? '' ?>" class="form-control" placeholder="Nhập giá sản phẩm">
        </div>
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="text" name="stock" value="<?= $product['stock'] ?? '' ?>" class="form-control" placeholder="Nhập số lượng sản phẩm">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div>
            <?php if (!empty($product['image'])): ?>
                <img src="<?= BASE_ASSETS_UPLOADS . $product['image'] ?>" alt="<?= $product['name'] ?>" width="100">
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="id_category">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"
                        <?= ($product['id_category'] ?? '') == $category['id'] ? 'selected' : '' ?>>
                        <?= $category['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
        <a href="<?= BASE_URL ?>?action=products" class="btn btn-secondary">Quay lại</a>
    </form>
</div>