README (English)
Mail System using PHPMailer
This project is a basic mail system that uses PHPMailer to send emails through an SMTP server. You can customize the sender's details, subject, and message body via a simple HTML form integrated with Bootstrap for styling.

Installation
Clone the repository or download the files manually.
Configure the email settings:
  Open the PHP file and define your SMTP credentials:
Run the project on a local server (like XAMPP or WAMP), or upload it to a web server with SMTP access.

Usage
After configuring the email settings, open the form in the browser.
Enter the recipient's email, subject, and message.
Click on the "Send Mail" button to send the email.
Success or error messages will be shown after submitting.
Files
PHPMailer/src/Exception.php: Handles exceptions for PHPMailer.
PHPMailer/src/PHPMailer.php: The core class for sending emails.
PHPMailer/src/SMTP.php: Handles the SMTP server settings.

Requirements
PHP 5.5 or later
PHPMailer library

README (Türkçe)
PHPMailer Kullanarak Mail Sistemi
Bu proje, SMTP sunucusu aracılığıyla PHPMailer kullanarak e-posta göndermek için basit bir mail sistemidir. Gönderenin bilgileri, konu ve mesaj içeriği Bootstrap ile stilize edilmiş basit bir HTML formu aracılığıyla özelleştirilebilir.

Kurulum
Depoyu klonlayın veya dosyaları manuel olarak indirin.
E-posta ayarlarını yapılandırın:
  PHP dosyasını açın ve SMTP kimlik bilgilerinizi girin
Projeyi çalıştırın: Yerel bir sunucuda (XAMPP veya WAMP gibi) çalıştırın veya SMTP erişimi olan bir web sunucusuna yükleyin.

Kullanım
E-posta ayarlarını yapılandırdıktan sonra formu tarayıcıda açın.
Alıcının e-postasını, konuyu ve mesajı girin.
"Send Mail" butonuna tıklayın.
Başarı veya hata mesajları gönderimden sonra gösterilecektir.
Dosyalar
PHPMailer/src/Exception.php: PHPMailer için hataları işler.
PHPMailer/src/PHPMailer.php: E-posta göndermek için temel sınıf.
PHPMailer/src/SMTP.php: SMTP sunucu ayarlarını işler.
Gereksinimler
PHP 5.5 veya üstü
PHPMailer kütüphanesi
