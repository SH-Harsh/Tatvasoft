<?php
session_start();

class EventController
{

   function __construct()
   {
      include('models/model.php');
      $this->model = new EventModal();
      include "view/include/sendemail.php";
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
         // include "view/include/sendemail.php";

         $first_name = $_POST['first_name'];
         $last_name = $_POST['last_name'];
         $useremail = $_POST['email'];
         $phone_no = $_POST['phone_no'];
         $subject = $_POST['subject'];
         $message = $_POST['message'];
         $file_name = $_FILES['attachment']['name'];

         $name = "$first_name " . "$last_name";

         $email = 'whitedevil18120@gmail.com';
         $subject = 'Helperland  Contact Us Details';
         $body = "<h3>Name : $name <br>Email: $useremail <br>Phone No : $phone_no<br> Subject : $subject<br> Message : $message <br>
         FIle Name : $file_name</h3>";

         if (!empty($file_name)) {
            sendMailwithAttachment($email, $subject, $body);
         } else {
            sendMail($email, $subject, $body);
         }

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

   function adminServiceRequest()
   {
      include "view/AdminServiceRequest.php";
   }

   function adminUserManagement()
   {
      include "view/AdminUserManagement.php";
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
            $user["isActive"] = 1;
         } else {
            $user["isUser"] = 0;
            $user["isActive"] = 0;
         }

         $emailAlreadyExists = $this->model->checkEmailAlreadyExists($user["email"]);


         if ($user["fname"] == "" || $user["lname"] == "" || $user["email"] == "" || $user["phone_no"] == "" || $user["password1"] == "") {
            $_SESSION["error_message"] = "Some values are empty please register with proper details";
         } else if ($emailAlreadyExists > 0) {
            $_SESSION["error_message"] = "Email Already Exists";
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

               if ($row["IsActive"] == 1) {
                  $fname = $row["FirstName"];
                  $lname = $row["LastName"];
                  $name = "$fname " . "$lname";
                  $userid = $row["UserId"];
                  $usertype = $row["UserTypeId"];
                  $email = $user['email'];
                  $password = $user['password'];
                  $_SESSION["userid"] = $userid;
                  $_SESSION["name"] = $name;
                  $_SESSION["usertype"] = $usertype;

                  if (isset($_POST["remember"])) {
                     // setcookie("userid", "$userid", time() + (8600 * 30), "/");
                     // setcookie("name", "$name", time() + (8600 * 30), "/");
                     setcookie("email", "$email", time() + (8600 * 30), "/");
                     setcookie("password", "$password", time() + (8600 * 30), "/");
                  }

                  // echo "Login Successfull";
               } else {
                  $_SESSION["login_error"] = "Account is not activeted";
               }
            } else {
               $_SESSION["login_error"] = "Username or password is Invalid";
            }
         }

         if ($usertype == 2) {
            header("Location: http://localhost/helperland/?function=adminServiceRequest");
         } else {
            header("Location: http://localhost/helperland/");
         }
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
               // include "view/include/sendemail.php";
               $fp_email = $_POST["fp_email"];

               $subject = 'Change Password for Helperland';
               $body = "http://localhost/helperland/index.php?function=forgotPassword&parameter=$userid";
               sendMail($fp_email, $subject, $body);
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
   //          We???ll notify you if any helper would start working near your area.";
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
      $zipcode = $_POST["zipcode"];
      $row = $this->model->fetchuseraddress_booknow($zipcode);
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
      $servicerequest["duration"] = (float)$duration_arr[0];
      $servicerequest["charge_per_hr"] = 100;
      $extra_service_hr = 0.5;
      $extra_service_cost = 50;
      $servicerequest["serviceid"] = rand(0, 10000);
      $servicerequest["pets"] = $_POST["pets"];
      $servicerequest["comments"] = $_POST["comments"];
      $servicerequest["extraservice"] = $_POST["extraservice"];

      if ($_POST["providerid"] != 0) {
         $servicerequest["ServiceProviderId"] = $_POST["providerid"];
      } else {
         $servicerequest["ServiceProviderId"] = 0;
      }

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

      // echo $_SESSION["servicerequestid"];

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
      // print_r($targetServiceProviderarr);
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
      $userid = $_SESSION["userid"];

      // Email Service Pool 
      $serviceprovideremail =  $this->model->fetchserviceprovideremail($_SESSION["postalcode"]);

      $blockedemail = $this->model->fetchblockedEmail($_SESSION["postalcode"], $userid);
      // print_r($blockedemail);
      // print_r($serviceprovideremail);

      $finalemailarr = array_diff($serviceprovideremail, $blockedemail);

      // print_r($finalemailarr);

      //  Send Email  
      // include "view/include/sendemail.php";
      foreach ($finalemailarr as $emailtext) {
         $email = $emailtext;
         $subject = 'One Service Request Arrived in your area';
         $body = 'Please login in helperland and check the service request';
         sendMail($email, $subject, $body);
      }

