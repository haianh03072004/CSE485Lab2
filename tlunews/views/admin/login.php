<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #2c3e50, #34495e); 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color:#34495e; 
        }

        .login-container {
            background: #2c3e50;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 350px;
            padding: 30px;
            text-align: center;
        }

        .login-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #ecf0f1; 
        }

        .login-container label {
            font-size: 14px;
            font-weight: 600;
            color: #ecf0f1;
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #34495e; 
            border-radius: 8px;
            font-size: 14px;
            background: #34495e; 
            color: #ecf0f1; 
        }

        .login-container input:focus {
            outline: none;
            border-color: #e67e22; 
            box-shadow: 0 0 8px rgba(230, 126, 34, 0.2);
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: #e67e22; 
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .login-container button:hover {
            background: #d35400; 
            transform: scale(1.05);
        }

        .login-container .forgot-password {
            font-size: 12px;
            color: #e67e22; 
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        .login-container .forgot-password:hover {
            text-decoration: underline;
        }

        @media (max-width: 400px) {
            .login-container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="dashboard.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>

            <a href="#" class="forgot-password">Forgot Password?</a>
        </form>
    </div>
</body>
</html>