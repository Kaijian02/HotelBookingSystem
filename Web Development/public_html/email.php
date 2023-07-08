<?php
require 'D:/xampp/htdocs/PHPMailer-6.8.0/src/PHPMailer.php';
require 'D:/xampp/htdocs/PHPMailer-6.8.0/src/SMTP.php';
require 'D:/xampp/htdocs/PHPMailer-6.8.0/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate form data (you can customize this according to your requirements)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        // Handle validation error, display an error message, or redirect back to the form page
        echo "All fields are required.";
        exit;
    }

    // Predefined recipient email address
    $to = "lawkaijian@gmail.com";  // Replace with the recipient email address

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration for Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jerrylaw02@gmail.com';  // Replace with your Gmail email address
        $mail->Password = 'zijexuiygafhswks';  // Replace with your Gmail account password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set sender and recipient information
        $mail->setFrom($email, $name);
        $mail->addAddress($to);

        // Set email subject and body
        $mail->Subject = $subject;
        $mail->Body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

        // Send the email
        $mail->send();

        // Email sent successfully
         echo "<script>alert('Email sent.'); window.location.href = 'Contact.php';</script>";
        //header("Location: Contact.php");
    } catch (Exception $e) {
        // Error occurred while sending email
        echo "Sorry, an error occurred while sending the email. Error: " . $mail->ErrorInfo;
    }
} else {
    // Handle non-POST requests, redirect back to the form page
    header("Location: index.html");
    exit;
}
?>
