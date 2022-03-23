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
        $usertype = $user['isUser'];
        $isActive = $user['isActive'];

        $date = date("Y/m/d H:i:s");

        $qry = "INSERT INTO `user` (`UserId`, `FirstName`, `LastName`, `Email`, `Password`, `Mobile`, `UserTypeId`, 
                `Gender`, `DateOfBirth`, `UserProfilePicture`, `IsRegisteredUser`, `PaymentGatewayUserRef`, `ZipCode`, `WorksWithPets`,
                `LanguageId`, `NationalityId`, `CreatedDate`, `ModifiedDate`, `ModifiedBy`, `IsApproved`, `IsActive`, 
                `IsDeleted`, `Status`, `IsOnline`, `BankTokenId`, `TaxNo`)
                 VALUES (NULL, '$fname', '$lname', '$email', '$password', '$phone_no', '$usertype', NULL, NULL, 'avatar-ship.png', 
                 '0', NULL, NULL, '0', NULL, '1', '$date', '', '', '0', $isActive, '0', NULL, '0', NULL, NULL);";

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
                WHERE user.UserTypeId=0 AND useraddress.PostalCode = $postalcode";
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
        $createddate = date("Y/m/d H:i:s");
        $modifieddate = $createddate;
        $pets = $servicerequest["pets"];
        $charge_per_hr = $servicerequest["charge_per_hr"];
        $totalextrahr = $servicerequest["totalextrahr"];
        $comments = $servicerequest["comments"];
        $providerId = $servicerequest["ServiceProviderId"];
        echo $providerId;

        if ($providerId == 0) {
            $qry = "INSERT INTO servicerequest (`ServiceRequestId`, `UserId`, `ServiceId`, `ServiceStartDate`, `ZipCode`, `ServiceFrequency`,
                 `ServiceHourlyRate`, `ServiceHours`, `ExtraHours`, `SubTotal`, `Discount`, `TotalCost`, `Comments`, `PaymentTransactionRefNo`,
                  `PaymentDue`, `JobStatus`, `ServiceProviderId`, `SPAcceptedDate`, `HasPets`, `Status`, `CreatedDate`, `ModifiedDate`,
                   `ModifiedBy`, `RefundedAmount`, `Distance`, `HasIssue`, `PaymentDone`, `RecordVersion`)
                    VALUES (NULL, $userid, $serviceid, '$service_start_date', $zipcode, NULL, $charge_per_hr, $service_hr, $totalextrahr,
                     $subtotal, NULL, $totalcost, '$comments', NULL, '0', NULL, NULL, NULL, $pets, 0, '$createddate', '$modifieddate', 
                     NULL, NULL, 0, NULL, NULL, NULL);";
        } else {
            $qry = "INSERT INTO servicerequest (`ServiceRequestId`, `UserId`, `ServiceId`, `ServiceStartDate`, `ZipCode`, `ServiceFrequency`,
                 `ServiceHourlyRate`, `ServiceHours`, `ExtraHours`, `SubTotal`, `Discount`, `TotalCost`, `Comments`, `PaymentTransactionRefNo`,
                  `PaymentDue`, `JobStatus`, `ServiceProviderId`, `SPAcceptedDate`, `HasPets`, `Status`, `CreatedDate`, `ModifiedDate`,
                   `ModifiedBy`, `RefundedAmount`, `Distance`, `HasIssue`, `PaymentDone`, `RecordVersion`)
                    VALUES (NULL, $userid, $serviceid, '$service_start_date', $zipcode, NULL, $charge_per_hr, $service_hr, $totalextrahr,
                     $subtotal, NULL, $totalcost, '$comments', NULL, '0', NULL, $providerId, '$createddate', $pets, 0, '$createddate', '$modifieddate', 
                     NULL, NULL, 0, NULL, NULL, NULL);";
        }


        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            echo "Query Successfully Run";
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

    function fetchuseraddress_booknow($zipcode)
    {
        global $connection;
        $userid = $_SESSION["userid"];

        $qry = "SELECT *FROM useraddress WHERE UserId = $userid AND PostalCode = '$zipcode'";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
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

        $blockuserid = [];
        $qry = "SELECT TargetUserId  FROM favoriteandblocked WHERE UserId = $userid AND IsBlocked = 1";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($blockuserid, $row["TargetUserId"]);
            }
        }

        $qry1 = "SELECT UserId  FROM favoriteandblocked WHERE TargetUserId = $userid AND IsBlocked = 1";
        $result1 = mysqli_query($connection, $qry1);
        if (!$result1) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result1)) {
                array_push($blockuserid, $row["UserId"]);
            }
        }
        // return $blockuserid;

        $allproviderid = [];
        $qry1 = "SELECT UserId  FROM favoriteandblocked WHERE TargetUserId = $userid";
        $result1 = mysqli_query($connection, $qry1);
        if (!$result1) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result1)) {
                array_push($allproviderid, $row["UserId"]);
            }
        }

        $validserviceprovider = array_diff($allproviderid, $blockuserid);
        return $validserviceprovider;
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
        $qry = "SELECT Email FROM user where ZipCode = $zipcode AND UserTypeId = 0";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($serviceprovideremail, $row["Email"]);
                // echo $row["Email"];
            }
        }
        return $serviceprovideremail;
    }

    function fetchblockedEmail($zipcode, $userid)
    {
        global $connection;

        $providerblockemail = [];
        $qry = "SELECT Email FROM user U LEFT JOIN favoriteandblocked F ON U.UserId = F.UserId 
                 where U.ZipCode = $zipcode AND U.UserTypeId = 0 AND F.IsBlocked = 1 AND F.UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($providerblockemail, $row["Email"]);
                // echo $row["Email"];
            }
        }

        $qry1 = "SELECT Email FROM user U LEFT JOIN favoriteandblocked F ON U.UserId = F.TargetUserId 
                 where U.ZipCode = $zipcode AND U.UserTypeId = 0 AND F.IsBlocked = 1 AND F.UserId = $userid";
        $result1 = mysqli_query($connection, $qry1);
        if (!$result1) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result1)) {
                array_push($providerblockemail, $row["Email"]);
                // echo $row["Email"];
            }
        }
        return $providerblockemail;
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

    function getEmailOfServiceProvider($id)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE ServiceRequestId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
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
        $userid = $_SESSION["userid"];

        // $qry = "SELECT *FROM servicerequest WHERE ServiceStartDate = '$datetime'";
        $qry = "SELECT *FROM servicerequest WHERE UserId = $userid AND `Status` = 0";
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
        $date = date("Y/m/d h:i:s");

        // $qry = "SELECT *FROM servicerequest WHERE UserId = $userid AND (`Status` = 1 OR `Status` = 2) 
        //            AND ServiceStartDate < '$date' LIMIT $offset,$limit";

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
        $date = date("Y/m/d h:i:s");

        // $qry = "SELECT *FROM servicerequest WHERE UserId = $userid AND (`Status` = 1 OR `Status` = 2) AND ServiceStartDate < '$date'";
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

    function getAllRatingOfProvider($id)
    {
        global $connection;

        $qry = "SELECT *FROM rating WHERE RatingTo = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function updateServiceProviderDetails($provider)
    {

        $fname =  $provider["fname"];
        $lname = $provider["lname"];
        $email = $provider["email"];
        $mobile = $provider["phoneno"];
        $birthdate = $provider["birthdate"];
        $nationality = $provider["nationality"];
        $gender = $provider["gender"];
        $avatar_name =  $provider["avatar_name"];
        $streetName = $provider["streetname"];
        $houseNo = $provider["houseno"];
        $postalCode = $provider["postalcode"];
        $city = $provider["city"];
        $userid = $provider["userid"];

        global $connection;

        $qry = "UPDATE user SET FirstName = '$fname',LastName = '$lname',Email = '$email',Mobile = $mobile,ZipCode = '$postalCode',
                DateOfBirth = '$birthdate',UserProfilePicture = '$avatar_name',Gender = $gender,NationalityId = $nationality
                 WHERE UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function IsInsertedAddress_SP($provider)
    {
        $userid = $provider["userid"];

        global $connection;

        $qry = "SELECT *FROM useraddress WHERE UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $no = mysqli_num_rows($result);
            return $no;
        }
    }

    function updateAddress_sp($provider)
    {
        $streetname = $provider["streetname"];
        $houseno =  $provider["houseno"];
        $postalcode = $provider["postalcode"];
        $city = $provider["city"];
        $phoneno = $provider["phoneno"];
        $userid = $_SESSION["userid"];

        global $connection;

        $qry = "UPDATE useraddress SET AddressLine1 = $houseno,AddressLine2 = '$streetname',PostalCode = $postalcode,
                City = '$city',Mobile = $phoneno WHERE UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function getAddress_SP($userid)
    {
        global $connection;

        $qry = "SELECT *FROM useraddress WHERE UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    function getAddress_SD($servicerequestid)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequestaddress WHERE ServiceRequestId  = $servicerequestid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    function getnewservicerequest_sp($pincode, $pets, $offset, $limit)
    {
        global $connection;

        $date = date("Y/m/d h:i:s");
        echo $pets;

        if ($pets == 0) {
            $qry = "SELECT *FROM servicerequest WHERE ZipCode = '$pincode' AND ServiceStartDate >= '$date' 
                     AND ServiceProviderId IS NULL  AND `Status` = 0 LIMIT $offset,$limit";
        } else {
            $qry = "SELECT *FROM servicerequest WHERE ZipCode = '$pincode' AND ServiceStartDate >= '$date'
                    AND ServiceProviderId IS NULL  AND `Status` = 0 AND HasPets = $pets LIMIT $offset,$limit";
        }

        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function getServiceRequests_SP_details($id)
    {
        global $connection;
        $qry = "SELECT *FROM servicerequest WHERE ServiceRequestId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    function getnewservicerequestTotalEntries_sp($pincode, $pets)
    {
        global $connection;

        $date = date("Y/m/d h:i:s");

        if ($pets == 0) {
            $qry = "SELECT *FROM servicerequest WHERE ZipCode = $pincode AND ServiceStartDate >= '$date' 
                    AND ServiceProviderId IS NULL AND `Status` = 0";
        } else {
            $qry = "SELECT *FROM servicerequest WHERE ZipCode = $pincode AND ServiceStartDate >= '$date' 
                    AND ServiceProviderId IS NULL AND `Status` = 0 AND HasPets = $pets";
        }

        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return mysqli_num_rows($result);
        }
    }

    function setServiceProviderId($serviceid, $userid)
    {
        global $connection;

        $date = date("Y/m/d h:i:s");

        $qry = "UPDATE servicerequest SET ServiceProviderId = $userid,SPAcceptedDate = '$date' WHERE ServiceRequestId = $serviceid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function getUpcomingService_Sp($userid, $offset, $limit)
    {
        global $connection;

        // $date = date("Y/m/d h:i:s");

        $qry = "SELECT *FROM servicerequest WHERE ServiceProviderId = $userid AND `Status` = 0 LIMIT $offset,$limit";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function getUpcomingServiceDetails($servicerequestId)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE ServiceRequestId = $servicerequestId";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    function cancelServiceRequest_SP($serviceRequestId)
    {
        global $connection;

        $qry = "UPDATE servicerequest SET ServiceProviderId = NULL,SPAcceptedDate = NULL WHERE ServiceRequestId = $serviceRequestId";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function completeServiceRequest_SP($serviceRequestId)
    {
        global $connection;

        $qry = "UPDATE servicerequest SET `Status` = 1 WHERE ServiceRequestId = $serviceRequestId";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function gettotalentries_us($userid)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE ServiceProviderId = $userid AND `Status` = 0";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return mysqli_num_rows($result);
        }
    }

    function getServiceHistory_SP($userid, $offset, $limit)
    {
        global $connection;

        // $date = date("Y/m/d h:i:s");

        $qry = "SELECT *FROM servicerequest WHERE ServiceProviderId = $userid AND `Status` = 1 LIMIT $offset,$limit";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function gettotalentriesServiceHistory_Sp($userid)
    {
        global $connection;

        // $date = date("Y/m/d h:i:s");

        $qry = "SELECT *FROM servicerequest WHERE ServiceProviderId = $userid AND `Status` = 1";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return mysqli_num_rows($result);
        }
    }

    function getServiceHistoryExport($userid)
    {
        global $connection;

        // $date = date("Y/m/d h:i:s");

        $qry = "SELECT *FROM servicerequest WHERE ServiceProviderId = $userid AND `Status` = 1";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function insertFavoriteBlock($userid, $customerId)
    {
        global $connection;

        $qry = "SELECT *FROM favoriteandblocked WHERE TargetUserId = $customerId AND UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            if (mysqli_num_rows($result) == 0) {
                $qry1 = "INSERT INTO favoriteandblocked (`Id`, `UserId`, `TargetUserId`, `IsFavorite`, `IsBlocked`) 
                            VALUES (NULL, $userid, $customerId, 1, 0);";
                $result1 = mysqli_query($connection, $qry1);
                if (!$result1) {
                    die("Query Failed" . mysqli_error($connection));
                }

                $qry2 = "INSERT INTO favoriteandblocked (`Id`, `UserId`, `TargetUserId`, `IsFavorite`, `IsBlocked`) 
                            VALUES (NULL, $customerId, $userid, 1, 0);";
                $result2 = mysqli_query($connection, $qry2);
                if (!$result2) {
                    die("Query Failed" . mysqli_error($connection));
                }
            }
        }
    }

    function FavouriteBlockedCustomerDetails($customerId, $userid)
    {
        global $connection;

        $qry = "SELECT *FROM user u INNER JOIN favoriteandblocked f ON u.UserId = f.TargetUserId WHERE f.UserId = $userid 
                    AND f.TargetUserId = $customerId";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    function blockcustomer($favblockid)
    {
        global $connection;

        $qry = "UPDATE favoriteandblocked SET IsBlocked = 1 WHERE Id = $favblockid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function favcustomer($favblockid)
    {
        global $connection;

        $qry = "UPDATE favoriteandblocked SET IsBlocked = 0 WHERE Id = $favblockid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    //Already Blocked

    // function IsAlreadyAnotherBlocked($favblockid){
    //     global $connection;

    //     $qry = "SELECT *FROM favoriteandblocked WHERE Id = $favblockid";
    //     $result = mysqli_query($connection, $qry);
    //     if (!$result) {
    //         die("Query Failed" . mysqli_error($connection));
    //     }else{
    //         $row = mysqli_fetch_assoc($result);
    //         return $row["IsBlocked"];
    //     }
    // }

    function getRatinglist_Sp($userid, $categoryName, $startRatingValue, $endRatingValue, $offset, $limit)
    {
        global $connection;

        $qry = "SELECT R.Comments,R.Ratings,R.RatingFrom,R.ServiceRequestId,S.ServiceId,S.ServiceStartDate,S.ServiceHours,S.ExtraHours,
                        U.FirstName,U.LastName FROM rating R INNER JOIN servicerequest S ON S.ServiceRequestId = R.ServiceRequestId 
                        INNER JOIN user U ON U.UserId = R.RatingFrom WHERE RatingTo = $userid AND Ratings >= $startRatingValue AND 
                        Ratings < $endRatingValue ORDER BY $categoryName LIMIT $offset,$limit";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function totalRatinglist_Sp($userid, $startRatingValue, $endRatingValue)
    {
        global $connection;

        $qry = "SELECT R.Comments,R.Ratings,R.RatingFrom,R.ServiceRequestId,S.ServiceId,S.ServiceStartDate,S.ServiceHours,S.ExtraHours,
                        U.FirstName,U.LastName FROM rating R INNER JOIN servicerequest S ON S.ServiceRequestId = R.ServiceRequestId 
                        INNER JOIN user U ON U.UserId = R.RatingFrom WHERE RatingTo = $userid AND Ratings >= $startRatingValue AND 
                        Ratings < $endRatingValue";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return  mysqli_num_rows($result);
        }
    }

    function AcceptServiceValidation($zipcode, $userid)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE ZipCode = $zipcode AND `Status` = 0 AND ServiceProviderId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function getFavBlockCustomerList($userid, $offset, $limit)
    {
        global $connection;

        $qry = "SELECT *FROM favoriteandblocked WHERE UserId = $userid LIMIT $offset,$limit";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function getFavBlockCustomerListtotal($userid)
    {
        global $connection;

        $qry = "SELECT *FROM favoriteandblocked WHERE UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return mysqli_num_rows($result);
        }
    }



    function setOrRemoveFav($favblockId)
    {
        global $connection;

        $qry = "SELECT *FROM favoriteandblocked WHERE Id = $favblockId";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    function setUnfavourite($favblockId)
    {
        global $connection;

        $qry = "UPDATE favoriteandblocked SET IsFavorite = 0 WHERE Id = $favblockId";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function setfavourite($favblockId)
    {
        global $connection;

        $qry = "UPDATE favoriteandblocked SET IsFavorite = 1 WHERE Id = $favblockId";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function totalcleaningbyProvider($userid, $serviceproviderid)
    {
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE UserId = $userid AND ServiceProviderId = $serviceproviderid AND `Status` = 1";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return mysqli_num_rows($result);
        }
    }

    function averageratingSp($userid, $serviceproviderid)
    {
        global $connection;

        $qry = "SELECT *FROM rating WHERE RatingFrom = $userid AND RatingTo = $serviceproviderid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function fetchAllServiceRequestDetails($condition,$offset,$limit)
    {
        global $connection;

        $qry = "SELECT S.Status,S.ServiceRequestId,S.ServiceId,S.ServiceStartDate,S.TotalCost,S.ServiceHours,S.ExtraHours,
                   S.ServiceProviderId,S.UserId,U.Email  FROM servicerequest S LEFT JOIN user U on S.UserId = U.UserId WHERE $condition
                    LIMIT $offset,$limit;";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function fetchTotalServiceRequestDetails($condition)
    {
        global $connection;

        $qry = "SELECT * FROM servicerequest S LEFT JOIN user U on S.UserId = U.UserId WHERE $condition;";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function fetchAllServiceRequestDetails_Option($condition)
    {
        global $connection;

        $qry = "SELECT S.Status,S.ServiceRequestId,S.ServiceId,S.ServiceStartDate,S.TotalCost,S.ServiceHours,S.ExtraHours,
                   S.ServiceProviderId,S.UserId,U.Email  FROM servicerequest S LEFT JOIN user U on S.UserId = U.UserId WHERE $condition;";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function getAllUserDetails($condition,$offset,$limit)
    {
        global $connection;

        $qry = "SELECT *FROM user WHERE $condition LIMIT $offset,$limit";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function getAllUserDetails_UM($condition)
    {
        global $connection;

        $qry = "SELECT *FROM user WHERE $condition ORDER BY FirstName";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            return $result;
        }
    }

    function updateServiceAddress($address)
    {
        $streetName = $_POST["streetName"];
        $houseNo = $_POST["houseNo"];
        $zipcode = $_POST["Zipcode"];
        $city = $_POST["City"];
        $id = $_POST["serviceid"];

        global $connection;

        $qry = "UPDATE servicerequestaddress SET AddressLine1 = '$houseNo',AddressLine2 = '$streetName',City = '$city'
                    ,PostalCode = '$zipcode' WHERE ServiceRequestId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function UpdateActiveStatus($userid, $activestatus)
    {
        global $connection;

        $qry = "UPDATE user SET IsActive = $activestatus WHERE UserId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function updateRefundedValue($id,$refundedAmount){

        global $connection;

        $qry = "UPDATE servicerequest SET RefundedAmount = $refundedAmount WHERE ServiceRequestId = $id";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function getallevents($userid){
        global $connection;

        $qry = "SELECT *FROM servicerequest WHERE ServiceProviderId = $userid";
        $result = mysqli_query($connection, $qry);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }else{
            return $result;
        }
    }
}
