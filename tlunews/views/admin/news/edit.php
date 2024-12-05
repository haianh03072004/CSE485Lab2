<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa bài viết</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Chỉnh sửa bài viết</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" id="title" name="title" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Danh mục</label>
            <input type="text" id="category" name="category" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Hình ảnh</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật bài viết</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html>
