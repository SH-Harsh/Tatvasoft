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
        move_uploaded_file($file_name_temp, "../assets/user_attachment/$file_name");

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
            $userid = $row["UserId"];
            echo $userid;
            if (isset($row)) {
                $_SESSION["userid"] = $userid;
                setcookie("userid", "$userid", time() + (8600 * 30), "/");
            } else {
                $_SESSION["login_error"] = "Some values are improper";
            }
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
}
