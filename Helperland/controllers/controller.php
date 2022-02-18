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

         //  Send Email  
         include "view/include/sendemail.php";

         $this->model->contact_insert($contact);

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

   function bookService()
   {
      include "view/Book_service.php";
   }

   function servicehistory()
   {
      include "view/Customer_ServiceHistory.php";
   }

   function upcomingservice()
   {
      include "view/ServiceProvider_UpcomingService.php";
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
            $row = $this->model->loginuser($user);

            if (isset($row)) {
               $fname = $row["FirstName"];
               $lname = $row["LastName"];
               $name = "$fname " . "$lname";
               $userid = $row["UserId"];
               $usertype = $row["IsRegisteredUser"];
               $_SESSION["userid"] = $userid;
               $_SESSION["name"] = $name;
               $_SESSION["usertype"] = $usertype;

               if (isset($_POST["remember"])) {
                  setcookie("userid", "$userid", time() + (8600 * 30), "/");
                  setcookie("name", "$name", time() + (8600 * 30), "/");
               }
            } else {
               $_SESSION["login_error"] = "Some values are improper";
            }
         }


         header("Location: http://localhost/helperland/");
      }
   }

   //Logout
   function logout()
   {
      unset($_SESSION["userid"]);
      unset($_SESSION["name"]);
      unset($_SESSION["usertype"]);
      // session_destroy();

      if (isset($_COOKIE['userid'])) {
         unset($_COOKIE['userid']);
         setcookie('userid', null, -1, '/');
      }
      if (isset($_COOKIE['name'])) {
         unset($_COOKIE['name']);
         setcookie('name', null, -1, '/');
      }
      $_SESSION["Logout"] = "Logout Successfully";
      header("Location: http://localhost/helperland/");
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

   // Postal Code Validation without ajax 

   // function postalcodevalidation()
   // {
   //    if (isset($_POST["checkAvailability"])) {
   //       $postalcode = $_POST["postalcode"];
   //       $iscorrect = $this->model->ispostalcode($postalcode);
   //       if ($iscorrect) {
   //          $_SESSION["postalcode"] = $postalcode;
   //       } else {
   //          $_SESSION["postalcodeerror"] = "We are not providing service in this area. 
   //          We’ll notify you if any helper would start working near your area.";
   //       }
   //    }

   //    header("Location: http://localhost/helperland/index.php?function=bookService");
   // }


   //POstal Code Validation with ajax

   function postalcodevalidation()
   {
      $postalcode = $_POST["code"];
      $city = $this->model->ispostalcode($postalcode);
      if ($city == false) {
         echo 1;
      } else {
         $_SESSION["postalcode"] = $postalcode;
         // $_SESSION["ServiceProviderCity"] = $city;
         echo $postalcode . "|";
         echo $city;
      }
   }

   // Function Schedule Plan without ajax 

   // function schedule_plan()
   // {
   //    $servicerequest["date"] = date("Y/m/d", strtotime($_POST["date_sr"]));
   //    $servicerequest["time"] = $_POST["time_sr"];
   //    $servicerequest["zipcode"] = $_SESSION["postalcode"];
   //    $servicerequest["userid"] = $_SESSION["userid"];
   //    $duration_sr = $_POST["duration_sr"];
   //    $duration_arr = explode(" ", $duration_sr);
   //    $servicerequest["duration"] = (int)$duration_arr[0];
   //    $servicerequest["charge_per_hr"] = 100;
   //    $extra_service_hr = 0.5;
   //    $extra_service_cost = 50;
   //    $servicerequest["serviceid"] = rand(0, 10000);

   //    if (isset($_POST["pets"])) {
   //       $servicerequest["pets"] = 1;
   //    } else {
   //       $servicerequest["pets"] = 0;
   //    }

   //    if (isset($_POST["comments"])) {
   //       $servicerequest["comments"] = $_POST["comments"];
   //    } else {
   //       $servicerequest["comments"] = null;
   //    }


   //    if (isset($_POST["extraservice"])) {
   //       $servicerequest["extraservice"] = $_POST["extraservice"];
   //       $servicerequest["totalpayment"] = $servicerequest["charge_per_hr"] * $servicerequest["duration"] + count($servicerequest["extraservice"]) * $extra_service_cost;
   //       $servicerequest["totaltime"] = $servicerequest["duration"] + count($servicerequest["extraservice"]) * $extra_service_hr;
   //       $servicerequest["totalextrahr"] = count($servicerequest["extraservice"]) * $extra_service_hr;

   //       $this->model->insertservicerequest($servicerequest);
   //       $servicerequest["servicerequestid"] = $this->model->fetchservicerequestid($servicerequest["serviceid"]);
   //       $this->model->insertextraservice($servicerequest);
   //    } else {
   //       $servicerequest["totalpayment"] = $servicerequest["charge_per_hr"] * $servicerequest["duration"];
   //       $servicerequest["totaltime"] = $servicerequest["duration"];
   //       $servicerequest["extraservice"] = null;
   //       $this->model->insertservicerequest($servicerequest);
   //    }

   //    unset($_SESSION["postalcode"]);
   //    $_SESSION["schedulePlan"] = "Set";



   //    header("Location: http://localhost/helperland/index.php?function=bookService");
   // }


   function loadaddress()
   {
      $row = $this->model->fetchuseraddress();
      $useraddress = "";
      while ($address = mysqli_fetch_assoc($row)) {

         $addressid = $address["AddressId"];
         $houseno = $address["AddressLine1"];
         $addressline = $address["AddressLine2"];
         $city = $address["City"];
         $state = $address["State"];
         $postalcode = $address["PostalCode"];
         $mobile = $address["Mobile"];
         $useraddress .= "<div class='radio_address mb-2'>
                           <div class='row'>
                           <div class='col-1' style='margin: auto;width: 100%;'>
                              <input type='radio' id='$addressid-addressid' name='address' value='address1' style='margin: 0 auto;'>
                           </div>
                           <div class='col-11'>
                              <label for='address1'>
                                 <p style='margin-bottom: 0px;'><b>Address:</b> $houseno $addressline,
                                       $city $state $postalcode 
                                 </p>
                                 <p style='margin-bottom: 0px;'><b>Phone number:</b> $mobile</p>
                              </label>
                                 </div>
                           </div>
                        </div>";
      }
      echo $useraddress;
   }

   // Function Schedule Plan with ajax 

   function schedule_plan()
   {
      $servicerequest["date"] = date("Y/m/d", strtotime($_POST["date_sr"]));
      $servicerequest["time"] = $_POST["time_sr"];
      $servicerequest["zipcode"] = $_SESSION["postalcode"];
      $servicerequest["userid"] = $_SESSION["userid"];
      $duration_sr = $_POST["duration_sr"];
      $duration_arr = explode(" ", $duration_sr);
      $servicerequest["duration"] = (int)$duration_arr[0];
      $servicerequest["charge_per_hr"] = 100;
      $extra_service_hr = 0.5;
      $extra_service_cost = 50;
      $servicerequest["serviceid"] = rand(0, 10000);
      $servicerequest["pets"] = $_POST["pets"];
      $servicerequest["comments"] = $_POST["comments"];
      $servicerequest["extraservice"] = $_POST["extraservice"];

      if ($servicerequest["extraservice"][0]  != 0) {
         $servicerequest["extraservice"] = $_POST["extraservice"];
         $servicerequest["totalpayment"] = $servicerequest["charge_per_hr"] * $servicerequest["duration"] + count($servicerequest["extraservice"]) * $extra_service_cost;
         $servicerequest["totaltime"] = $servicerequest["duration"] + count($servicerequest["extraservice"]) * $extra_service_hr;
         $servicerequest["totalextrahr"] = count($servicerequest["extraservice"]) * $extra_service_hr;

         $this->model->insertservicerequest($servicerequest);
         $servicerequest["servicerequestid"] = $this->model->fetchservicerequestid($servicerequest["serviceid"]);
         $_SESSION["servicerequestid"] = $servicerequest["servicerequestid"];
         $this->model->insertextraservice($servicerequest);
      } else {
         $servicerequest["totalpayment"] = $servicerequest["charge_per_hr"] * $servicerequest["duration"];
         $servicerequest["totaltime"] = $servicerequest["duration"];
         $servicerequest["totalextrahr"] = 0.0;
         $servicerequest["extraservice"] = null;

         $this->model->insertservicerequest($servicerequest);

         $servicerequest["servicerequestid"] = $this->model->fetchservicerequestid($servicerequest["serviceid"]);
         $_SESSION["servicerequestid"] = $servicerequest["servicerequestid"];
      }

      // $_SESSION["schedulePlan"] = "Set";

      $this->loadaddress();


      // header("Location: http://localhost/helperland/index.php?function=bookService");
   }

   // Yours Details Function 

   function yoursdetails()
   {
      $row = $this->model->fetchuseraddress();
      print_r($row);
   }

   function insertaddress()
   {
      $useraddress["streetname"] = trim($_POST["street_name_yd"]);
      $useraddress["houseno"] = trim($_POST["house_no_yd"]);
      $useraddress["postalcode"] = trim($_POST["postalcode_yd"]);
      $useraddress["city"] = trim($_POST["city_yd"]);
      $useraddress["phoneno"] = trim($_POST["phoneno_yd"]);

      if (
         empty($useraddress["streetname"]) || empty($useraddress["houseno"]) || empty($useraddress["postalcode"]) ||
         empty($useraddress["city"]) || empty($useraddress["phoneno"])
      ) {
      } else if (strlen((string)$useraddress["postalcode"]) != 6) {
         echo "Postal is incorrect";
      } else if (strlen((string)$useraddress["phoneno"]) != 10) {
         echo "Phone no is incorrect";
      } else {
         echo "Upto now correct";
         $this->model->insertuseraddress($useraddress);
         $this->loadaddress();
      }
   }

   function insertServiceRequestAddress()
   {
      $addressid = $_POST["addressid"];
      $this->model->addServiceRequestAddress($addressid);
      echo $_SESSION["servicerequestid"];
   }

   function favourite_service_provider()
   {
      $output = "";
      $userid = $_SESSION["userid"];
      $targetServiceProviderarr = $this->model->fetchtargetServiceProvider($userid);
      foreach ($targetServiceProviderarr as $value) {
         $name = $this->model->fetchServiceProviderName($value);
         $output .= "<div class='block_box m-2' style='width: 200px; border:none'>
                     <div class='block_logo'>
                        <img src='assets/images/cap.png'>
                     </div>
                     <p class='block_name'>$name</p>
                     <button class='select_btn' id='$value-favserviceprovider'>Select</button>
                  </div>";
      }
      echo $output;
   }

   function sendEmailtoProvider()
   {
      // Email Service Pool 
      $serviceprovideremail =  $this->model->fetchserviceprovideremail($_SESSION["postalcode"]);
      print_r($serviceprovideremail);

      //  Send Email  
      include "view/include/sendemail.php";
      foreach ($serviceprovideremail as $emailtext) {
         $email = $emailtext;
         $subject = 'One Service Request Arrived in your area';
         $body = 'Please login in helperland and check the service request';
         sendMail($email, $subject, $body);
      }

      unset($_SESSION["postalcode"]);
   }
}
