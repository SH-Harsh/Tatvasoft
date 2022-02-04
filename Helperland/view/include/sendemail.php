<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'view/phpmailer/Exception.php';
require_once 'view/phpmailer/PHPMailer.php';
require_once 'view/phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['contact_submit'])){

  $first_name = $_POST['first_name']; 
  $last_name = $_POST['last_name']; 
  $email = $_POST['email'];
  $phone_no = $_POST['phone_no'];
  $subject = $_POST['subject']; 
  $message = $_POST['message'];
  $file_name = $_FILES['attachment']['name'];

  $name = "$first_name " . "$last_name";

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '181200107053@asoit.edu.in'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'SHarsh@4421'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('181200107053@asoit.edu.in'); // Gmail address which you used as SMTP server
    $mail->addAddress('181200107053@asoit.edu.in'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Helperland  Contact Us Details';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Phone No : $phone_no<br> Subject : $subject<br> Message : $message <br>
                        FIle Name : $file_name</h3>";

    $mail->send();
  } catch (Exception $e){
    echo "$e";
  }
}

// Forgot Password Mail 
if(isset($_POST["fp_send"])){
  $fp_email = $_POST["fp_email"];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '181200107053@asoit.edu.in'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'SHarsh@4421'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('181200107053@asoit.edu.in'); // Gmail address which you used as SMTP server
    $mail->addAddress($fp_email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Change Password for Helperland';
    $mail->Body = "http://localhost/helperland/index.php?function=forgotPassword&parameter=$userid";

    $mail->send();
  } catch (Exception $e){
    echo "$e";
  }

}

?>
