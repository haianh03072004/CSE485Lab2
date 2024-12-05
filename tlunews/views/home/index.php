<?php
    require_once ('./models/News.php');
    require_once('./config/database.php');
    $db = DatabaseConfig::getConnection();
    $New = new NewsModel($db);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $rows = $New->search($search);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Tin tức</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menu category -->
            <form action="index.php" method="GET" id="categoryForm" class="d-flex align-items-center">
                <label for="category" class="text-light me-2">Chọn danh mục:</label>
                <select name="category" id="category" class="form-select custom-select w-auto px-3 py-2" onchange="document.getElementById('categoryForm').submit()">
                    <option value="" selected>-- Chọn danh mục --</option>
                    <?php foreach($cats as $cat): ?>
                        <option value="<?php echo $cat; ?>">
                            <?php echo ucfirst($cat); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
            <!-- Nút Đăng nhập -->
            <a href="login.php" class="btn btn-outline-light ms-auto">Đăng nhập</a>
        </div>
    </div>
</nav>

    <!-- Search -->
    <div class="container mt-4">
        <form class="d-flex mb-4" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Tìm kiếm bài viết" value="<?php echo $search; ?>">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form>

        <!-- Tin tức -->
        <div class="row">
            <?php foreach($rows as $row): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <?php if ($row['image']): ?>
                            <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Ảnh bài viết">
                        <?php endif; ?>
                        <div class="card-body">
                            <h6 class="card-title"><?php echo substr($row['title'], 0, 50); ?></h6>
                            <p class="card-text"><?php echo substr($row['content'], 0, 50) . '...'; ?></p>
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>