      unset($_SESSION["postalcode"]);
   }

   function fetchcurrentservicerequest()
   {
      $output = "";
      $userid = $_SESSION["userid"];

      $parameterarr = explode("-", $_GET["parameter"]);
      $offset = $parameterarr[0];
      $limit = $parameterarr[1];

      $output .= "<tr>
                     <th style='width: 10%;'>
                        <p>Service Id</p>
                     </th>
                     <th style='width: 15%;'>
                        <p>Service Date</p>
                     </th>
                     <th style='width: 40%;'>
                        <p>Service Provider</p>
                     </th>
                     <th>
                        <p>Payment</p>
                     </th>
                     <th style='width: 20%;'>
                        <p style='margin: 0px 10px;'>Action</p>
                     </th>
                  </tr>";

      $result = $this->model->getcurrentservicerequest($userid, $offset, $limit);
      while ($row = mysqli_fetch_assoc($result)) {

         $servicerequestid = $row["ServiceRequestId"];
         $serviceid = $row["ServiceId"];
         $datetime = $row["ServiceStartDate"];
         $payment = $row["TotalCost"];
         $totalhr = $row["ServiceHours"] + $row["ExtraHours"];
         // echo $totalhr;
         $serviceproviderid = $row["ServiceProviderId"];
         // echo $serviceproviderid;

         //Hours and minutes
         $hour = (int)$totalhr;
         $isminutes = ($totalhr - $hour);
         if ($isminutes > 0) {
            $minutes = 30;
         } else {
            $minutes = 0;
         }

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("G:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));





         $output .= "<tr>
                        <td onclick='dashboardmodal($servicerequestid)'>
                           <p>$serviceid</p>
                        </td>
                        <td data-toggle='modal' data-target='#dashboard_modal' onclick='dashboardmodal($servicerequestid)'>
                           <p style='font-weight: 500'><img src='assets/images/calendar2.png'> $date</p>
                           <p><img src='assets/images/clock.png'> $starttime - $endtime</p>
                        </td>";

         if (isset($serviceproviderid)) {

            $row1 = $this->model->getuserdetails($serviceproviderid);

            $fname = $row1["FirstName"];
            $lname = $row1["LastName"];
            $avatar = $row1["UserProfilePicture"];

            $output .=  "<td data-toggle='modal' data-target='#dashboard_modal' onclick='dashboardmodal($servicerequestid)'>
                           <div style='position: relative;height: auto'>
                              <img src='assets/images/$avatar' class='cap_border'>

                              <p>$fname $lname</p>
                              <div>
                                 <div class='avg_rating_serprovider $serviceproviderid-avgRating'>Hello</div>
                              </div>
                           </div>
                           
                        </td>";
         } else {
            $output .= "<td></td>";
         }



         $output .=  "<td data-toggle='modal' data-target='#dashboard_modal' onclick='dashboardmodal($servicerequestid)'>
                           <p class='euro_price text-left'>$payment ???
                           </p>
                        </td>
                        <td>
                           <div class='flex-container mt-3'>
                              <button type='button' class='accept_btn mt-2 ' onclick='rescheduleclick($servicerequestid)' data-toggle='modal' data-target='#Reschudule'>Reschedule</button>
                              <button type='button' class='accept_btn mx-2 mt-2' style='background-color: #ff6b6b;' onclick='cancelservice($servicerequestid)' data-toggle='modal' data-target='#cancel_service'>Cancel</button>
                           </div>
                        </td>
                     </tr>";
      }

      echo $output;
   }

   function setdatetimeservice()
   {
      $date = date("Y/m/d", strtotime($_POST["date"]));;
      $time = $_POST["time"];
      $id = $_POST["serviceid"];

      $datetime =  date("Y/m/d G:i:s", strtotime($date . " " . $time . ":00"));

      echo $datetime;
      $this->model->updatedatetimeservice($id, $datetime);

      $result = $this->model->getEmailOfServiceProvider($id);
      $row = mysqli_fetch_assoc($result);
      $userid = $row["ServiceProviderId"];
      if ($userid != NULL) {
         $row = $this->model->getuserdetails($userid);
         $email = $row["Email"];
         $subject = 'Service Date Change';
         $body = "Service Request " . $id . " has been rescheduled by customer. New date and time are {" . $date . "," . $time . "}";
         sendMail($email, $subject, $body);
      }
   }

   function fetchdatetimeservice()
   {
      $id = $_POST["serviceid"];

      $datetime = $this->model->getdatetimeservice($id);
      $datetimearr = explode(" ", $datetime);
      echo $datetimearr[0] . "|";

      $timearr = explode(":", $datetimearr[1]);
      $time = $timearr[0] . ":" . $timearr[1];
      echo $time;
   }

   function isserviceavailable()
   {
      $date = date("Y/m/d", strtotime($_POST["date"]));;
      $time = $_POST["time"];
      $id = $_POST["serviceid"];

      $datetime = $date . " " . $time . ":00";


      $row = $this->model->getUpcomingServiceDetails($id);
      $new_totalhr = $row["ServiceHours"] + $row["ExtraHours"];
      $userid = $row["UserId"];

      //New time

      $new_starttime = $date . " " . date("G:i:s", strtotime($time));
      $new_endtime = $date . " " . date("H:i:s", strtotime("+$new_totalhr hour", strtotime($time)));

      $d1_newstartdate = new DateTime($new_starttime);
      $d2_newenddate = new DateTime($new_endtime);

      $result = $this->model->checkserviceavailable_admin($datetime, $userid);

      $invalid = 0;
      $valid = 0;

      while ($row2 = mysqli_fetch_assoc($result)) {
         $id2 = $row2["ServiceRequestId"];
         $initial_datetime = $row2["ServiceStartDate"];
         $totalhr = $row2["ServiceHours"] + $row2["ExtraHours"];

         //Hour and minutes
         $hour = (int) $totalhr;
         $isminutes = $totalhr - $hour;
         $minutes = ($isminutes > 0) ? 30 : 0;

         $datetime_arr = explode(" ", $initial_datetime);
         $initial_date = $datetime_arr[0];
         $initial_time = $datetime_arr[1];
         $starttime = date("G:i:s", strtotime($initial_time));
         $endtime = date("H:i:s", strtotime("+$hour hour +$minutes minutes", strtotime($initial_time)));

         $initial_start_date = $initial_date . " " . date("H:i:s", strtotime($starttime));
         $initial_end_date = $initial_date . " " . date("H:i:s", strtotime($endtime));

         $d3_initialstartdate = new DateTime($initial_start_date);
         $d4_initialenddate = new DateTime($initial_end_date);

         if (($d3_initialstartdate > $d2_newenddate) || ($d4_initialenddate < $d1_newstartdate)) {
            $valid++;
         } else if ($id == $id2) {
            $valid++;
         } else {
            $invalid++;
         }
      }

      if ($invalid == 0) {
         echo 0;
      } else {
         echo 1;
      }
   }

   function deleteservicerequest()
   {
      $serviceid = $_POST["serviceid"];
      $comment = $_POST["comment"];

      $this->model->deleteservice($serviceid, $comment);
   }

   function servicerequestdetails()
   {
      $servicerequestid = $_POST["id"];


      $result = $this->model->fullservicerequestdetails($servicerequestid);

      $row = mysqli_fetch_assoc($result);
      $servicedetails = [];

      $servicedetails["ServiceId"] = $row["ServiceId"];
      $datetime = $row["ServiceStartDate"];
      $servicedetails["servicerequestid"] = $servicerequestid;
      $servicedetails["ServiceHours"] = $row["ServiceHours"];
      $servicedetails["ExtraHours"] = $row["ExtraHours"];
      $servicedetails["TotalCost"] = $row["TotalCost"];
      $servicedetails["UserId"] = $row["UserId"];
      $servicedetails["Comments"] = $row["Comments"];
      $servicedetails["HasPets"] = $row["HasPets"];
      $servicedetails["AddressLine1"] = $row["AddressLine1"];
      $servicedetails["AddressLine2"] = $row["AddressLine2"];
      $servicedetails["City"] = $row["City"];
      $servicedetails["State"] = $row["State"];
      $servicedetails["PostalCode"] = $row["PostalCode"];



      // Date and Time 
      $totalhr = $servicedetails["ServiceHours"] + $servicedetails["ExtraHours"];

      //Hour and time
      $hour = (int) $totalhr;
      $isminutes = $totalhr - $hour;
      $minutes = ($isminutes > 0) ? 30 : 0;

      $servicedetails["duration"] = $totalhr;
      $datetime_arr = explode(" ", $datetime);
      $servicedetails["date"] = $datetime_arr[0];
      $time = $datetime_arr[1];
      $servicedetails["starttime"] = date("G:i", strtotime($time));
      $servicedetails["endtime"] = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));

      // Extra Service 
      $servicedetails["ServiceExtraId"] = [];

      $result1 = $this->model->getextraservicedeatils($servicerequestid);

      if (mysqli_num_rows($result1) == 0) {
         array_push($servicedetails["ServiceExtraId"], 0);
      } else {
         while ($row1 = mysqli_fetch_assoc($result1)) {
            array_push($servicedetails["ServiceExtraId"], $row1["ServiceExtraId"]);
         }
      }


      // Extra Service Name 
      $servicedetails["ExtraService"] = [];
      foreach ($servicedetails["ServiceExtraId"] as $value) {

         if ($value == 1) {
            array_push($servicedetails["ExtraService"], "Inside Cabinet");
         } else if ($value == 2) {
            array_push($servicedetails["ExtraService"], "Inside fridge");
         } else if ($value == 3) {
            array_push($servicedetails["ExtraService"], "Inside oven");
         } else if ($value == 4) {
            array_push($servicedetails["ExtraService"], "Inside fridge");
         } else if ($value == 5) {
            array_push($servicedetails["ExtraService"], "Laundry wash & dry");
         } else {
            array_push($servicedetails["ExtraService"], 0);
         }
      }

      $servicedetails["customername"] = $this->model->getservicerequestCustomerName($servicedetails["UserId"]);

      echo json_encode($servicedetails);
   }


   function fetchServiceHistory()
   {
      $output = "";
      $userid = $_SESSION["userid"];

      $parameterarr = explode("-", $_GET["parameter"]);
      $offset = $parameterarr[0];
      $limit = $parameterarr[1];

      $output .= "<tr>
                     <th>
                        <p>Service Id</p>
                     </th>
                     <th>
                        <p>Service Date</p>
                     </th>
                     <th>
                        <p>Service Provider &nbsp; <img src='assets/images/double_arrow.png'></p>
                     </th>
                     <th>
                        <p class='text-center'>Payment &nbsp; <img src='assets/images/double_arrow.png'>
                        </p>
                     </th>
                     <th>
                        <p>Status &nbsp; <img src='assets/images/double_arrow.png'></p>
                     </th>
                     <th>
                        <p class='text-center'>Rate SP</p>
                     </th>
                  </tr>";

      $servicehistorydetails = $this->model->servicehistorydetails($userid, $offset, $limit);

      while ($row = mysqli_fetch_assoc($servicehistorydetails)) {

         $servicerequestid = $row["ServiceRequestId"];
         $serviceid = $row["ServiceId"];
         $datetime = $row["ServiceStartDate"];
         $payment = $row["TotalCost"];
         $totalhr = $row["ServiceHours"] + $row["ExtraHours"];
         $serviceproviderid = $row["ServiceProviderId"];
         $status = $row["Status"];
         // echo $serviceproviderid;

         //Hour and Time
         $hour = (int)$totalhr;
         $isminutes = $totalhr - $hour;
         $minutes = ($isminutes > 0) ? 30 : 0;


         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("G:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));

         $output .= "<tr>
                        <td>
                           <p>$serviceid</p>
                        </td>
                        <td>
                           <p style='font-weight: 500;'><img src='assets/images/calendar.png'> $date</p>
                           <p class='time'>$starttime - $endtime</p>
                        </td>";

         if (isset($serviceproviderid)) {

            $row1 = $this->model->getuserdetails($serviceproviderid);

            $fname = $row1["FirstName"];
            $lname = $row1["LastName"];
            $avatar = $row1["UserProfilePicture"];

            $output .= "<td>
                           <div style='position: relative;height: auto'>
                              <img src='assets/images/$avatar' class='cap_border'>
                              <p style='margin:0px'>$fname $lname<br></p>

                              <div>
                                 <div class='servicehistory_rating mt-4 ml-5' id='$servicerequestid-ratings'>
                                 </div>
                              </div>
                              
                              
                           </div>
                        </td>";
         } else {
            $output .= "<td> </td>";
         }

         $output .= "<td>
                        <p class='euro_price'><img src='assets/images/euro-currency-symbol.png' class='euro_img'>$payment
                        </p>
                     </td>";



         if ($status == 1) {

            $output .= "<td>
                           <div class='status'>
                              <p class='Completed'>Completed</p>
                           </div>
                        </td>";
         } else {
            $output .= "<td>
                              <div class='status' style='background-color:#ff6b6b;'>
                                 <p class='Completed'>Cancelled</p>
                              </div>
                        </td>";
         }


         if (isset($serviceproviderid) && $status == 1) {


            $output .= "<td>
                           <button type='button' class='RateSp' data-toggle='modal' data-target='#rating_modal' 
                            onclick='ratingclick($servicerequestid,$serviceproviderid)'>Rate SP</button>
                        </td>
                  </tr>";
         } else {
            $output .= "<td>
                           <button type='button' class='RateSp' style='background-color: #e63946;'>Rate SP</button>
                        </td>
                  </tr>";
         }
      }

      echo $output;
   }

   function fetchtotalentriesdashboard()
   {

      $userid = $_SESSION["userid"];

      $totalentries = $this->model->gettotalentriesdashboard($userid);
      echo $totalentries;
   }

   function fetchtotalentriesservicehistory()
   {
      $userid = $_SESSION["userid"];

      $totalentries = $this->model->gettotalentriesservicehistory($userid);
      echo $totalentries;
   }

   // Export to Sheet 
   function fetchfullservicehistory()
   {
      $userid = $_SESSION["userid"];

      $this->model->getallservicehistory($userid);

      $output = "";

      $output .= "<tr>
                     <th>Service Id</th>
                     <th>Service Date</th>
                     <th>Service Provider</th>
                     <th>Payment</th>
                     <th>Status</th>
                  </tr>";

      $servicehistorydetails = $this->model->getallservicehistory($userid);

      while ($row = mysqli_fetch_assoc($servicehistorydetails)) {

         $servicerequestid = $row["ServiceRequestId"];
         $serviceid = $row["ServiceId"];
         $datetime = $row["ServiceStartDate"];
         $payment = $row["TotalCost"];
         $totalhr = $row["ServiceHours"] + $row["ExtraHours"];
         $serviceproviderid = $row["ServiceProviderId"];
         $status = $row["Status"];
         // echo $serviceproviderid;


         //Hour and Time
         $hour = (int)$totalhr;
         $isminutes = $totalhr - $hour;
         $minutes = ($isminutes > 0) ? 30 : 0;

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("G:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));

         $output .= "<tr>
                                    <td>
                                       <p>$serviceid</p>
                                    </td>
                                    <td>$date $starttime - $endtime</td>";

         if (isset($serviceproviderid)) {

            $row1 = $this->model->getuserdetails($serviceproviderid);

            $fname = $row1["FirstName"];
            $lname = $row1["LastName"];
            $avatar = $row1["UserProfilePicture"];

            $output .= "<td>$fname $lname</td>";
         } else {
            $output .= "<td> </td>";
         }

         $output .= "<td>$payment</td>";



         if ($status == 1) {

            $output .= "<td>Completed</td>";
         } else {
            $output .= "<td>Cancelled</td>";
         }
      }

      echo $output;
   }

   function setrating()
   {
      $rating["userid"] = $_SESSION["userid"];
      $rating["serviceid"]  = $_POST["id"];
      $rating["serviceproviderid"]  = $_POST["serviceprovider_id"];
      $rating["feedback"]  = $_POST["service_feedback"];
      $rating["timeArrivalRating"]  = $_POST["timeArrival"];
      $rating["frindlyRating"]  = $_POST["friendly"];
      $rating["qualityRating"]  = $_POST["quality"];
      $rating["rating"] =  $_POST["rating_service"];

      $ratingdone = $this->model->checkratingalreadydone($rating["serviceid"]);

      if ($ratingdone == true) {
         $this->model->updaterating($rating);
      } else {
         $this->model->insertrating($rating);
      }

      echo $rating["serviceid"] . "|";
      echo $rating["rating"];
   }

   function setratingmodal()
   {
      $serviceproviderid = $_POST["serviceProviderId"];

      $row1 = $this->model->getuserdetails($serviceproviderid);

      $fname = $row1["FirstName"];
      $lname = $row1["LastName"];
      $avatar = $row1["UserProfilePicture"];

      $name = $fname . " " . $lname;

      echo $name . "|" . $avatar;
   }

   function getrating()
   {
      $servicerequestId = $_POST["serviceRequestId"];

      $result = $this->model->getAverageRating($servicerequestId);
      while ($row = mysqli_fetch_assoc($result)) {
         echo $row["Ratings"] . "|" . $servicerequestId;
      }
   }

   function getdetails()
   {
      $userid = $_SESSION["userid"];

      $row = $this->model->getuserdetails($userid);

      echo json_encode($row);
   }

   function updateuserdetails()
   {
      $user["userid"] = $_SESSION["userid"];
      $user["fname"] = $_POST["firstname"];
      $user["lname"] = $_POST["lastname"];
      $user["Email"] = $_POST["email"];
      $user["Phoneno"] = $_POST["MobileNo"];
      $user["Birthdate"] = date("Y-m-d", strtotime($_POST["date"]));

      $user["language"] = $_POST["Language"];

      if ($_POST["Language"] == "Enghlish") {
         $user["language"] = 1;
      } else {
         $user["language"] = 0;
      }

      $this->model->updateuserdetails($user);

      // echo $user;
      print_r($user);
   }

   function oldpasswordcheck()
   {
      $old_password = $_POST["oldPassword"];
      $userid = $_SESSION["userid"];

      $row = $this->model->getuserdetails($userid);
      echo $row["Password"];
   }

   function updatePassword()
   {
      $user["userid"] = $_SESSION["userid"];
      $user["password"] = trim($_POST["password"]);

      $this->model->changepassword($user);
   }

   function loadsettingaddress()
   {
      $row = $this->model->fetchuseraddress();
      $useraddress = "<tr class='table_heading'>
                        <th class='address_th py-3 px-4'>Addresses</th>
                        <th>Action</th>
                     </tr>";
      while ($address = mysqli_fetch_assoc($row)) {

         $addressid = $address["AddressId"];
         $houseno = $address["AddressLine1"];
         $addressline = $address["AddressLine2"];
         $city = $address["City"];
         $state = $address["State"];
         $postalcode = $address["PostalCode"];
         $mobile = $address["Mobile"];
         $useraddress .= "<tr>
                           <td class='address_td'>
                        <div>
                                    <p><b>Address:</b> $houseno $addressline, $city, $state, $postalcode</p>
                                    <p><b>Phone Number:</b> $mobile</p>
                                 </div>
                              </td>
                              <td class='action_row'>
                                 <p>
                                    <i class='far fa-edit' data-target='#edit_address' data-toggle='modal' onclick='edit_address($addressid)'></i>
                                    <i class='far fa-trash-alt' onclick='delete_address($addressid)' data-toggle='modal' data-target='#cancel_address_setting'></i>
                                 </p>
                              </td>
                        </tr>";
      }
      echo $useraddress;
   }

   // Fetch Address 
   function setAddressModal()
   {
      $id = $_POST["addressId"];

      $result = $this->model->fetchAddressModal($id);
      $row = mysqli_fetch_assoc($result);

      echo json_encode($row);
   }

   //   Update Address 
   function updateAddress()
   {
      $address["StreetName"] = $_POST["streetName"];
      $address["HouseNo"] = $_POST["houseno"];
      $address["PostalCode"] = $_POST["postalcode"];
      $address["City"] = $_POST["city"];
      $address["Mobile"] = $_POST["Mobile"];
      $address["addressId"] = $_POST["AddressId"];

      $this->model->updateAddress($address);
      print_r($address);
   }

   // Delete Address 
   function deleteaddress_setting()
   {
      $addressid = $_POST["addressId"];

      $this->model->deleteaddress($addressid);
   }

   // Average Rating 

   function averageRating()
   {
      $id = $_POST["serviceProviderId"];

      $result = $this->model->getAllRatingOfProvider($id);
      $count = 0;
      $sum = 0;
      while ($row = mysqli_fetch_assoc($result)) {
         $sum += $row["Ratings"];
         $count++;
      }
      $avg = $sum / $count;
      echo  number_format($avg, 1);
   }

   //Update details of Service Provider
   function updatedetails_sp()
   {
      $provider["fname"] = $_POST["FirstName"];
      $provider["lname"] = $_POST["LastName"];
      $provider["email"] = $_POST["Email"];
      $provider["phoneno"] = $_POST["PhoneNo"];
      $provider["birthdate"] = $_POST["date"];
      $provider["nationality"] = $_POST["Nationality"];
      $provider["gender"] = $_POST["Gender"];
      $provider["avatar_name"] = $_POST["logo_name"];
      $provider["streetname"] = $_POST["streetName"];
      $provider["houseno"] = $_POST["houseNo"];
      $provider["postalcode"] = $_POST["postalcode"];
      $provider["city"] = $_POST["city"];
      $provider["userid"] = $_SESSION["userid"];

      $this->model->updateServiceProviderDetails($provider);

      $result = $this->model->IsInsertedAddress_SP($provider);

      if ($result > 0) {
         //Update Address
         $this->model->updateAddress_sp($provider);
      } else {
         //Insert Address
         $this->model->insertuseraddress($provider);
      }

      print_r($provider);
   }

   function setAdress_sp()
   {
      $provider["userid"] = $_SESSION["userid"];

      $result = $this->model->IsInsertedAddress_SP($provider);

      if ($result > 0) {
         $result1 = $this->model->getAddress_SP($provider["userid"]);
         echo json_encode($result1);
      }
   }

   function loadServiceRequest_SP()
   {
      $output = "";

      $userid = $_SESSION["userid"];
      $result = $this->model->getAddress_SP($userid);
      $pincode = $result["PostalCode"];

      $parameterarr = explode("-", $_GET["parameter"]);
      $offset = $parameterarr[0];
      $limit = $parameterarr[1];
      $pets = $parameterarr[2];

      $output .= "<tr>
                     <th>
                        <p>Service ID <img src='assets/images/double_arrow.png'></p>
                     </th>
                     <th>
                        <p>Service date</p>
                     </th>
                     <th>
                        <p>Customer details </p>
                     </th>
                     <th>
                        <p>Payment</p>
                     </th>
                     <th>
                        <p>Time Conflict</p>
                     </th>
                     <th>
                        <p class='text-center'>Actions</p>
                     </th>
               </tr>";


      //Block User Details
      $allblockuserid = $this->model->fetchallblockuserid($userid);
      // print_r($allblockuserid);

      $inblockcondition = "(";
      $inblockcondition .= implode(",", $allblockuserid);
      $inblockcondition .= ")";
      // echo $inblockcondition;


      $result = $this->model->getnewservicerequest_sp($pincode, $pets, $offset, $limit, $inblockcondition);



      while ($row = mysqli_fetch_assoc($result)) {

         $servicerequestid = $row["ServiceRequestId"];
         $serviceid = $row["ServiceId"];
         $datetime = $row["ServiceStartDate"];
         $payment = $row["TotalCost"];
         $totalhr = $row["ServiceHours"] + $row["ExtraHours"];
         $serviceproviderid = $row["ServiceProviderId"];

         $hour = (int)$totalhr;
         $isminutes = $totalhr - $hour;
         if ($isminutes > 0) {
            $isminutes = 30;
         } else {
            $isminutes = 0;
         }

         //Customer details
         $customerid = $row["UserId"];
         // $row1 = $this->model->getAddress_SP($customerid);
         $row1 = $this->model->getAddress_SD($servicerequestid);
         $customer_address = $row1["AddressLine1"] . ", " . $row1["AddressLine2"] . " " . $row1["City"] . " " . $row1["PostalCode"];

         $row2 = $this->model->getuserdetails($customerid);

         $fname = $row2["FirstName"];
         $lname = $row2["LastName"];
         $name = $fname . " " . $lname;

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("G:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$hour hour +$isminutes minutes", strtotime($time)));

         $output .= "<tr data-toggle='modal' data-target='#new_service_details' onclick='Accept_Service($servicerequestid)'>
                        <td>
                           <p>$serviceid</p>
                        </td>
                        <td>
                           <p style='font-weight: 500;'><img src='assets/images/calendar2.png'>$date</p>
                           <p><img src='assets/images/clock.png'> $starttime - $endtime</p>
                        </td>
                        <td>
                           <p>$name</p>
                           <p><img src='assets/images/home.png'>$customer_address</p>
                        </td>
                        <td>
                           <p>$payment</p>
                        </td>
                        <td></td>
                        <td>
                           <p class='text-center'>
                              <button type='button' class='accept_btn'>Accept</button>
                           </p>
                        </td>
                  </tr>";
      }

      echo $output;
   }

   function setAcceptServiceModal()
   {
      $id = $_POST["id"];

      $row = $this->model->getServiceRequests_SP_details($id);

      $servicerequestid = $row["ServiceRequestId"];
      $details["serviceid"] = $row["ServiceId"];
      $datetime = $row["ServiceStartDate"];
      $details["payment"] = $row["TotalCost"];
      $totalhr = $row["ServiceHours"] + $row["ExtraHours"];
      $details["totalhr"] = $totalhr;
      $details["comment"] = $row["Comments"];
      $details["HasPets"] = $row["HasPets"];

      $serviceproviderid = $row["ServiceProviderId"];

      //Customer details
      $customerid = $row["UserId"];
      // $row1 = $this->model->getAddress_SP($customerid);
      $row1 = $this->model->getAddress_SD($servicerequestid);
      $details["customer_address"] = $row1["AddressLine1"] . ", " . $row1["AddressLine2"] . " " . $row1["City"] . " " . $row1["PostalCode"];

      $row2 = $this->model->getuserdetails($customerid);

      $fname = $row2["FirstName"];
      $lname = $row2["LastName"];
      $details["name"] = $fname . " " . $lname;


      //Hour and time
      $hour = (int)$totalhr;
      $isminutes = $totalhr - $hour;
      $minutes = ($isminutes > 0) ? 30 : 0;

      // Date & Time 
      $datetime_arr = explode(" ", $datetime);
      $details["date"] = $datetime_arr[0];
      $time = $datetime_arr[1];
      $details["starttime"] = date("G:i", strtotime($time));
      $details["endtime"] = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));

      // Extra Service 
      $servicedetails["ServiceExtraId"] = [];

      $result1 = $this->model->getextraservicedeatils($servicerequestid);

      if (mysqli_num_rows($result1) == 0) {
         array_push($servicedetails["ServiceExtraId"], 0);
      } else {
         while ($row1 = mysqli_fetch_assoc($result1)) {
            array_push($servicedetails["ServiceExtraId"], $row1["ServiceExtraId"]);
         }
      }


      // Extra Service Name 
      $details["ExtraService"] = [];
      foreach ($servicedetails["ServiceExtraId"] as $value) {

         if ($value == 1) {
            array_push($details["ExtraService"], "Inside Cabinet");
         } else if ($value == 2) {
            array_push($details["ExtraService"], "Inside fridge");
         } else if ($value == 3) {
            array_push($details["ExtraService"], "Inside oven");
         } else if ($value == 4) {
            array_push($details["ExtraService"], "Inside fridge");
         } else if ($value == 5) {
            array_push($details["ExtraService"], "Laundry wash & dry");
         } else {
            array_push($details["ExtraService"], 0);
         }
      }


      echo json_encode($details);
   }

   // New Service Request total entries for Sp 

   function TotalEntriesNewServiceRequest()
   {

      $userid = $_SESSION["userid"];
      $result = $this->model->getAddress_SP($userid);
      $pincode = $result["PostalCode"];

      $pets = $_GET["parameter"];

      //Block User Details
      $allblockuserid = $this->model->fetchallblockuserid($userid);
      // print_r($allblockuserid);

      $inblockcondition = "(";
      $inblockcondition .= implode(",", $allblockuserid);
      $inblockcondition .= ")";
      // echo $inblockcondition;

      $no = $this->model->getnewservicerequestTotalEntries_sp($pincode, $pets, $inblockcondition);

      echo $no;
   }

   function IsServiceProviderAssigned()
   {
      $serviceid = $_POST["id"];

      $row =  $this->model->getUpcomingServiceDetails($serviceid);
      $ServiceDateStart = $row["ServiceStartDate"];
      $zipcode = $row["ZipCode"];
      $userid = $_SESSION["userid"];

      $currentdatetotalhrs = $row["ServiceHours"] + $row["ExtraHours"];

      $hour = (int) $currentdatetotalhrs;
      $isminutes = $currentdatetotalhrs - $hour;
      $minutes = ($isminutes > 0) ? 30 : 0;

      $ServiceDateEnd = date("Y-m-d H:i:s", strtotime("+$hour hours +$minutes minutes", strtotime($ServiceDateStart)));

      $d3_SDS = new DateTime($ServiceDateStart);
      $d4_SDE = new DateTime($ServiceDateEnd);

      $result = $this->model->AcceptServiceValidation($zipcode, $userid);

      $onecount = 0;
      $zerocount = 0;

      if (mysqli_num_rows($result) > 0) {
         while ($row1 = mysqli_fetch_assoc($result)) {
            // echo $row1["ServiceStartDate"] . "    ";
            $ServiceStartComp2 = $row1["ServiceStartDate"];
            $ServiceStartComp = date("Y-m-d H:i:s", strtotime("-1 hour", strtotime($ServiceStartComp2)));

            $totalhrs = $row1["ServiceHours"] + $row1["ExtraHours"];


            //Hour and time
            $hour = (int)$totalhrs;
            $isminutes = $totalhrs - $hour;
            $minutes = ($isminutes > 0) ? 30 : 0;

            $ServiceEndComp2 = date("Y-m-d H:i:s", strtotime("+$hour hour +$minutes minutes", strtotime($ServiceStartComp)));
            $ServiceEndComp = date("Y-m-d H:i:s", strtotime("+2 hour", strtotime($ServiceEndComp2)));

            $d1_SS = new DateTime($ServiceStartComp);
            $d2_SE = new DateTime($ServiceEndComp);


            // echo $ServiceStartComp . "   ";
            // echo $ServiceEndComp . "   ";

            if (($d3_SDS <= $d1_SS && $d4_SDE <= $d1_SS) || $d3_SDS >= $d2_SE) {
               if (isset($row["ServiceProviderId"])) {
                  $onecount++;
               } else {
                  $zerocount++;
               }
            } else {
               $onecount++;
            }
         }
      } else {
         $zerocount++;
      }


      if ($onecount > 0) {
         echo "1";
      } else {
         echo "0";
      }

      // if (isset($row["ServiceProviderId"])) {
      //    echo "1";
      // } else {
      //    echo "0";
      // }
   }

   function SetServiceProvider()
   {
      $serviceid = $_POST["id"];
      $userid = $_SESSION["userid"];

      $this->model->setServiceProviderId($serviceid, $userid);
   }


   //Upcoming Service
   function loadUpcomingService_SP()
   {

      $userid = $_SESSION["userid"];
      $parameterarr = explode("-", $_GET["parameter"]);
      $offset = $parameterarr[0];
      $limit = $parameterarr[1];

      $output = "<tr>
                     <th>
                        <p>Service ID <img src='assets/images/double_arrow.png'></p>
                     </th>
                     <th>
                        <p>Service date <img src='assets/images/double_arrow.png'></p>
                     </th>
                     <th>
                        <p>Customer details <img src='assets/images/double_arrow.png'></p>
                     </th>
                     <th>
                        <p>Payment</p>
                     </th>
                     <th>
                        <p>Distance <img src='assets/images/double_arrow.png'></p>
                     </th>
                     <th>
                        <p class='text-center'>Actions</p>
                     </th>
               </tr>";


      $result = $this->model->getUpcomingService_Sp($userid, $offset, $limit);

      while ($row = mysqli_fetch_assoc($result)) {

         $servicerequestid = $row["ServiceRequestId"];
         $serviceid = $row["ServiceId"];
         $datetime = $row["ServiceStartDate"];
         $payment = $row["TotalCost"];
         $totalhr = $row["ServiceHours"] + $row["ExtraHours"];
         $serviceproviderid = $row["ServiceProviderId"];

         //Hours and Minutes
         $hour = (int)$totalhr;
         $isminutes = $totalhr - $hour;
         if ($isminutes > 0) {
            $minutes = 30;
         } else {
            $minutes = 0;
         }

         //Customer details
         $customerid = $row["UserId"];
         // $row1 = $this->model->getAddress_SP($customerid);
         $row1 = $this->model->getAddress_SD($servicerequestid);
         $customer_address = $row1["AddressLine1"] . ", " . $row1["AddressLine2"] . " " . $row1["City"] . " " . $row1["PostalCode"];

         $row2 = $this->model->getuserdetails($customerid);

         $fname = $row2["FirstName"];
         $lname = $row2["LastName"];
         $name = $fname . " " . $lname;

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("G:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));

         $output .= "<tr data-toggle='modal' data-target='#upcoming_service_details' onclick='SetUpcomingServiceModal($servicerequestid)'>
                        <td>
                           <p>$serviceid</p>
                        </td>
                        <td>
                           <p style='font-weight: 500'><img src='assets/images/calendar2.png'>$date</p>
                           <p><img src='assets/images/clock.png'> $starttime - $endtime</p>
                        </td>
                        <td>
                           <p>$name</p>
                           <p><img src='assets/images/home.png'>$customer_address</p>
                        </td>
                        <td>
                           <p>$payment ???</p>
                        </td>
                        <td>
                           <p></p>
                        </td>
                        <td>
                           <p class='text-right_cancel'>
                              <button type='button' class='Cancel_button'>Cancel</button>
                           </p>
                        </td>
                  </tr>";
      }

      echo $output;
   }

   function GetUpcomingServiceDetails()
   {
      $servicerequestId = $_POST["id"];

      $row = $this->model->getUpcomingServiceDetails($servicerequestId);

      $servicerequestid = $row["ServiceRequestId"];
      $details["serviceRequestId"]  = $servicerequestid;
      $details["serviceid"] = $row["ServiceId"];
      $datetime = $row["ServiceStartDate"];
      $details["payment"] = $row["TotalCost"];
      $details["totalhr"] = $row["ServiceHours"] + $row["ExtraHours"];
      $totalhr = $details["totalhr"];
      $serviceproviderid = $row["ServiceProviderId"];
      $details["comment"] = $row["Comments"];
      $details["HasPets"] = $row["HasPets"];

      //Hour and time
      $hour = (int)$totalhr;
      $isminutes = $totalhr - $hour;
      $minutes = ($isminutes > 0) ? 30 : 0;


      //Customer details
      $customerid = $row["UserId"];
      // $row1 = $this->model->getAddress_SP($customerid);
      $row1 = $this->model->getAddress_SD($servicerequestid);
      $details["customer_address"] = $row1["AddressLine1"] . ", " . $row1["AddressLine2"] . " " . $row1["City"] . " " . $row1["PostalCode"];

      $row2 = $this->model->getuserdetails($customerid);

      $fname = $row2["FirstName"];
      $lname = $row2["LastName"];
      $details["name"] = $fname . " " . $lname;

      // Date & Time 
      $datetime_arr = explode(" ", $datetime);
      $details["date"] = $datetime_arr[0];
      $time = $datetime_arr[1];
      $details["starttime"] = date("G:i", strtotime($time));
      $details["endtime"] = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));

      date_default_timezone_set('Asia/Calcutta');
      $todayDate = date("Y/m/d G:i:s");
      $datetime = date("Y/m/d h:i:s", strtotime($datetime));


      $endtime_us = date("H:i:s", strtotime($details["endtime"]));
      $datetime_end =  date("Y/m/d G:i:s", strtotime($details["date"] . " " . $endtime_us));

      $details["endtime_check"] = $datetime_end;
      $details["todayDate"] = $todayDate;

      // echo $todayDate;
      // $details["datetime"] = $datetime;
      // $details["todayDate"] = $todayDate;

      if ($todayDate > $datetime_end) {
         $details["Complete"] = 1;
      } else {
         $details["Complete"] = 0;
      }


      // Extra Service 
      $servicedetails["ServiceExtraId"] = [];

      $result1 = $this->model->getextraservicedeatils($servicerequestid);

      if (mysqli_num_rows($result1) == 0) {
         array_push($servicedetails["ServiceExtraId"], 0);
      } else {
         while ($row1 = mysqli_fetch_assoc($result1)) {
            array_push($servicedetails["ServiceExtraId"], $row1["ServiceExtraId"]);
         }
      }


      // Extra Service Name 
      $details["ExtraService"] = [];
      foreach ($servicedetails["ServiceExtraId"] as $value) {

         if ($value == 1) {
            array_push($details["ExtraService"], "Inside Cabinet");
         } else if ($value == 2) {
            array_push($details["ExtraService"], "Inside fridge");
         } else if ($value == 3) {
            array_push($details["ExtraService"], "Inside oven");
         } else if ($value == 4) {
            array_push($details["ExtraService"], "Inside fridge");
         } else if ($value == 5) {
            array_push($details["ExtraService"], "Laundry wash & dry");
         } else {
            array_push($details["ExtraService"], 0);
         }
      }

      echo json_encode($details);
   }

   function cancelServiceRequest()
   {
      $serviceRequestId = $_POST["id"];

      $this->model->cancelServiceRequest_SP($serviceRequestId);
   }

   function completeServiceRequest()
   {
      $serviceRequestId = $_POST["id"];

      $this->model->completeServiceRequest_SP($serviceRequestId);

      //Insert in favorite table
      $userid = $_SESSION["userid"];
      $row = $this->model->getUpcomingServiceDetails($serviceRequestId);

      $customerId = $row["UserId"];
      $this->model->insertFavoriteBlock($userid, $customerId);
   }

   function TotalEntriesUpcomingService()
   {
      $userid = $_SESSION["userid"];

      $no = $this->model->gettotalentries_us($userid);
      echo $no;
   }

   //Service History of Service Provider

   function loadServiceHistory_SP()
   {
      $userid = $_SESSION["userid"];
      $parameterarr = explode("-", $_GET["parameter"]);
      $offset = $parameterarr[0];
      $limit = $parameterarr[1];

      $output = "<tr class='table_heading'>
                     <th>
                        <p>Service ID</p>
                     </th>
                     <th>
                        <p>Service date</p>
                     </th>
                     <th>
                        <p>Customer details </p>
                     </th>
               </tr>";

      $result = $this->model->getServiceHistory_SP($userid, $offset, $limit);

      while ($row = mysqli_fetch_assoc($result)) {

         $servicerequestid = $row["ServiceRequestId"];
         $serviceid = $row["ServiceId"];
         $datetime = $row["ServiceStartDate"];
         $payment = $row["TotalCost"];
         $totalhr = $row["ServiceHours"] + $row["ExtraHours"];
         $serviceproviderid = $row["ServiceProviderId"];

         //Customer details
         $customerid = $row["UserId"];
         // $row1 = $this->model->getAddress_SP($customerid);
         $row1 = $this->model->getAddress_SD($servicerequestid);
         $customer_address = $row1["AddressLine1"] . ", " . $row1["AddressLine2"] . " " . $row1["City"] . " " . $row1["PostalCode"];

         $row2 = $this->model->getuserdetails($customerid);

         $fname = $row2["FirstName"];
         $lname = $row2["LastName"];
         $name = $fname . " " . $lname;


         //Hour and time
         $hour = (int)$totalhr;
         $isminutes = $totalhr - $hour;
         $minutes = ($isminutes > 0) ? 30 : 0;

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("G:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));

         $output .= "<tr data-toggle='modal' data-target='#service_history_details' onclick='SetServiceHistoryModal_SP($servicerequestid)'>
                        <td>
                           <p>$serviceid</p>
                        </td>
                        <td>
                           <p style='font-weight: 500;'><img src='assets/images/calendar2.png'> $date</p>
                           <p><img src='assets/images/clock.png'> $starttime - $endtime</p>
                        </td>
                        <td>
                           <p>$name</p>
                           <p><img src='assets/images/home.png'>$customer_address</p>
                        </td>
                  </tr>";
      }

      echo $output;
   }

   function TotalEntriesServiceHistory_Sp()
   {
      $userid = $_SESSION["userid"];

      $no = $this->model->gettotalentriesServiceHistory_Sp($userid);
      echo $no;
   }

   function fetchfullservicehistory_SP()
   {
      $userid = $_SESSION["userid"];

      $output = "<tr class='table_heading'>
                     <th>Service ID</th>
                     <th>Service date</th>
                     <th>Customer Name</th>
                     <th>Customer Address</th>
                     <th>Total Payment</th>
               </tr>";

      $result = $this->model->getServiceHistoryExport($userid);

      while ($row = mysqli_fetch_assoc($result)) {

         $servicerequestid = $row["ServiceRequestId"];
         $serviceid = $row["ServiceId"];
         $datetime = $row["ServiceStartDate"];
         $payment = $row["TotalCost"];
         $totalhr = $row["ServiceHours"] + $row["ExtraHours"];
         $serviceproviderid = $row["ServiceProviderId"];

         //Customer details
         $customerid = $row["UserId"];
         // $row1 = $this->model->getAddress_SP($customerid);
         $row1 = $this->model->getAddress_SD($servicerequestid);
         $customer_address = $row1["AddressLine1"] . ", " . $row1["AddressLine2"] . " " . $row1["City"] . " " . $row1["PostalCode"];

         $row2 = $this->model->getuserdetails($customerid);

         $fname = $row2["FirstName"];
         $lname = $row2["LastName"];
         $name = $fname . " " . $lname;


         //Hour and time
         $hour = (int)$totalhr;
         $isminutes = $totalhr - $hour;
         $minutes = ($isminutes > 0) ? 30 : 0;

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("G:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));

         $output .= "<tr>
                        <td>$serviceid</td>
                        <td>$date $starttime - $endtime</td>
                        <td>$name</td>
                        <td>$customer_address</td>
                        <td>$payment</td>
                  </tr>";
      }
      echo $output;
   }

   function GetBlockedCustomerlist()
   {
      $userid = $_SESSION["userid"];

      $result = $this->model->getServiceHistoryExport($userid);
      $userarr = [];
      while ($row = mysqli_fetch_assoc($result)) {

         if (!in_array($row["UserId"], $userarr)) {
            array_push($userarr, $row["UserId"]);
         }
      }
      // print_r($userarr);

      $parameterarr = explode("-", $_GET["parameter"]);
      $offset = $parameterarr[0];
      $limit = $parameterarr[1];

      $user_arr_range = array_slice($userarr, $offset, $limit);

      $output = "";
      foreach ($user_arr_range as $customerId) {
         $row = $this->model->FavouriteBlockedCustomerDetails($customerId, $userid);
         $IsBlocked = $row["IsBlocked"];
         $customerName = $row["FirstName"] . " " . $row["LastName"];
         $id = $row["Id"];
         $favblock = $row["IsBlocked"];

         $output .= "<div class='block_box'>
                        <div class='block_logo'>
                           <img src='assets/images/avatar-car.png'>
                        </div>
                        <p class='block_name'>$customerName</p>";

         if ($IsBlocked == 0) {
            $output .=     "<button class='Cancel_button favblock' id='$id-$favblock'>Block</button>
                  </div>";
         } else {
            $output .=     "<button class='Cancel_button favblock' id='$id-$favblock'>UnBlock</button>
                  </div>";
         }
      }
      echo $output;
   }

   function GetBlockedCustomertotal()
   {
      $userid = $_SESSION["userid"];

      $result = $this->model->getServiceHistoryExport($userid);
      $userarr = [];
      while ($row = mysqli_fetch_assoc($result)) {

         if (!in_array($row["UserId"], $userarr)) {
            array_push($userarr, $row["UserId"]);
         }
      }

      echo count($userarr);
   }

   function SetFavBlockedCustomerlist()
   {
      $id = $_POST["favouriteId"];
      $id_arr = explode("-", $id);
      $favblockid = (int)$id_arr[0];
      $isBlocked = (int)$id_arr[1];

      if ($isBlocked == 1) {
         // $favvalue = $this->model->IsAlreadyAnotherBlocked($favblockid);

         $this->model->favcustomer($favblockid);
      } else {
         // $blockvalue = $this->model->IsAlreadyAnotherBlocked($favblockid);

         $this->model->blockcustomer($favblockid);
      }
   }

   function Ratinglist_Sp()
   {
      $userid = $_SESSION["userid"];
      $orderby = $_POST["orderby"];
      $rating_select_val = (int) $_POST["rating"];

      if ($rating_select_val == 6) {
         $startRatingValue = 1;
         $endRatingValue = 6;
      } else {
         $startRatingValue = $rating_select_val;
         $endRatingValue = $startRatingValue + 1;
      }

      $offset = (int) $_POST["offset_val"];
      $limit = (int)$_POST["limit_val"];

      $result = $this->model->getRatinglist_Sp($userid, $orderby, $startRatingValue, $endRatingValue, $offset, $limit);

      $output = "";

      while ($row = mysqli_fetch_assoc($result)) {
         $rating_comment = $row["Comments"];
         $rating_value = $row["Ratings"];
         $CustomerId = $row["RatingFrom"];
         $servicerequestid = $row["ServiceRequestId"];

         // $servicedetails =  $this->model->getUpcomingServiceDetails($servicerequestid);

         $serviceid = $row["ServiceId"];
         $datetime = $row["ServiceStartDate"];
         $totalhr = $row["ServiceHours"] + $row["ExtraHours"];


         //Hour and time
         $hour = (int)$totalhr;
         $isminutes = $totalhr - $hour;
         $minutes = ($isminutes > 0) ? 30 : 0;

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("G:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));


         // $userdetails = $this->model->getuserdetails($CustomerId);

         $fname = $row["FirstName"];
         $lname = $row["LastName"];
         $name = $fname . " " . $lname;

         $output .= "<div class='rating_box'>
                        <div class='row'>
                           <div class='col-md-3 rating_name'>
                              <p>$serviceid</p>
                              <p class='name'>$name</p>
                           </div>
                           <div class='col-md-5 rating_date'>
                              <p style='font-weight: 500'><img src='assets/images/calendar2.png'> $date</p>
                              <p><img src='assets/images/clock.png'> $starttime - $endtime</p>
                           </div>
                           <div class='col-md-4 rating_star'>
                              <p>ratings</p>

                              <span class='mr-4 ml-2 rating_value_Sp' id='$servicerequestid-ratingValueSp'>$rating_value</span>";

         if ($rating_value > 3) {
            $output .=           "<span>very good</span>";
         } else {
            $output .=           "<span>Not good</span>";
         }


         $output .= "         <span class='starrating_Sp' id='$servicerequestid-ratingSp'></span>
                           </div>
                        </div>

                        <hr>

                        <div class='comments'>
                           <p class='comment_heading'>Customer Comments</p>
                           <p>$rating_comment</p>
                        </div>
                  </div>";
      }
      echo $output;
   }

   function TotalRatinglist_Sp()
   {
      $userid = $_SESSION["userid"];
      $orderby = $_POST["orderby"];
      $rating_select_val = (int) $_POST["rating"];

      if ($rating_select_val == 6) {
         $startRatingValue = 1;
         $endRatingValue = 6;
      } else {
         $startRatingValue = $rating_select_val;
         $endRatingValue = $startRatingValue + 1;
      }

      $total_no = $this->model->totalRatinglist_Sp($userid, $startRatingValue, $endRatingValue);

      echo $total_no;
   }

   function GetBlockedCustomerlisttotal()
   {
      $userid = $_SESSION["userid"];

      $total = $this->model->getFavBlockCustomerListtotal($userid);
      echo $total;
   }

   function GetBlockedCustomerlist_C()
   {
      $userid = $_SESSION["userid"];

      $parameterarr = explode("-", $_GET["parameter"]);
      $offset = $parameterarr[0];
      $limit = $parameterarr[1];

      $result = $this->model->getFavBlockCustomerList($userid, $offset, $limit);

      $output = "";
      while ($row = mysqli_fetch_assoc($result)) {

         $serviceproviderid = $row["TargetUserId"];
         $row1 = $this->model->getuserdetails($serviceproviderid);

         $name = $row1["FirstName"] . " " . $row1["LastName"];
         $logo = $row1["UserProfilePicture"];
         $favblockId = $row["Id"];

         $totalcleaning = $this->model->totalcleaningbyProvider($userid, $serviceproviderid);
         $result2 = $this->model->averageratingSp($userid, $serviceproviderid);

         if (mysqli_num_rows($result2) > 0) {

            $count = 0;
            $sum = 0;
            while ($row2 = mysqli_fetch_assoc($result2)) {
               $sum += $row2["Ratings"];
               $count++;
            }

            $avgrating = $sum / $count;
         } else {
            $avgrating = 0;
         }


         $output .= "<div class='block_box'>
                        <div class='block_logo'>
                           <img src='assets/images/$logo'>
                        </div>
                        <p class='block_name'>$name</p>

                        <div style='width: 100%; display: flex; justify-content: center;'>
                           
                           <div class='rating_customer $avgrating-set_avg_rating'></div>
                           <span class='ml-2 set_avg_rating'>$avgrating</span>
                        </div>

                        <p class='text-center'>$totalcleaning Cleanings</p>
                        <div style='width: 100%; display: flex; justify-content: center;'>";

         if ($row["IsFavorite"] == 1) {
            $output .= "<button class='accept_btn' id='$favblockId-spfav' onclick='favouriteSp(id)'>Remove</button>";
         } else {
            $output .= "<button class='accept_btn' id='$favblockId-spfav' onclick='favouriteSp(id)'>Favorite</button>";
         }

         if ($row["IsBlocked"] == 1) {
            $output .=  "<button class='Cancel_button ml-2' style='margin: 0;' id='$favblockId-spblock' onclick='BlockedSp(id)'>UnBlock</button>
                        </div>
                  </div>";
         } else {
            $output .=  "<button class='Cancel_button ml-2' style='margin: 0;' id='$favblockId-spblock' onclick='BlockedSp(id)'>Block</button>
                        </div>
                  </div>";
         }
      }

      echo $output;
   }

   function favouriteblocked_C()
   {
      $favblockId = $_POST["favouriteId"];

      $row = $this->model->setOrRemoveFav($favblockId);
      if ($row["IsFavorite"] == 1) {
         $this->model->setUnfavourite($favblockId);
      } else {
         $this->model->setfavourite($favblockId);
      }
   }

   function favouriteblocked_C2()
   {
      $favblockId = $_POST["favouriteId"];

      $row = $this->model->setOrRemoveFav($favblockId);
      if ($row["IsBlocked"] == 1) {
         $this->model->favcustomer($favblockId);
      } else {
         $this->model->blockcustomer($favblockId);
      }
   }

   //Admin Section

   function fetchtotalRecord_SM()
   {
      $condition = $_POST["reason"];

      $result = $this->model->fetchTotalServiceRequestDetails($condition);

      echo mysqli_num_rows($result);
   }

   function loadServiceRequestAdmin()
   {
      $condition = $_POST["condition"];

      $parameterarr = explode("-", $_GET["parameter"]);
      $offset = $parameterarr[0];
      $limit = $parameterarr[1];

      $output = "<tr class='table_heading service_req_heading'>
                  <th>Service ID</th>
                  <th>Service date</th>
                  <th>Customer Details</th>
                  <th>Service Provider</th>
                  <th>Net Amount</th>
                  <th>Status</th>
                  <th>Action</th>
            </tr>";

      $result = $this->model->fetchAllServiceRequestDetails($condition, $offset, $limit);

      $userlist = [];
      $helperslist = [];

      while ($row = mysqli_fetch_assoc($result)) {

         $servicerequestid = $row["ServiceRequestId"];
         $serviceid = $row["ServiceId"];
         $datetime = $row["ServiceStartDate"];
         $payment = $row["TotalCost"];
         $totalhr = $row["ServiceHours"] + $row["ExtraHours"];
         $serviceproviderid = $row["ServiceProviderId"];
         $status = $row["Status"];

         //Hour and time
         $hour = (int)$totalhr;
         $isminutes = $totalhr - $hour;
         $minutes = ($isminutes > 0) ? 30 : 0;

         //Customer details
         $customerid = $row["UserId"];
         // $row1 = $this->model->getAddress_SP($customerid);
         $row1 = $this->model->getAddress_SD($servicerequestid);
         $customer_address = $row1["AddressLine1"] . ", " . $row1["AddressLine2"] . " " . $row1["City"] . " " . $row1["PostalCode"];

         $row2 = $this->model->getuserdetails($customerid);

         $fname = $row2["FirstName"];
         $lname = $row2["LastName"];
         $name = $fname . " " . $lname;

         array_push($userlist, $name);

         //Service Provider Details


         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("G:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$hour hour +$minutes minutes", strtotime($time)));


         $output .= "<tr class='table_row service_req_row'>
                        <td>$serviceid</td>
                        <td>
                           <p style='font-weight: 500'><img src='assets/images/calendar2.png'> $date</p>
                           <p><img src='assets/images/clock.png'> $starttime - $endtime</p>
                        </td>
                        <td>
                           <p>$name</p>
                           <p><img src='assets/images/home.png'>$customer_address</p>
                        </td>";

         if (isset($serviceproviderid)) {

            $row3 = $this->model->getuserdetails($serviceproviderid);
            $fnameSP = $row3["FirstName"];
            $lnameSP = $row3["LastName"];
            $nameSP = $fnameSP . " " . $lnameSP;
            $avatar = $row3["UserProfilePicture"];

            array_push($helperslist, $nameSP);

            $output .=  "<td>
                           <div>
                              <img src='assets/images/$avatar' class='cap_border_admin'>

                              <p class='ml-5'>$nameSP</p>";

            $result_rating = $this->model->getAverageRating($servicerequestid);

            if (isset($result_rating)) {

               $rating = mysqli_fetch_assoc($result_rating);
               $rating_value = $rating["Ratings"];

               $output .=                  "<div class='rating_admin $rating_value'></div>
                               <p class='text-center'>$rating_value</p> 
                           </div>
                        </td>";
            } else {
               $output .=  "</div>
                        </td>";
            }
         } else {
            $output .= "<td></td>";
         }



         $output .=  "<td>
                           <p class='net_amount'>$payment ???</p>
                        </td>
                        <td class='text-center status_box'>";


         if ($status == 1) {
            $output .=   "<div class='status'>
                              <p class='active'>Complete</p>
                           </div>";
         } elseif ($status == 0) {
            $output .=   "<div class='status_upcoming'>
                              <p class='active'>New</p>
                           </div>";
         } else {
            $output .=   "<div class='status_inactive'>
                              <p class='active'>Cancel</p>
                           </div>";
         }


         $output .=  "</td>
                        <td>
                           <div class='btn-group menu_option_dot'>
                              <div data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <img src='assets/images/show-more-button-with-three-dots.png' width='20px' height='20px'>
                              </div>
                              <div class='dropdown-menu dropdown-menu-right'>";

         if ($status == 0) {
            $output .=     "<!-- Dropdown menu links -->
                        <a class='dropdown-item edit_reschedule' onclick='ServiceDetails($servicerequestid)'>Edit and Reschedule</a>";
         }

         $output .=                 "<a class='dropdown-item' data-toggle='modal' data-target='#redund_modal' onclick='RefundDetails($servicerequestid)'>Refund</a>
                                    <a class='dropdown-item'>Cancel</a>
                                    <a class='dropdown-item'>Change SP</a>
                                    <a class='dropdown-item'>Escale</a>
                                    <a class='dropdown-item'>History Log</a>
                                    <a class='dropdown-item'>Download Invoice</a>
                              </div>
                           </div>
                        </td>
                  </tr>";
      }

      echo $output;

      $userlist_unique = array_unique($userlist);
      $helperslist_unique = array_unique($helperslist);
   }

   function loadCustomerOptionAdmin()
   {
      $output = "<option value='user_name' disabled selected>Select Customer</option>";
      $condition = 'S.Status >= 0';

      $result = $this->model->fetchAllServiceRequestDetails_Option($condition);

      $userlist = [];

      while ($row = mysqli_fetch_assoc($result)) {

         $customerid = $row["UserId"];
         $row2 = $this->model->getuserdetails($customerid);

         $fname = $row2["FirstName"];
         $lname = $row2["LastName"];
         $name = $fname . " " . $lname;

         // array_push($userlist, $name);
         $userlist[$customerid] = $name;
      }

      $userlist_unique = array_unique($userlist);

      foreach ($userlist_unique as $key => $value) {
         $output .= "<option value='$key'>$value</option>";
      }

      echo $output;
   }

   function loadHelpersOptionAdmin()
   {
      $output = "<option value='user_type' disabled selected>Select Service Provider</option>";
      $condition = 'S.Status >= 0';

      $result = $this->model->fetchAllServiceRequestDetails_Option($condition);

      $helperslist = [];

      while ($row = mysqli_fetch_assoc($result)) {

         $serviceproviderid = $row["ServiceProviderId"];

         if (isset($serviceproviderid)) {

            $row3 = $this->model->getuserdetails($serviceproviderid);
            $fnameSP = $row3["FirstName"];
            $lnameSP = $row3["LastName"];
            $nameSP = $fnameSP . " " . $lnameSP;

            // array_push($helperslist, $nameSP);
            $helperslist[$serviceproviderid] = $nameSP;
         }
      }

      $helperslist_unique = array_unique($helperslist);

      foreach ($helperslist_unique as $key => $value) {
         $output .= "<option value='$key'>$value</option>";
      }

      echo $output;
   }

   function loadEditServiceModalAdmin()
   {
      $serviceRequestId = $_POST["servicerequestid"];

      $row = $this->model->getUpcomingServiceDetails($serviceRequestId);

      $datetime = $row["ServiceStartDate"];

      $datetime_arr = explode(" ", $datetime);
      $editmodal["date"] = $datetime_arr[0];
      $time = $datetime_arr[1];
      $editmodal["starttime"] = date("G:i", strtotime($time));

      $row1 = $this->model->getAddress_SD($serviceRequestId);
      $editmodal["Address1"] = $row1["AddressLine1"];
      $editmodal["Address2"] = $row1["AddressLine2"];
      $editmodal["City"] = $row1["City"];
      $editmodal["zipcode"] = $row1["PostalCode"];
      $editmodal["id"] = $serviceRequestId;

      echo json_encode($editmodal);
   }




   //Admin User Management

   function loadUserManagAdmin()
   {
      $condition = $_POST["reason"];

      $parameterarr = explode("-", $_GET["parameter"]);
      $offset = $parameterarr[0];
      $limit = $parameterarr[1];


      $output = "<tr class='table_heading'>
                     <th>UserName</th>
                     <th>Date of Registration</th>
                     <th>User Type</th>
                     <th>Phone</th>
                     <th>Postal Code</th>
                     <th>Status</th>
                     <th>Action</th>
               </tr>";

      $result = $this->model->getAllUserDetails($condition, $offset, $limit);

      while ($row = mysqli_fetch_assoc($result)) {

         $name = $row["FirstName"] . " " . $row["LastName"];
         $phoneno = $row["Mobile"];
         $zipcode = $row["ZipCode"];
         $usertype = $row["UserTypeId"];
         $isActive = $row["IsActive"];
         $userid = $row["UserId"];

         //Date 
         $datetime = $row["CreatedDate"];
         $datetimearr = explode(" ", $datetime);
         $date = $datetimearr[0];

         $output .= "<tr class='table_row'>
                        <td>$name</td>
                        <td class='status_box'>
                           <p>
                              <img src='assets/images/calendar2.png'>
                              <span>$date</span>
                           </p>
                        </td>";

         if ($usertype == 1) {
            $output .=     "<td>Customer</td>";
         } else {
            $output .=     "<td>Service Provider</td>";
         }



         $output .= "   <td>$phoneno</td>
                        <td>$zipcode</td>
                        <td>";

         if ($isActive == 1) {
            $output .=       "<div class='status'>
                              <p class='active'>Active</p>
                           </div>";
         } else {
            $output .=       "<div class='status_inactive'>
                                 <p class='active'>Inactive</p>
                           </div>";
         }



         $output .=       "</td>
                        <td>
                           <div class='btn-group'>
                              <div data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <img src='assets/images/show-more-button-with-three-dots.png' width='20px' height='20px'>
                              </div>
                              <div class='dropdown-menu dropdown-menu-right'>
                                    <!-- Dropdown menu links -->
                                    <a class='dropdown-item'>Edit</a>";

         if ($isActive == 1) {
            $output .=              "<a class='dropdown-item' id='$userid/0/changestatus' onclick='UserActiveStatus(id)'>Deactive</a>";
         } else {
            $output .=              "<a class='dropdown-item' id='$userid/1/changestatus' onclick='UserActiveStatus(id)'>Active</a>";
         }



         $output .=                 "<a class='dropdown-item'>Service History</a>
                              </div>
                           </div>
                        </td>
                  </tr>";
      }

      echo $output;
   }

   function updateServiceAddress_Modal()
   {
      $address["streetName"] = $_POST["streetName"];
      $address["houseNo"] = $_POST["houseNo"];
      $address["zipcode"] = $_POST["Zipcode"];
      $address["city"] = $_POST["City"];
      $address["id"] = $_POST["serviceid"];

      $this->model->updateServiceAddress($address);
   }

   function SendMailbyAdminEdit()
   {
      $servicerequestId = $_POST["servicerequestid"];
      $reason = $_POST["body"];

      $row = $this->model->getServiceRequests_SP_details($servicerequestId);

      $userid = $row["UserId"];
      $serviceproviderId = $row["ServiceProviderId"];

      if (isset($userid)) {
         $row2 = $this->model->getuserdetails($userid);
         sendMail($row2["Email"], "Service Changed by Admin", $reason . "<br> <br> Please login again and check the new date, time and Address");
      }

      if (isset($serviceproviderId)) {
         $row2 = $this->model->getuserdetails($serviceproviderId);
         sendMail($row2["Email"], "Service Changed by Admin", $reason . "<br> <br> Please login again and check the new date, time and Address");
      }
   }

   function ChangeActiveStatus()
   {
      $userid = $_POST["Userid"];
      $activestatus = $_POST["ActiveStatus"];

      $this->model->UpdateActiveStatus($userid, $activestatus);
   }

   function fetchCustomerNameList()
   {
      $result = $this->model->getAllUserDetails_UM('UserTypeId < 2');

      $output = "<option value='user_name' disabled selected>Select User Name</option>";
      while ($row = mysqli_fetch_assoc($result)) {
         $userid = $row["UserId"];
         $name = $row["FirstName"] . " " . $row["LastName"];

         $output .= "<option value=$userid>$name</option>";
      }

      echo $output;
   }

   function fetchtotalRecord_UM()
   {

      $condition = $_POST["reason"];
      $result = $this->model->getAllUserDetails_UM($condition);

      echo mysqli_num_rows($result);
   }

   //Export User management table of Admin

   function loadExportUserManagAdmin()
   {
      $condition = $_POST["reason"];

      $output = "<tr class='table_heading'>
                     <th>UserName</th>
                     <th>Date of Registration</th>
                     <th>User Type</th>
                     <th>Phone</th>
                     <th>Postal Code</th>
                     <th>Status</th>
               </tr>";

      $result = $this->model->getAllUserDetails_UM($condition);

      while ($row = mysqli_fetch_assoc($result)) {

         $name = $row["FirstName"] . " " . $row["LastName"];
         $phoneno = $row["Mobile"];
         $zipcode = $row["ZipCode"];
         $usertype = $row["UserTypeId"];
         $isActive = $row["IsActive"];
         $userid = $row["UserId"];

         //Date 
         $datetime = $row["CreatedDate"];
         $datetimearr = explode(" ", $datetime);
         $date = $datetimearr[0];

         $output .= "<tr class='table_row'>
                        <td>$name</td>
                        <td>$date</td>";

         if ($usertype == 1) {
            $output .=     "<td>Customer</td>";
         } else {
            $output .=     "<td>Service Provider</td>";
         }



         $output .= "   <td>$phoneno</td>
                        <td>$zipcode</td>";

         if ($isActive == 1) {
            $output .=       "<td>Active</td>";
         } else {
            $output .=       "<td>Inactive</td>";
         }


         $output .= "</tr>";
      }

      echo $output;
   }

   function fetchrefundmodaldetails()
   {
      $id = $_POST["serviceRequestId"];

      $row = $this->model->getServiceRequests_SP_details($id);

      $refunddetails["totalcost"] = $row["TotalCost"];
      $refunddetails["refundAmount"] = $row["RefundedAmount"];

      echo json_encode($refunddetails);
   }

   function updaterefundvalue()
   {
      $id = $_POST["serviceRequestId"];
      $refundedAmount = $_POST["refunded_amount"];

      $this->model->updateRefundedValue($id, $refundedAmount);
   }

   function loadsevent()
   {
      $userid = $_SESSION["userid"];

      $result = $this->model->getallevents($userid);

      $data = array();

      while ($row = mysqli_fetch_assoc($result)) {

         $Servicedate = $row["ServiceStartDate"];
         $Servicedatearr = explode(" ", $Servicedate);

         $timearr = explode(".", $Servicedatearr[1]);

         $status = $row["Status"];

         if ($status == 2) {
            $color = 'red';
         } else if ($status == 1) {
            $color = 'green';
         } else {
            $color = 'blue';
         }


         $data[] = array(
            'id'   => $row["UserId"],
            'title'   => 'Service time:- ' . $timearr[0],
            'start'   => $Servicedatearr[0],
            'backgroundColor' => $color
         );
      }

      echo json_encode($data);
   }
}
