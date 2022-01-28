<?php include "../view/db.php"; ?>

<?php
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
    }

}

?>