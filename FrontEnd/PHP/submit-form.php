<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($name) && !empty($email) && !empty($message)) {
        $mail = new PHPMailer(true);

        try {
           
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';         
            $mail->SMTPAuth   = true;
            $mail->Username   = 'businesscareams@gmail.com';     
            $mail->Password   = 'fgaf auib bcfn gkgp';  
            $mail->SMTPSecure = 'tls';                      
            $mail->Port       = 587;                       

          
            $mail->setFrom($email, $name);
            $mail->addAddress('businesscareams@gmail.com'); 

            $mail->Subject = "Nouveau message de $name via le formulaire";
            $mail->Body    = "Nom: $name\nEmail: $email\n\nMessage:\n$message";

            $mail->send();
            echo "Message envoyé avec succès !";
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi : {$mail->ErrorInfo}";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
} else {
    echo "Méthode non autorisée.";
}

header("Location: client.php?message=sent");
exit();

