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

         $email = '181200107053@asoit.edu.in';
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

      echo $_SESSION["servicerequestid"];

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
         $serviceproviderid = $row["ServiceProviderId"];
         // echo $serviceproviderid;

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("g:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$totalhr hour", strtotime($time)));




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
                           <p class='euro_price text-left'>$payment €
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

      $datetime = $date . " " . $time . ":00";

      echo $date;
      echo $time;
      $this->model->updatedatetimeservice($id, $datetime);

      $result = $this->model->getEmailOfServiceProvider($id);
      $row = mysqli_fetch_assoc($result);
      $userid = $row["ServiceProviderId"];
      if ($userid != NULL) {
         $row = $this->model->getuserdetails($userid);
         $email = $row["Email"];
         $subject = 'Service Date Change';
         $body = "Service Request ".$id." has been rescheduled by customer. New date and time are {".$date.",".$time."}";
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

      $result = $this->model->checkserviceavailable($datetime);
      $no = mysqli_num_rows($result);
      echo $no;
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
      $servicedetails["duration"] = $totalhr;
      $datetime_arr = explode(" ", $datetime);
      $servicedetails["date"] = $datetime_arr[0];
      $time = $datetime_arr[1];
      $servicedetails["starttime"] = date("g:i", strtotime($time));
      $servicedetails["endtime"] = date("H:i", strtotime("+$totalhr hour", strtotime($time)));

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

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("g:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$totalhr hour", strtotime($time)));

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
                           <button type='button' class='RateSp'>Rate SP</button>
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

         // Date & Time 
         $datetime_arr = explode(" ", $datetime);
         $date = $datetime_arr[0];
         $time = $datetime_arr[1];
         $starttime = date("g:i", strtotime($time));
         $endtime = date("H:i", strtotime("+$totalhr hour", strtotime($time)));

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
}
