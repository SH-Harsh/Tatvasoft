<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'view/phpmailer/Exception.php';
require_once 'view/phpmailer/PHPMailer.php';
require_once 'view/phpmailer/SMTP.php';

// $mail = new PHPMailer(true);

$alert = '';

// Function  

function sendMailwithAttachment($email, $subject, $body)
{


  try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '181200107053@asoit.edu.in'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'SHarsh@4421'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('181200107053@asoit.edu.in'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->send();
  } catch (Exception $e) {
    echo "$e";
  }
};

function sendMail($email, $subject, $body)
{


  try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '181200107053@asoit.edu.in'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'SHarsh@4421'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('181200107053@asoit.edu.in'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->send();
  } catch (Exception $e) {
    echo "$e";
  }
};


//Service Provider Register
// if (isset($_POST['contact_submit'])) {

//   $first_name = $_POST['first_name'];
//   $last_name = $_POST['last_name'];
//   $useremail = $_POST['email'];
//   $phone_no = $_POST['phone_no'];
//   $subject = $_POST['subject'];
//   $message = $_POST['message'];
//   $file_name = $_FILES['attachment']['name'];

//   $name = "$first_name " . "$last_name";

//   $email = '181200107053@asoit.edu.in';
//   $subject = 'Helperland  Contact Us Details';
//   $body = "<h3>Name : $name <br>Email: $useremail <br>Phone No : $phone_no<br> Subject : $subject<br> Message : $message <br>
//             FIle Name : $file_name</h3>";
  

//   sendMailwithAttachment($email, $subject, $body);
// }

// Forgot Password Mail 
// if (isset($_POST["fp_send"])) {
//   $fp_email = $_POST["fp_email"];

//   $subject = 'Change Password for Helperland';
//   $body = "http://localhost/helperland/index.php?function=forgotPassword&parameter=$userid";

//   sendMail($fp_email, $subject, $body);
// }
