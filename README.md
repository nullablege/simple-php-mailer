# 📬 Nullablege Mailer - Basit ve Güvenli PHP E-posta Gönderim Sistemi

![PHP Mailer Logo](https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/examples/images/phpmailer.png) <!-- PHPMailer'ın genel bir logosunu ekledim, projenize özel bir logonuz varsa onu kullanabilirsiniz -->

**Nullablege Mailer**, PHP kullanarak SMTP üzerinden güvenli ve kolay bir şekilde e-posta göndermek için tasarlanmış **minimalist ve etkili bir web uygulamasıdır.** Bu proje, PHPMailer gibi endüstri standardı bir kütüphaneyi temel alarak, e-postaların spam klasörüne düşme riskini azaltır ve geliştiricilere e-posta gönderim süreçlerinde esneklik sunar.

Uygulama, temel bir HTML arayüzü üzerinden alıcı e-posta adresi, konu ve mesaj içeriği bilgilerini alarak, yapılandırılmış SMTP ayarları üzerinden e-postaları hedefine ulaştırır. **Güvenlik ve basitlik** ön planda tutularak geliştirilmiştir.

---

## 🌟 Temel Özellikler

*   **Güvenli SMTP Gönderimi:** E-postaları SMTP (Simple Mail Transfer Protocol) üzerinden, STARTTLS şifrelemesi kullanarak güvenli bir şekilde gönderir. Bu, PHP'nin dahili `mail()` fonksiyonuna göre çok daha güvenilir bir yöntemdir.
*   **PHPMailer Entegrasyonu:** E-posta gönderim işlemleri için yaygın olarak kullanılan, robust ve özellik zengini **PHPMailer** kütüphanesini kullanır.
*   **Yapılandırılabilir SMTP Ayarları:**
    *   SMTP sunucu adresi (`MAILHOST`).
    *   SMTP kullanıcı adı (`USERNAME`) ve şifresi (`PASSWORD`).
    *   Gönderen e-posta adresi (`SEND_FROM`) ve gönderen adı (`SEND_FROM_NAME`).
    *   Yanıtların yönlendirileceği e-posta adresi (`REPLY_TO`) ve adı (`REPLY_TO_NAME`) (isteğe bağlı).
