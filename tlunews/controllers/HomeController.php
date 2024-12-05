<?php
    class HomeController{
        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }
        public function index(){
            require ('./models/News.php');
            require ('./models/Category.php');
            $New = new NewsModel($this->conn);
            $cate = new CategoryModel($this->conn);
            $rows = $New->getAllNews();
            $cats = [];
            foreach($rows as $row){
                    array_push($cats,$cate->getCateName($row['id']));
            }
            include('./views/home/index.php');

        }

    }

?>