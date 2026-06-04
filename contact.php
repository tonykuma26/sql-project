<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
date_default_timezone_set('Asia/Kolkata');
$date = date("d M Y, h:i:s A") . " IST";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tomkum345@gmail.com';
    $mail->Password = 'dkjf icud serf dxrz';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->SMTPDebug = 0;



$mail->Subject = "NEW CONTACT FORM SUBMISSION";

$mail->Body = "
<html>
<body style='font-family:Arial,sans-serif;background:#f4f4f4;padding:20px;'>

<div style='display:none;max-height:0;overflow:hidden;'>
You have received a new enquiry from your website.
</div>

<div style='max-width:700px;margin:auto;background:#ffffff;border:1px solid #ddd;border-radius:8px;overflow:hidden;'>

    <div style='background:#28a745;color:#fff;padding:20px;text-align:center;'>
        <h2 style='margin:0;'>AK&Rj Digital Services</h2>
        <p style='margin:5px 0 0;'>New Contact Form Submission</p>
    </div>

<div style='max-width:700px;margin:auto;background:#ffffff;border:1px solid #ddd;border-radius:8px;overflow:hidden;'>


    <div style='padding:25px;'>

        <table width='100%' cellpadding='10' cellspacing='0' style='border-collapse:collapse;'>

            <tr>
                <td style='border-bottom:1px solid #eee;'><strong>Name</strong></td>
                <td style='border-bottom:1px solid #eee;'>$name</td>
            </tr>

            <tr>
                <td style='border-bottom:1px solid #eee;'><strong>Email</strong></td>
                <td style='border-bottom:1px solid #eee;'>$email</td>
            </tr>

<tr>
    <td style='border-bottom:1px solid #eee;'><strong>Contact Number</strong></td>
    <td style='border-bottom:1px solid #eee;'>$phone</td>
</tr>

            <tr>
                <td style='border-bottom:1px solid #eee;'><strong>Submitted On</strong></td>
                <td style='border-bottom:1px solid #eee;'>$date</td>
            </tr>

            <tr>
                <td valign='top'><strong>Message</strong></td>
                <td>$message</td>
            </tr>

        </table>

    </div>

    <div style='background:#f8f8f8;padding:15px;text-align:center;color:#777;font-size:12px;'>
        This notification was generated automatically from your website contact form.
    </div>

</div>

</body>
</html>";

$mail->AltBody =
"New Contact Form Submission

Name: $name
Email: $email
Phone: $phone
Date: $date

Message:
$message";

    $mail->setFrom('tomkum345@gmail.com', 'Contact Form');
    $mail->addAddress('tomkum345@gmail.com');

try {
    $mail->send();
session_start();
$_SESSION['form_submitted'] = true;
    header("Location: thankyou.php");
    exit();

} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Form</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f9e6e6;
}

.container{
    width:90%;
    max-width:1200px;
    margin:auto;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.left{
    width:45%;
}

.left h1{
    color:#8e5ca8;
    font-size:55px;
    margin-bottom:10px;
}

.line{
    width:100px;
    height:5px;
    background:#8e5ca8;
    border-radius:10px;
    margin-bottom:20px;
}

/* Styled Candidate Info Box */
.candidate-info {
    margin-bottom: 30px;
    background: rgba(255, 255, 255, 0.6);
    padding: 15px 20px;
    border-radius: 15px;
    border-left: 5px solid #8e5ca8;
}

.candidate-info p {
    font-size: 16px;
    color: #444;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
}

.candidate-info p:last-child {
    margin-bottom: 0;
}

.candidate-info strong {
    color: #8e5ca8;
    margin-right: 5px;
}

.contact-input{
    width:100%;
    height:55px;
    border:none;
    outline:none;
    border-radius:30px;
    padding:0 20px;
    margin-bottom:20px;
    background:#fff;
}

textarea.contact-input{
    height:150px;
    padding-top:15px;
    resize:none;
}

button{
    border:none;
    padding:15px 35px;
    border-radius:30px;
    background:linear-gradient(to right,#ff6b8b,#ff9a44);
    color:#fff;
    cursor:pointer;
    font-size:16px;
}

.right{
    width:45%;
    text-align:center;
}

.right img{
    width:100%;
    max-width:500px;
}

@media(max-width:768px){
    .container{
        flex-direction:column;
        padding:40px 0;
    }

    .left,
    .right{
        width:100%;
    }

    .right{
        margin-top:30px;
    }

    .left h1{
        font-size:40px;
    }
}
</style>
</head>

<body>

<div class="container">

    <div class="left">
        <h1>Get in touch</h1>
        <div class="line"></div>

        <!-- Added Candidate Details Here -->
        <div class="candidate-info">
            <p><strong>Name:</strong> Kritika Jain</p>
            <p><strong>Email:</strong> kritika.jain@example.com</p>
            <p><strong>Phone:</strong> +44 7123 456789</p>
            <p><strong>Location:</strong> United Kingdom</p>
        </div>

        <form method="POST">
            <input type="hidden" name="access_key" value="4d95f578-63df-4ff5-9dc4-e5f9f1e966bf">

            <input type="hidden" name="subject" value="Contact Form Submission">
            <input type="hidden" name="from_name" value="270 jhuggi jhopri coloney">
            <input type="hidden" name="redirect" value="false">

            <input type="text" name="name" class="contact-input" placeholder="Your Name" required>

            <input type="email" name="email" class="contact-input" placeholder="Your Email" required>

            <input type="text" name="phone" class="contact-input" placeholder="Your Contact Number" required>

            <textarea name="message" class="contact-input" placeholder="Your Message" required></textarea>

            <button type="submit">Submit →</button>

        </form>
    </div>

    <div class="right">
        <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="contact">
    </div>

</div>

</body>
</html>