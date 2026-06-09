<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Home' ?></title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-items">
                <a href="<?= BASE_URL ?>" class="nav-link text-uppercase"><b>HOME</b></a>
            </li>
            <li class="nav-items">
                <a href="<?= BASE_URL ?>?action=products" class="nav-link text-uppercase"><b>Danh sách sản phẩm</b></a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h1 class="mt-3 mb-3"><?= $title ?? 'Home' ?></h1>
        <div class="row">
            <?php 
            if(isset($view)) {
                require_once PATH_VIEW.$view.'.php';
            } ?>
        </div>
    </div>
</body>
</html>