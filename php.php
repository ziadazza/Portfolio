<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = htmlspecialchars($_POST['name']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email    = htmlspecialchars($_POST['email']);
    $phone    = htmlspecialchars($_POST['phone']);
    $subject  = htmlspecialchars($_POST['subject']);
    $message  = htmlspecialchars($_POST['message']);

    $data = "Name: $name $lastname\nEmail: $email\nPhone: $phone\nSubject: $subject\nMessage: $message\n---\n";
    file_put_contents("messages.txt", $data, FILE_APPEND);

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ziadtayloun314@gmail.com'; // ✨ ضع إيميلك
        $mail->Password   = 'hxcy xozt letl wlvo';   
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;


        $mail->setFrom('ziadtayloun314@gmail.com', 'Portfolio Website');
        $mail->addAddress('ziadtayloun314@gmail.com');


        $mail->isHTML(false);
        $mail->Subject = "📬 New Contact Form Submission: $subject";
        $mail->Body    = "Name: $name $lastname\nEmail: $email\nPhone: $phone\nSubject: $subject\nMessage:\n$message";

        $mail->send();
        header("Location: index.html");
        exit();
    } catch (Exception $e) {
        echo "❌ Message saved, but email failed to send. Error: {$mail->ErrorInfo}";
    }
}