*   **HTML E-posta Desteği:** Gönderilen mesajlar HTML formatında olabilir (`$mail->IsHTML(true)`), bu sayede zengin içerikli e-postalar oluşturulabilir. (Mevcut formda sadece düz metin mesaj alınıyor, ancak altyapı HTML'i destekliyor.)
*   **Basit Kullanıcı Arayüzü:**
    *   Bootstrap 5 kullanılarak temel ve anlaşılır bir HTML formu sunar.
    *   Kullanıcıdan alıcı e-posta adresi, konu ve mesajı girmesi istenir.
*   **Anlık Geri Bildirim:** E-posta gönderiminin başarılı olup olmadığına dair kullanıcıya anlık olarak bilgi mesajları (success/danger alert) gösterir.
*   **Giriş Güvenliği:** Formdan alınan veriler `htmlspecialchars()`, `stripslashes()` ve `trim()` fonksiyonları ile temel XSS (Cross-Site Scripting) saldırılarına ve gereksiz boşluklara karşı arındırılır.
*   **Minimal Bağımlılık:** Ana işlevsellik için sadece PHPMailer kütüphanesine ve temel HTML/CSS (Bootstrap) bilgisine dayanır.

---

## 🛠️ Kullanılan Teknolojiler ve Kütüphaneler

*   **Backend:** PHP
*   **E-posta Kütüphanesi:** PHPMailer (Manuel olarak `PHPMailer/src/` dizini altına eklenmiş gibi görünüyor. Composer ile yönetilmesi daha modern bir yaklaşımdır.)
*   **Frontend:** HTML5, CSS3 (Bootstrap 5)
*   **Güvenlik Fonksiyonları:**
    *   `htmlspecialchars()`, `stripslashes()`, `trim()`: Temel girdi temizliği için.

---

## 📁 Dosya Yapısı

Proje aşağıdaki basit dosya yapısına sahiptir:

```
nullablege-mailer/
├── PHPMailer/
│ ├── src/
│ │ ├── Exception.php
│ │ ├── PHPMailer.php
│ │ └── SMTP.php
│ └── ... (PHPMailer'ın diğer dosyaları)
├── README.md # Bu dosya
└── m.php # Ana uygulama dosyası (E-posta gönderme fonksiyonu ve HTML formu)
```
## ⚙️ Kurulum ve Yapılandırma

Bu script'i çalıştırmadan önce aşağıdaki adımları takip etmeniz gerekmektedir:

1.  **PHP Ortamı:**
    Sisteminizde PHP'nin çalıştığı bir web sunucusunun (Apache, Nginx vb. ile XAMPP, WAMP, MAMP gibi paketler) kurulu olduğundan emin olun.

2.  **PHPMailer Kütüphanesi:**
    Proje dosyasında `PHPMailer` klasörü ve içindeki `src` alt klasörünün (Exception.php, PHPMailer.php, SMTP.php dosyalarını içeren) doğru şekilde yerleştirildiğinden emin olun. Eğer bu dosyalar eksikse, [PHPMailer GitHub deposundan](https://github.com/PHPMailer/PHPMailer) indirip projenize eklemeniz gerekmektedir.
    *   **Öneri:** Daha modern bir yaklaşım için, PHPMailer'ı Composer ile projenize dahil etmeniz önerilir: `composer require phpmailer/phpmailer`

3.  **SMTP Sunucu Ayarları:**
    `m.php` dosyasının en üst kısmında bulunan aşağıdaki `define` ile tanımlanmış sabitleri **kendi e-posta gönderici hesap bilgilerinizle** doldurmanız gerekmektedir (yorum satırları kaldırılmalı):
    ```php
    // define('MAILHOST',"<smtp address>"); // Örn: "smtp.gmail.com"
    // define('USERNAME',"<smtp username>"); // Örn: "kullanici_adiniz@gmail.com"
    // define('PASSWORD',"<smtp password>"); // Örn: "gmail_uygulama_sifreniz"
    // define('SEND_FROM',"<sender name>");  // Örn: "kullanici_adiniz@gmail.com"
    // define('SEND_FROM_NAME','<send from name>'); // Örn: "Nullablege Mailer"
    // define('REPLY_TO',""); // İsteğe bağlı, örn: "yanit_adresiniz@example.com"
    // define('REPLY_TO_NAME',''); // İsteğe bağlı, örn: "Destek Ekibi"
    ```
    **Önemli Güvenlik Notu:** E-posta şifrenizi doğrudan koda yazmak güvenlik açısından risklidir. Üretim ortamlarında bu tür hassas bilgilerin ortam değişkenleri (environment variables) veya sunucuda korunan ayrı bir yapılandırma dosyası aracılığıyla yönetilmesi şiddetle tavsiye edilir.
    *   **Gmail Kullanıcıları İçin:** Gmail ile SMTP üzerinden e-posta göndermek için Google Hesabınızda "Daha az güvenli uygulama erişimi" ayarını açmanız (artık önerilmiyor) veya **"Uygulama Şifresi"** oluşturmanız gerekmektedir. Bu, 2 Faktörlü Kimlik Doğrulama etkinleştirildiğinde özellikle önemlidir.

---

## 🚀 Nasıl Çalıştırılır?

1.  Yukarıdaki "Kurulum ve Yapılandırma" adımlarını tamamladığınızdan emin olun.
2.  Proje dosyalarını web sunucunuzun yayın dizinine (örn: `htdocs`, `www`) kopyalayın.
3.  Web tarayıcınızı açın ve `m.php` dosyasına gidin (örn: `http://localhost/proje_klasor_adi/m.php`).
4.  Karşınıza çıkan formda:
    *   **E-Mail:** E-postanın gönderileceği alıcının adresini girin.
    *   **Subject:** E-postanın konusunu girin.
    *   **Message:** E-posta mesajının içeriğini girin.
5.  "Send Mail" butonuna tıklayın.
6.  E-posta gönderiminin başarılı olup olmadığına dair sayfanın üst kısmında bir bildirim mesajı görüntülenecektir.

---

## 🧠 Nasıl Çalışıyor? (Teknik Detaylar)

1.  **Kullanıcı Arayüzü (`m.php` HTML kısmı):**
    *   Bootstrap 5 ile tasarlanmış basit bir HTML formu, kullanıcıdan alıcı e-posta, konu ve mesaj bilgilerini alır.
    *   Form gönderildiğinde (`$_POST['send']` kontrolü), veriler aynı sayfaya (`m.php`) POST metodu ile iletilir.

2.  **Form Veri İşleme ve E-posta Gönderme (`m.php` PHP kısmı):**
    *   Sayfanın en başında PHPMailer kütüphanesinin gerekli dosyaları `require` ile dahil edilir.
    *   SMTP ayarları `define` ile sabit olarak tanımlanmıştır (kullanıcının düzenlemesi gereken kısım).
    *   Form gönderildiğinde (`if(isset($_POST['send']))`):
        *   Alınan e-posta, konu ve mesaj verileri `htmlspecialchars(stripslashes(trim(...)))` fonksiyonlarından geçirilerek temel güvenlik önlemleri alınır.
        *   `sendEmail()` fonksiyonu çağrılır.
    *   **`sendEmail($email, $subject, $message)` Fonksiyonu:**
        *   Yeni bir `PHPMailer` nesnesi oluşturulur (`$mail = new PHPMailer(true);`). `true` parametresi, istisnaların (exceptions) fırlatılmasını sağlar.
        *   `$mail->isSMTP()`: E-postanın SMTP kullanılarak gönderileceği belirtilir.
        *   `$mail->SMTPAuth = true;`: SMTP kimlik doğrulaması etkinleştirilir.
        *   `MAILHOST`, `USERNAME`, `PASSWORD`, `SMTPSecure` (`ENCRYPTION_STARTTLS`), `Port` (587) gibi sunucu ve kimlik bilgileri ayarlanır.
        *   `$mail->setFrom()`: Gönderen e-posta adresi ve adı ayarlanır.
        *   `$mail->addAddress()`: Alıcı e-posta adresi eklenir.
        *   `$mail->addReplyTo()`: E-postaya yanıt verildiğinde kullanılacak adres ve ad ayarlanır (isteğe bağlı).
        *   `$mail->IsHTML(true);`: E-postanın HTML formatında olacağı belirtilir.
        *   `$mail->Subject`: E-postanın konusu ayarlanır.
        *   `$mail->Body`: E-postanın HTML içeriği (bu örnekte formdan gelen düz metin).
        *   `$mail->AltBody`: HTML e-postayı görüntüleyemeyen istemciler için düz metin alternatif içerik.
        *   `$mail->send()`: E-postayı göndermeye çalışır.
        *   Fonksiyon, gönderme işlemi başarılıysa `1`, başarısızsa `0` döndürür.
    *   `sendEmail()` fonksiyonunun dönüş değerine göre kullanıcıya başarı veya hata mesajı gösterilir.

---

## ⚠️ Önemli Notlar

*   **Güvenlik:** Hassas SMTP şifreleri gibi bilgilerin doğrudan kod içerisine yazılması yerine, ortam değişkenleri (environment variables) veya web sunucusu tarafından korunan yapılandırma dosyaları kullanılması daha güvenli bir yaklaşımdır.
*   **Hata Yönetimi:** `sendEmail` fonksiyonu basitçe 0 veya 1 döndürür. Daha detaylı hata mesajları için PHPMailer'ın fırlattığı `Exception`'ları yakalamak ve kullanıcıya daha bilgilendirici mesajlar sunmak (veya loglamak) daha iyi olabilir:
    ```php
    // try {
    //     $mail->send();
    //     return 1;
    // } catch (Exception $e) {
    //     // error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    //     return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Veya özel bir hata kodu
    // }
    ```
*   **Kütüphane Yönetimi:** PHPMailer'ı manuel olarak projeye dahil etmek yerine, PHP projelerinde bağımlılık yönetimi için standart olan **Composer** kullanılması şiddetle tavsiye edilir. Bu, kütüphanenin kurulumunu, güncellenmesini ve projenin taşınabilirliğini büyük ölçüde kolaylaştırır.

---

## 🚀 Gelecekteki Geliştirmeler İçin Fikirler

*   **Gelişmiş Form Doğrulama:** E-posta formatı, boş alan kontrolleri gibi doğrulamaların hem istemci (JavaScript) hem de sunucu (PHP) tarafında daha kapsamlı yapılması.
*   **HTML Şablon Desteği:** E-posta mesajlarını sabit HTML şablonlarından okuyup dinamik verilerle doldurma özelliği.
*   **Dosya Eki (Attachment) Desteği:** E-postalara dosya ekleyebilme.
*   **Çoklu Alıcı Desteği:** Aynı anda birden fazla alıcıya (To, Cc, Bcc) e-posta gönderebilme.
*   **Kullanıcı Arayüzü Geliştirmeleri:** Mesaj içeriği için zengin metin editörü (WYSIWYG) entegrasyonu.
*   **Veritabanı Entegrasyonu:** Gönderilen e-postaların detaylarının (alıcı, konu, tarih, durum vb.) bir veritabanına kaydedilmesi ve bir "Gönderilenler Kutusu" arayüzü.
*   **SMTP Ayarlarını Arayüzden Yapılandırma:** Hassas SMTP bilgilerini koddan çıkarıp, güvenli bir yönetici arayüzünden ayarlanabilir hale getirme.

---

Nullablege Mailer, basitliği ve **PHPMailer**'ın gücünü bir araya getirerek, temel e-posta gönderim ihtiyaçları için **hızlı ve etkili bir başlangıç noktası** sunmaktadır. Özellikle küçük projeler veya hızlı prototipleme için idealdir.
