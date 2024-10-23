<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// define('MAILHOST',"<smtp address>"); // Google : smtp.gmail.com
// define('USERNAME',"<smtp username>"); // Gmail E-Mail
// define('PASSWORD',"<smtp password>"); // Gmail App Password
// define('SEND_FROM',"<sender name>");  
// define('SEND_FROM_NAME','<send from name>'); 
// define('REPLY_TO',"");
// define('REPLY_TO_NAME','');


function sendEmail($email,$subject,$message){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = MAILHOST;
    $mail->Username = USERNAME;
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom(SEND_FROM,SEND_FROM_NAME);
    $mail->addAddress($email);
    $mail->addReplyTo(REPLY_TO,REPLY_TO_NAME);
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;
    if(!$mail->send())
        return 0;
    else{
        return 1;
    }
}

?>


<?php

    if(isset($_POST['send'])){
        if(sendEmail(htmlspecialchars(stripslashes(trim($_POST['email']))),"Nullablege Mailer", htmlspecialchars(stripslashes(trim($_POST['subject']))), htmlspecialchars(stripslashes(trim($_POST['message']))),"Your browser does not support HTML Template" )){
            echo "<div class='alert alert-success text-center mt-0'>Mail Send</div>";
        }
        else{
            echo "<div class='alert alert-danger text-center mt-0'>Error</div>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
            <form class="text-center" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">E-Mail</label>
                    <input type="email" class="form-control" name="email"  aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">Subject</label>
                    <input type="text" class="form-control" name="subject"  aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">Message</label>
                    <input type="text" class="form-control" name="message"  aria-describedby="emailHelp">
                </div>

                <button type="submit" name="send" class="btn btn-primary w-100">Send Mail</button>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>