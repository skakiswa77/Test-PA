<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var($_POST['newsletter_email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


        file_put_contents('subscribers.txt', $email . PHP_EOL, FILE_APPEND);

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'businesscareams@gmail.com'; 
            $mail->Password = 'fgaf auib bcfn gkgp'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;


            $mail->setFrom('businesscareams@gmail.com', 'Business Care');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Bienvenue à la newsletter Business Care !';
            $mail->Body = "
                <h2>Merci pour votre inscription !</h2>
                <p>Vous recevrez prochainement nos actualités bien-être et nos événements.</p>
                <p>À très vite !</p>
                <hr>
                <p style='color: gray;'>Business Care - Bien-être en entreprise</p>
            ";

            $mail->send();
            header("Location: index.php?newsletter=success");
        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            header("Location: index.php?newsletter=error");
        }

    } else {
        header("Location: index.php?newsletter=invalid");
    }
}

