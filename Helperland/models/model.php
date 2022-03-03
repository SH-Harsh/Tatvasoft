<?php

class EventModal
{
    function __construct()
    {
        include "view/db.php";
    }


    function contact_insert($contact)
    {

        global $connection;
        $first_name = $contact['first_name'];
        $last_name = $contact['last_name'];
        $email = $contact['email'];
        $subject = $contact['subject'];
        $phone_no = $contact['phone_no'];
        $message = $contact['message'];
        $file_name = $contact['file_name'];
        $file_name_temp = $contact['file_name_temp'];

        $target_path = "D:\\Xampp\htdocs\HelperLand\assets\user_attachment\\$file_name";
        move_uploaded_file($file_name_temp, $target_path);

        $name = "$first_name " . "$last_name";


        $qry = "INSERT INTO contactus (`ContactUsId`, `Name`, `Email`, `Subject`, `PhoneNumber`, `Message`,
                `UploadFileName`, `CreatedOn`, `CreatedBy`, `File`, `AssignedToUser`) 
                VALUES (NULL, '$name', '$email', '$subject', '$phone_no', '$message', '$file_name', now(), NULL, 
                'file_get_contents($file_name_temp)', NULL);";


        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $_SESSION["contactus"] = "We will contact you ASAP";
        }
    }


    function insertuserdetails($user)
    {

        global $connection;
        $fname = $user['fname'];
        $lname = $user['lname'];
        $email = $user['email'];
        $phone_no = $user['phone_no'];
        $password = $user['password1'];
        $RegisteredUser = $user['isUser'];

        $qry = "INSERT INTO `user` (`UserId`, `FirstName`, `LastName`, `Email`, `Password`, `Mobile`, `UserTypeId`, 
                `Gender`, `DateOfBirth`, `UserProfilePicture`, `IsRegisteredUser`, `PaymentGatewayUserRef`, `ZipCode`, `WorksWithPets`,
                `LanguageId`, `NationalityId`, `CreatedDate`, `ModifiedDate`, `ModifiedBy`, `IsApproved`, `IsActive`, 
                `IsDeleted`, `Status`, `IsOnline`, `BankTokenId`, `TaxNo`)
                 VALUES (NULL, '$fname', '$lname', '$email', '$password', '$phone_no', '0', NULL, NULL, NULL, 
                 '$RegisteredUser', NULL, NULL, '0', NULL, NULL, '', '', '', '0', '0', '0', NULL, '0', NULL, NULL);";

        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function loginuser($user)
    {

        global $connection;
        $email = $user["email"];
        $password = $user["password"];

        $qry = "SELECT *FROM user where Email = '$email' and `Password` = '$password'";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row =  mysqli_fetch_assoc($result);
            return $row;
        }
    }

    // Fetch User Details from Forgot Password Modal 
    function forgotpasswordfetch($email)
    {

        global $connection;
        $qry = "SELECT *FROM user where Email = '$email'";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row =  mysqli_fetch_assoc($result);
            if (isset($row)) {
                $_SESSION["fp_email_sucess"] = "Link has been sent successfully to your email id";
                return $row["UserId"];
            } else {
                $_SESSION["fp_error"] = "Email is invalid";
            }
        }
    }

    // Change Password 
    function changepassword($user)
    {
        global $connection;
        $userid = $user["userid"];
        $password = $user["password"];

        $qry = "UPDATE user SET `Password` = '$password' WHERE UserId = $userid;";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    // Postal Code Validation 

    function ispostalcode($postalcode)
    {

        global $connection;
        $qry = "SELECT * FROM `user` INNER JOIN useraddress ON user.UserId = useraddress.UserId 
                WHERE user.IsRegisteredUser=0 AND useraddress.PostalCode = $postalcode";
        $result = mysqli_query($connection, $qry);

        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row =  mysqli_num_rows($result);
            if ($row > 0) {
                $city = mysqli_fetch_assoc($result);
                return $city["City"];
            } else {
                return false;
            }
        }
    }

    function insertservicerequest($servicerequest)
    {

        global $connection;
        $userid = $servicerequest["userid"];
        $serviceid = $servicerequest["serviceid"];
        $service_start_date = $servicerequest["date"] . " " . $servicerequest["time"] . ":00";
        $zipcode = $servicerequest["zipcode"];
        $service_hr = $servicerequest["duration"];
        $totalcost = $servicerequest["totalpayment"];
        $subtotal = $totalcost;
        $createddate = date("Y/m/d h:i:s");
        $modifieddate = $createddate;
        $pets = $servicerequest["pets"];
        $charge_per_hr = $servicerequest["charge_per_hr"];
        $totalextrahr = $servicerequest["totalextrahr"];
        $comments = $servicerequest["comments"];

        $qry = "INSERT INTO servicerequest (`ServiceRequestId`, `UserId`, `ServiceId`, `ServiceStartDate`, `ZipCode`, `ServiceFrequency`,
                 `ServiceHourlyRate`, `ServiceHours`, `ExtraHours`, `SubTotal`, `Discount`, `TotalCost`, `Comments`, `PaymentTransactionRefNo`,
                  `PaymentDue`, `JobStatus`, `ServiceProviderId`, `SPAcceptedDate`, `HasPets`, `Status`, `CreatedDate`, `ModifiedDate`,
                   `ModifiedBy`, `RefundedAmount`, `Distance`, `HasIssue`, `PaymentDone`, `RecordVersion`)
                    VALUES (NULL, $userid, $serviceid, '$service_start_date', $zipcode, NULL, $charge_per_hr, $service_hr, $totalextrahr,
                     $subtotal, NULL, $totalcost, '$comments', NULL, '0', NULL, NULL, NULL, $pets, 0, '$createddate', '$modifieddate', 
                     NULL, NULL, 0, NULL, NULL, NULL);";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function fetchservicerequestid($serviceid)
    {

        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE ServiceId = $serviceid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row =  mysqli_fetch_assoc($result);
            if (isset($row)) {
                return $row["ServiceRequestId"];
            }
        }
    }

    function insertextraservice($servicerequest)
    {

        global $connection;
        $servicerequestid  = $servicerequest["servicerequestid"];
        $extraservice = $servicerequest["extraservice"];

        foreach ($extraservice as $value) {
            $qry = "INSERT INTO servicerequestextra (`ServiceRequestExtraId`, `ServiceRequestId`, `ServiceExtraId`)
                    VALUES (NULL, $servicerequestid, '$value')";
            $result = mysqli_query($connection, $qry);
            if (!$result) {
                die("Query Failed" . mysqli_error($connection));
            }
        }
    }

    function fetchuseraddress()
    {
        global $connection;
        $userid = $_SESSION["userid"];

        $qry = "SELECT *FROM useraddress WHERE UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function insertuseraddress($useraddress)
    {
        global $connection;
        $streetname = $useraddress["streetname"];
        $houseno =  $useraddress["houseno"];
        $postalcode = $useraddress["postalcode"];
        $city = $useraddress["city"];
        $phoneno = $useraddress["phoneno"];
        $userid = $_SESSION["userid"];

        $qry = "INSERT INTO useraddress (`AddressId`, `UserId`, `AddressLine1`, `AddressLine2`, `City`, `State`, `PostalCode`, `IsDefault`,
             `IsDeleted`, `Mobile`, `Email`, `Type`) VALUES (NULL, $userid, '$houseno', '$streetname', '$city', 'Gujarat', 
             $postalcode, '0', '0', $phoneno, NULL, NULL)";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function addServiceRequestAddress($addressid)
    {
        global $connection;

        $qry = "SELECT *FROM useraddress WHERE AddressId = $addressid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            $servicerequestid = $_SESSION["servicerequestid"];
            $AddressLine1 = $row["AddressLine1"];
            $AddressLine2 = $row["AddressLine2"];
            $city = $row["City"];
            $state = $row["State"];
            $postalcode = $row["PostalCode"];
            $mobile = $row["Mobile"];

            // echo $AddressLine1;
            // echo $city;
            $qry1 = "INSERT INTO servicerequestaddress (`Id`, `ServiceRequestId`, `AddressLine1`, `AddressLine2`, `City`, `State`, `PostalCode`, 
                                    `Mobile`, `Email`, `Type`)
                         VALUES (NULL, $servicerequestid, '$AddressLine1','$AddressLine2', '$city', '$state', '$postalcode', '$mobile', NULL, 1)";
            $result1 = mysqli_query($connection, $qry1);
            if (!$result1) {
                die("Query Failed" . mysqli_error($connection));
            }
        }
    }

    function fetchtargetServiceProvider($userid)
    {
        global $connection;

        $targetuserid = [];
        $qry = "SELECT TargetUserId  FROM favoriteandblocked WHERE UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($targetuserid, $row["TargetUserId"]);
            }
        }
        return $targetuserid;
    }

    function fetchServiceProviderName($id)
    {
        global $connection;

        $qry = "SELECT FirstName,LastName FROM user where UserId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            $fname = $row["FirstName"];
            $lname = $row["LastName"];
            $name = "$fname " . "$lname";
            return $name;
        }
    }

    function fetchserviceprovideremail($zipcode)
    {
        global $connection;

        $serviceprovideremail = [];
        $qry = "SELECT Email FROM user where ZipCode = $zipcode AND IsRegisteredUser = 0";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($serviceprovideremail, $row["Email"]);
                echo $row["Email"];
            }
        }
        return $serviceprovideremail;
    }

    function getcurrentservicerequest($userid, $offset, $limit)
    {
        global $connection;

        $date = date("Y/m/d h:i:s");
        // $date = strtotime($date);
        // echo $date."<br>"; 
        $qry = "SELECT *FROM servicerequest WHERE UserId = $userid AND ServiceStartDate >= '$date' AND `Status` = 0 LIMIT $offset, $limit";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function getuserdetails($userid)
    {
        global $connection;

        $qry = "SELECT *FROM user where UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    function updatedatetimeservice($id, $datetime)
    {
        global $connection;

        $qry = "UPDATE servicerequest SET ServiceStartDate = '$datetime' WHERE ServiceRequestId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function getEmailOfServiceProvider($id){
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE ServiceRequestId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }else{
            return $result;
        }
    }

    function getdatetimeservice($id)
    {
        global $connection;

        $qry = "SELECT ServiceStartDate FROM servicerequest WHERE ServiceRequestId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            return $row["ServiceStartDate"];
        }
    }

    function checkserviceavailable($datetime)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE ServiceStartDate = '$datetime'";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function deleteservice($serviceid, $comment)
    {
        global $connection;

        $qry = "UPDATE servicerequest SET Comments = '$comment', `Status` = 2 WHERE ServiceRequestId = $serviceid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function fullservicerequestdetails($servicerequestid)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequest R INNER JOIN servicerequestaddress A ON R.ServiceRequestId=A.ServiceRequestId 
                WHERE R.ServiceRequestId = $servicerequestid;";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function getextraservicedeatils($servicerequestid)
    {
        global $connection;

        $qry = "SELECT *FROM  servicerequestextra WHERE ServiceRequestId = $servicerequestid;";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function getservicerequestCustomerName($id)
    {
        global $connection;

        $qry = "SELECT FirstName,LastName FROM  user WHERE UserId = $id;";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);

            return $row["FirstName"] . " " . $row["LastName"];
        }
    }

    function servicehistorydetails($userid, $offset, $limit)
    {

        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE UserId = $userid AND (`Status` = 1 OR `Status` = 2) LIMIT $offset,$limit";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function gettotalentriesdashboard($userid)
    {
        global $connection;
        $date = date("Y/m/d h:i:s");

        $qry = "SELECT *FROM servicerequest WHERE UserId = $userid AND ServiceStartDate >= '$date' AND `Status` = 0";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $total = mysqli_num_rows($result);
            return $total;
        }
    }

    function gettotalentriesservicehistory($userid)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE UserId = $userid AND (`Status` = 1 OR `Status` = 2)";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $total = mysqli_num_rows($result);
            return $total;
        }
    }

    function getallservicehistory($userid)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE UserId = $userid AND (`Status` = 1 OR `Status` = 2)";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function insertrating($rating)
    {

        global $connection;

        $serviceid = $rating["serviceid"];
        $userid = $rating["userid"];
        $serviceproviderid = $rating["serviceproviderid"];
        $feedback = $rating["feedback"];
        $timeArrivalRating = $rating["timeArrivalRating"];
        $friendlyRating = $rating["frindlyRating"];
        $qualityRating = $rating["qualityRating"];
        $date = date("Y/m/d H:i:s");
        $rating = $rating["rating"];

        $qry = "INSERT INTO `rating` (`RatingId`, `ServiceRequestId`, `RatingFrom`, `RatingTo`, `Ratings`, `Comments`,
         `RatingDate`, `IsApproved`, `VisibleOnHomeScreen`, `OnTimeArrival`, `Friendly`, `QualityOfService`) 
        VALUES (NULL, $serviceid, $userid, $serviceproviderid, '$rating', '$feedback', '$date', '1', '0', '$timeArrivalRating', '$friendlyRating',
             '$qualityRating');";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function checkratingalreadydone($serviceRequestid)
    {
        global $connection;

        $qry = "SELECT *FROM rating WHERE ServiceRequestId = $serviceRequestid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            if (mysqli_num_rows($result) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    function updaterating($rating)
    {

        global $connection;

        $serviceid = $rating["serviceid"];
        $feedback = $rating["feedback"];
        $timeArrivalRating = $rating["timeArrivalRating"];
        $friendlyRating = $rating["frindlyRating"];
        $qualityRating = $rating["qualityRating"];
        $rating = $rating["rating"];

        $qry = "UPDATE rating  SET Ratings = '$rating',Comments = '$feedback',OnTimeArrival = '$timeArrivalRating', 
                Friendly = '$friendlyRating',QualityOfService = '$qualityRating' WHERE ServiceRequestId = $serviceid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function getAverageRating($servicerequestId)
    {
        global $connection;

        $qry = "SELECT Ratings FROM rating WHERE ServiceRequestId = $servicerequestId";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        }
    }

    function updateuserdetails($user)
    {
        $fname = $user["fname"];
        $lname = $user["lname"];
        $email = $user["Email"];
        $mobile = $user["Phoneno"];
        $langauge = $user["language"];
        $birthdate = $user["Birthdate"];
        $userid = $user["userid"];

        global $connection;

        $qry = "UPDATE user SET FirstName = '$fname',LastName = '$lname',Email = '$email', Mobile = $mobile,
                DateOfBirth = '$birthdate',LanguageId = $langauge WHERE UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function fetchAddressModal($id)
    {
        global $connection;

        $qry = "SELECT *FROM useraddress WHERE AddressId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function updateAddress($address)
    {
        $streetname = $address["StreetName"];
        $houseno = $address["HouseNo"];
        $postalcode =  $address["PostalCode"];
        $city = $address["City"];
        $mobile = $address["Mobile"];
        $id =  $address["addressId"];

        global $connection;

        $qry = "UPDATE useraddress SET AddressLine2 = '$streetname',AddressLine1 = $houseno, PostalCode = $postalcode,
                	City = '$city', Mobile = $mobile WHERE AddressId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function deleteaddress($addressid)
    {
        global $connection;

        $qry = "DELETE FROM useraddress WHERE AddressId = $addressid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function getAllRatingOfProvider($id){
        global $connection;

        $qry = "SELECT *FROM rating WHERE RatingTo = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }else{
            return $result;
        }
    }
}
