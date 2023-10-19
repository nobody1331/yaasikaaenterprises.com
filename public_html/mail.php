<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
    echo 'Please fill out all the fields.';
    exit;
}

// Get the form data
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

// Create the email message
// $body = "Name: $name\nEmail: $email\nPhone: $phone\n\n$message";
$body = "Hi,\n\n";
$body .= "You have received a new message from your website contact us form:\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Message: $message\n\n";
$body .= "Thank you\n\n";

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    //Server settings        
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contactus@yaasikaaenterprises.com';         // SMTP username
    $mail->Password   = 'India@2023';                   // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('contactus@yaasikaaenterprises.com', 'Yaasikaa Enterprises');
    $mail->addCustomHeader('From', $email);
    $mail->addAddress('contactus@yaasikaaenterprises.com');   // Add a recipient

    // Content
    $mail->isHTML(false);                                       // Set email format to plain text
    $mail->Subject = 'New Mail';
    $mail->Body    = $body;

    $mail->send();
    header("Location: thankyou");

} catch (\Exception $e) {
    echo 'There was an error sending your message. Please try again later.';
}

?>



