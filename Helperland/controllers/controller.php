<?php include "../models/model.php" ?>

<?php 
   
   if(isset($_POST['contact_submit'])){
     
        $contact['first_name'] = $_POST['first_name']; 
        $contact['last_name'] = $_POST['last_name']; 
        $contact['phone_no'] = $_POST['phone_no']; 
        $contact['email'] = $_POST['email']; 
        $contact['subject'] = $_POST['subject']; 
        $contact['message'] = $_POST['message'];
        $contact['file_name'] = $_FILES['attachment']['name'];
        $contact['file_name_temp'] = $_FILES['attachment']['tmp_name'];
        
        contact_insert($contact);

      //   echo "<script>alert('Contact you asap')</script>";
        header("Location: ../view/Contact.php");
        
   }
?>