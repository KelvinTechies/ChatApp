<?php

// if (isset($_POST['send'])) {
//    extract($_POST);
// print_r($_POST);
require 'configuration.php';

    if (isset($_SESSION['id'])) {
   extract($_POST);
        $time=date('H:i');
         if (!empty($input_Field)) {
            $s=mysqli_query($connect, "INSERT INTO `messages`(`Outgoing_Msg_Id`, `Incoming_Msg_Id`, `Message`) VALUES ('$outGoingId','$incommingId','$input_Field')");
            // print_r($s);
         }
      
    } else {
      header('location:teamchatpete/auth-login.php');
    }
    


?>