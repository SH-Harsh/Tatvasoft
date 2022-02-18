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
                     $subtotal, NULL, $totalcost, '$comments', NULL, '0', NULL, NULL, NULL, $pets, NULL, '$createddate', '$modifieddate', 
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
}
