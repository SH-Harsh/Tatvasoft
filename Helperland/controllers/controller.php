<?php
session_start();

class EventController
{

   function __construct()
   {
      include('models/model.php');
      $this->model = new EventModal();
   }

   function contactus()
   {
      global $base_url;
      if (isset($_POST['contact_submit'])) {


         $contact['first_name'] = $_POST['first_name'];
         $contact['last_name'] = $_POST['last_name'];
         $contact['phone_no'] = $_POST['phone_no'];
         $contact['email'] = $_POST['email'];
         $contact['subject'] = $_POST['subject'];
         $contact['message'] = $_POST['message'];
         $contact['file_name'] = $_FILES['attachment']['name'];
         $contact['file_name_temp'] = $_FILES['attachment']['tmp_name'];

         $this->model->contact_insert($contact);

         //  Send Email  
         include "view/include/sendemail.php";

         header("Location: $base_url?function=contactus_page");
      }
   }

   function home_page()
   {
      include "view/home.php";
   }

   function contactus_page()
   {
      include "view/Contact.php";
   }

   function about_page()
   {
      include "view/About.php";
   }

   function faq_page()
   {
      include "view/Faq.php";
   }

   function prices_page()
   {
      include "view/Prices.php";
   }

   function becomeHelper_page()
   {
      include "view/Become_a_helper.php";
   }

   function forgotPassword()
   {
      include "view/include/fpassword.php";
   }

   function insertaccountdetails()
   {
      if (isset($_POST["register"]) || isset($_POST["provider_register"])) {
         $user["fname"] = trim($_POST["fname"]);
         $user["lname"] = trim($_POST["lname"]);
         $user["email"] = trim(strtolower($_POST["email"]));
         $user["phone_no"] = trim($_POST["phone_no"]);
         $user["password1"] = trim($_POST["password1"]);

         if (isset($_POST["register"])) {
            $user["isUser"] = 1;
         } else {
            $user["isUser"] = 0;
         }


         if ($user["fname"] == "" || $user["lname"] == "" || $user["email"] == "" || $user["phone_no"] == "" || $user["password1"] == "") {
            $_SESSION["error_message"] = "Some values are empty please register with proper details";
         } else {
            $this->model->insertuserdetails($user);
         }
         header("Location: http://localhost/helperland/");
      }
   }

   // Login
   function login()
   {
      if (isset($_POST["login"])) {
         $user['email'] = trim(strtolower($_POST["login_email"]));
         $user['password'] = trim($_POST["login_password"]);

         if (isset($_POST["remember"])) {
            echo $_POST["remember"];
         } else {
            echo "Remember not checked";
         }

         if ($user["email"] == "" ||  $user["password"] == "") {
            $_SESSION["login_error"] = "Some values are improper";
         } else {
            $this->model->loginuser($user);
         }


         header("Location: http://localhost/helperland/");
      }
   }

   // Forgot Passowrd 
   function forgotPasswordMail()
   {

      global $base_url;
      if (isset($_POST["fp_send"])) {

         $email = trim(strtolower($_POST["fp_email"]));

         if ($email == "") {
            $_SESSION["fp_error"] = "Please Enter email";
         } else {
            $userid = $this->model->forgotpasswordfetch($email);
            if (!isset($_SESSION["fp_error"])) {
               //  Send Email  
               include "view/include/sendemail.php";
            }
         }

         header("Location: $base_url");
      }
   }

   // Change Password 
   function changepassword()
   {
      $user["userid"] = $_GET["parameter"];
      $user["password"] = trim($_POST["password"]);

      $this->model->changepassword($user);

      header("Location: http://localhost/helperland/");
   }
}
