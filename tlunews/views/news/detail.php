<?php
    require('../../config/databse.php');
    require('../../models/News.php');
    $db = DatabaseConfig::getConnection();
    $NEW = new NewsModel($db);
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id = $_GET['id'];
        $article = $NEW->getById($id);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo $article['title']; ?></h1>
        <p class="text-muted"><?php echo $article['created_at']; ?></p>
        <?php if ($article['image']): ?>
            <img src="<?php echo $article['image']; ?>" class="img-fluid mb-4" alt="Ảnh bài viết">
        <?php endif; ?>
        <p><?php echo $article['content']; ?></p>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>