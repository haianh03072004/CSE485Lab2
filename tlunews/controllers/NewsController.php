
<?php
require('./models/News.php');
require('./models/Category.php');
require_once('./config/database.php');
$db = DatabaseConfig::getConnection();

class NewsController{
    private $New,$Cat;
    
    public function __construct($db){
        
        $this->New = new NewsModel($db);
        $this->Cat = new CategoryModel($db);
    }
    
    public function add() {
        require_once('./views/admin/news/add.php');
    
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryname = $_POST['category'];
    
            $cateID = $this->Cat->getCateID($categoryname);
            $imagePath1 = '';
            if (!empty($_FILES['image']['name'])) {
                $targetDir = "./image/";
                $imagePath1 = $targetDir . basename($_FILES['image']['name']);
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath1)) {
                    echo "Lỗi khi tải ảnh lên.";
                    exit;
                }
            }
    
            $date = date('Y-m-d H:i:s');
            $date_s = (string)$date;
            $this->New->AddNews($title, $content, $imagePath1, $date_s, $cateID);
            header("Location: index.php?url=Admin/dashboard");
        }
    }
    
    public function edit($id) {
        require("./views/admin/news/edit.php");
    
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryname = $_POST['category'];
    
            $cateID = $this->Cat->getCateID($categoryname);
            $imagePath1 = '';
            if (!empty($_FILES['image']['name'])) {
                $targetDir = "./image/";
                $imagePath1 = $targetDir . basename($_FILES['image']['name']);
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath1)) {
                    echo "Lỗi khi tải ảnh lên.";
                    exit;
                }
            }
    
            $date = date('Y-m-d H:i:s');
            $date_s = (string)$date;
            $this->New->updateNews($id, $title, $content, $imagePath1, $date_s, $cateID);
            header("Location: index.php?url=Admin/dashboard");
        }
    }
    
        public function delete($id){
            $this->New->DeleteNews($id);
            header("Location: index.php?url=Admin/dashboard");

        }
        


    }

?>