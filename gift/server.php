<?php
 session_start();
 $servername = 'localhost';
 $username = 'root';
 $password = '';
 $DB_name = 'reg_info';
 $connect = mysqli_connect($servername, $username, $password, $DB_name) or die("DB Connection Failure");

 function redirect()
 {
	if (!isset($_SESSION['email'])) {
		header('location:auth-login.html');
	 }
 }
 function token(){
  if (isset($_SESSION['username'])) {
		header('location:index.php');
	 }
 
 }
 function validate()
 {
  global $connect;
  extract($_POST);
  if (isset($reg)) {
    $plaintext_password=trim($password);
    $hash=password_hash($plaintext_password, PASSWORD_DEFAULT);
    $email_query=mysqli_query($connect, "SELECT * FROM `info` WHERE email='$email'");
    if (!empty($email) || !empty($user) || !empty($password)) {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email Address";
      }elseif (mysqli_num_rows($email_query)>0) {
        echo "Email Already Existing";
      }elseif ($password !== $password) {
        echo ('Incorrect Password');
      }else {
        $_SESSION['username']=$_POST['user'];
        $query=mysqli_query($connect, "INSERT INTO `info`(`email`, `user`, `password`) VALUES ('$email', '$user', '$hash')");
        
        if ($_SESSION) {
          header('location:index.php');
        }
        
      }
    }else {
      echo "all fileds required";
    }
  }
}
//  function login(){
//   global $connect;
  global $hash;
  extract($_POST);
  if (isset($login)) {
    if (!empty($email) && !empty($password)) {
 
        $password = trim($password);
        $query = mysqli_query($connect, "SELECT * FROM `info` WHERE email='$email'");
        if (mysqli_num_rows($query)>0) {
          $result = mysqli_fetch_assoc($query);
          if (password_verify($password, $result['password'])*1!=0) {
            echo 'redir';
            $_SESSION['email']=$email;
            
            
            // header('location:index.php');
           }else{
              echo 'Invalid password';
           }
        }else {
            echo 'Invalid Creds';
           }
       
    }else {
      echo "all fields are required";
     }
  }
// }
 $email  = @$_SESSION['email'];
 $query  = mysqli_query($connect, "SELECT * FROM info WHERE email='$email'");
 $result = mysqli_fetch_assoc($query);
 function dataProvider($value)
 {
  global $result;
	echo ' '.$result[$value];
 }

 function updateProvider($value)
 {
	global $result;
	echo $result[$value];	
 }
 function Logout()
 {
   session_destroy();
   header('location:auth-login.html');
 }

 function update()
 {
   global $connect;
    extract($_POST);

    if (isset($reg)) {
      if (!empty($email) && !empty($user)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "Invalid Email Address";
        }else{$se_user = $_SESSION['email'];
          $update= mysqli_query($connect, "UPDATE `info` SET `email`='$email', `user`='$user' WHERE email = '$se_user'");
          if ($update) {
            echo 'Updated Successfully';
            $_SESSION['email']=$email;
          }else {
            echo 'DB Connection Err';
          }
        }
       
       }else {
        echo "all fields are required";
      }
    }
 }
?>