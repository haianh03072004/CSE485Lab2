<?php
require_once ('./models/User.php');
require_once('./config/database.php');
$db = DatabaseConfig::getConnection();
class AdminController
{   
    private $admin;
    public function __construct($db){
        $this->admin = new User($db);
    }
    
    // Hiển thị form đăng nhập
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Kiểm tra tài khoản admin
            $check = $admin->checkAdminLogin($username, $password);
            if (!$check) {
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];
                header('Location: index.php');
                exit();
            } else {
                $error = 'Tên đăng nhập hoặc mật khẩu không đúng!';
            }
        }

        require_once 'views/admin/login.php';
    }

    // Xử lý đăng xuất
    public function logout()
    {
        session_destroy();
        header('Location: index.php?controller=admin&action=login');
        exit();
    }

    // Dashboard của admin 
    public function dashboard()
    {
        if (!isset($_SESSION['admin_id'])) {
            require_once 'models/News.php';
            require_once('./config/database.php');
            $db = DatabaseConfig::getConnection();

            $NewsModel = new NewsModel($db);
            $rows = $NewsModel->getAllNews();
            require_once 'views/admin/dashboard.php';
            exit();
        }

        require_once 'models/User.php';
        $userModel = new User();
        $admins = $userModel->getAllAdmins();

        require_once 'views/admin/dashboard.php';
    }

    // Xóa tài khoản admin
    public function deleteAdmin()
    {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: index.php?controller=admin&action=login');
            exit();
        }

        $adminId = $_GET['id'] ?? 0;

        require_once 'models/User.php';
        $userModel = new User();
        $userModel->deleteAdmin($adminId);

        header('Location: index.php?controller=admin&action=dashboard');
        exit();
    }
}
?>