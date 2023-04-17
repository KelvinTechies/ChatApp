<?php
session_start();

$connect  = mysqli_connect("localhost", "root", "", "reg_info");

if (!$connect) {
    die('connection to database failed');
}

$text =' WIM'. bin2hex(random_bytes('32')). 'IT2022';

$num = '5';

$status='Active';

extract ($_POST);
    
    global $connect;
// $error=[];


    if (isset($reg)) {

        if (empty($username) || empty($email) || empty($fone) || empty($pwd) || empty($re_pwd)) {

        // header("location:auth-register.php?error=allfieldsarerequired");
        echo 'All fileds are required';
            

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // header("location:auth-register.php?error=invalidemail");
        echo'Invalid email';
           

        }elseif (!preg_match("/^[0-9 ]*$/", $fone)) {

            // header("location:auth-register.php?error=invalidphonenumber");
            echo'Invalid Phone number';

           
        // }else if (str_word_count($pwd < 5) ) {

            // header("location:auth-register.php?error=passwordistooshort");
            
        }elseif ($pwd !==$re_pwd) {

            // header("location:auth-register.php?error=passwordmixmatch");
            echo 'Password mixmatched';
            
        }else {

            $sql = "SELECT * FROM `info` WHERE user = ? || email = ?";

            $stmt  = mysqli_stmt_init($connect);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

            // header("location:auth-register.php?error=sqlerror");
            echo 'sql error';
                

            } else {

                mysqli_stmt_bind_param($stmt, 'ss', $username, $email);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_store_result($stmt);
                
                $result = mysqli_stmt_num_rows($stmt);

            if ($result > 0) {

                //  header("location:auth-register.php?error=emailalreadyexists");
                //  header("location:auth-register.php?error=Useralreadyexists");
                echo 'Username already exists';
                        
                    }else {
                        
                        $sql = "INSERT INTO `info`(`email`, `user`, `password`, `Phone no` `Status`) VALUES (?,?,?,?,?)";

                        $stmt = mysqli_stmt_init($connect);

             if (!mysqli_stmt_prepare($stmt, $sql)){

                //   header("location:auth-register.php?error=sqlerror");
                echo 'sql error';
                            

             } else {
                
                $hswpwd = password_hash($pwd, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, 'sssss', $email, $username, $hswpwd, $fone, $status);

                mysqli_stmt_execute($stmt);

                    // $que= "SELECT * FROM `info` WHERE user=?";
                    // $query=mysqli_init($connect);
                    //     if (!mysqli_stmt_prepare($query, $que)) {
                    //         echo 'sql error';
                            
                    //     }else {
                    //         mysqli_stmt_bind_param($query, 's', $username);
                    //         mysqli_stmt_execute($query);
                    //         $result=mysqli_stmt_get_result($query);
                    // //     }
                    //    if (mysqli_stmt_num_rows($result)>0) {
                    //       while ($row=mysqli_fetch_assoc($result)) {

                    //           $user_id=$row['id'];
                    //             $num='1';
                    //    $res= "INSERT INTO `info_profile`(`user_id`, `user_status`) VALUES (?, ?)";
                    //    $sql=mysqli_init($connect);
                    //    if (!mysqli_stmt_prepare($sql, $res)) {
                    //     echo 'chweck your query bwoy';
                          
                           
                    //    }else {
                    //        mysqli_stmt_bind_param($sql, 'ss', $user_id, $num);
                    //        mysqli_stmt_execute($sql);
                    //          echo 'success';
                              
                    //       }
                //        }else {
                //            echo 'chweck your query bwoy';
                }
                // header('location:index.php?success=youareloggedin');
                echo 'success';
                // }
                        // }
                    // }
                } 
                
            } 
            }
            

        }

        
    //   mysqli_stmt_close($stmt);
    //   mysqli_close($connect);
      
    


if (isset($signin)) {
    extract($_POST);

    global $connect;

    if (empty($Username) || empty($pwd)) {

    //    header('Location:auth-login.php?allfieldsarerequired');
    echo 'All fileds are required';

    } else {
        $sql = "SELECT * FROM `info` WHERE user = ?";

        $stmt = mysqli_stmt_init($connect);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

    //    header('Location:auth-login.php?checkyourquery');
    echo 'Check yopur query';
           
        } else {
           mysqli_stmt_bind_param($stmt, 's', $Username);

           mysqli_stmt_execute($stmt);

           $result = mysqli_stmt_get_result($stmt);

           if ($row = mysqli_fetch_assoc($result)) {

               $pwdchk = password_verify($pwd, $row['password']);

               if ($pwdchk == false) {

                //  header('Location:auth-login.php?Wrongpassword');
                 echo "Wrong Password";
                
               }elseif ($pwd == true) {

                //    session_start();

                   $_SESSION['user'] = $row['user'];
                   $_SESSION['id'] = $row['id'];
                   $status='Active';
                   $sqlite=mysqli_query($connect, "UPDATE `info` SET `id`='{$_SESSION['id']}', `Status`='$status' WHERE id='{$_SESSION['id']}'");

                   if (isset($_SESSION['id'])) {
                //    header('Location:index.php');
                echo 'success';
                    
                }
                    //  $que=mysqli_query($connect, "SELECT * FROM `info` WHERE user=$Username");

                    //    if (mysqli_num_rows($que)>0) {
                    //       while ($row=mysqli_fetch_assoc($que)) {

                    //           $user_id=$row['id'];

                    //    $res= "INSERT INTO `info_profile`(`user_id`, `user_status`) VALUES ('[value-1]', 1)";
                    //           mysqli_query($connect, $res);
                    //          echo 'success';
                              
                    //       }
                    //    }else {
                    //        echo 'chweck your query bwoy';
                       }
                // elseif(isset($_SESSION['user'])) {
                // echo 'Success';
                // // header('Location:index.php');
                   
                // }
                // else {
                //     header('Location:auth-login.php');
                    
                // }

            //    }

           } else {

            //  header('Location:teamChatpete/auth-login.php?Userdoesnotexists');
            echo 'User does not exists';    
               
           }
           
           
        }
        
    }
    

} 

if (isset($_GET['profile'])) {
   global $connect;
   $prof=$_GET['profile'];

   $sqlId="SELECT * FROM `info` WHERE id=$prof";
   $queryId=mysqli_query($connect, $sqlId);

}
function Redirect()
{
    if (!isset($_SESSION['id'])) {

        header('location:auth-login.php');
        // echo "<script>'window.location=auth-login.php';</script>";
        
    }
}



    function signout(){
    global $connect;
        
if (isset($_SESSION['id'])) {
    $newHid=$_SESSION['id'];
    $status='Offline';
        if (isset($_POST['logout'])) {
           $logOut=$_POST['logout'];
           $sqlite=mysqli_query($connect, "UPDATE `info` SET `id`='$newHid', `Status`='$status' WHERE id='$newHid'");
           if ($sqlite) {
               session_unset();        
               session_destroy();
           header('location:auth-login.php');
               
           }else {
               echo'df';
           }
        }

    }
}

function profile($details)
{
    global $connect;
    
    if (isset($_SESSION['id'])) {

        $id=$_SESSION['id'];
        
        $query=mysqli_query($connect, "SELECT * FROM `info` WHERE id=$id");

        if (mysqli_num_rows($query)>0) {

            $row =mysqli_fetch_assoc($query);

            echo $row[$details];
        }
    }
}


function upload()
{
    if (isset($_POST['upload'])){

        $file=$_FILES['file'];
        $name=$file['name'];
        $temp_name=$file['tmp_name'];
        $error=$file['error'];
        $size=$file['size'];
        // print_r($_FILES);

        $fileExt=explode('.', $name);

        $actualFileExt=strtolower(end($fileExt));

        $isAllowed=['png', 'jpg', 'jpeg', 'pdf'];

        if (in_array($actualFileExt, $isAllowed)) {

            if ($error==0) {
                
                if ($size < 500000) {
                   $newFileName=uniqid('', true). '.' . $actualFileExt;
                   $destination='../Uploads/'.'.' . $newFileName;
                   move_uploaded_file($temp_name, $destination);
                //    header('Location:index.php?success=upload');
                //    "window.location='index.php?success=upload'";
                echo' Uploaded successfully';
                } else {
                    echo 'Your file size is too big';
                }
                
            } else {
                echo 'There was an error uploading your file';
            }
            

        }else {
            echo 'File type is not suppoted';
        }
        
    }
}



function proPic()
{
    if (isset($_SESSION['id'])) {

        global $connect;

        $id=$_SESSION['id'];
    $sql= "SELECT * FROM `info`";

    $query=mysqli_query($connect, $sql);

   if (mysqli_num_rows($query)>0) {

   while ($row= mysqli_fetch_assoc($query)) {

       $rowId= $row['id'];

       $sq="SELECT * FROM `info_profile` WHERE id=$rowId";
       $que=mysqli_query($connect, $sq);

       while ($result = mysqli_fetch_assoc($que)) {
           echo "<div class='rounded-circle avatar-lg img-thumbnail'";

           if ($result['user_status'] == 0) {
            echo "<img src='../Uploads/profile'.$id.'.jpg'>";
              
           }else {
               echo '<img src=../Uploads/apple logo.png>';
           }


           echo"</div>";
       }
   }
} 
   
}

}

// function ProDetails()
// {
//     global $connect;

//     if (isset($_POST['reg'])) {
//         # code...
//     }
// }
// if (isset($reg)) {
// extract($_POST);
    
//         $que=mysqli_query($connect, "SELECT * FROM `info` WHERE user='$Username'");

//                        if (mysqli_num_rows($que)>0) {
//                           while ($row=mysqli_fetch_assoc($que)) {

//                               $user_id=$row['id'];

//                        $res= "INSERT INTO `info_profile`(`user_id`, `user_status`) VALUES ('[value-1]', 1)";
//                               mysqli_query($connect, $res);
//                              echo 'success';
                              
//                           }
//                        }else {
//                            echo 'chweck your query bwoy';
//                 }
// }


function User($pa)
{
    global $connect;
   if (isset($_GET['Uid'])) {
      $user=$_GET['Uid'];
    $sql = "SELECT * FROM `info` WHERE id='{$user}'";
    $que=mysqli_query($connect, $sql);
        $result=mysqli_fetch_assoc($que);
    return $result[$pa];
   }
}




function getUser($part)
{
   global $connect;
   
   if (isset($_GET['Uid'])) {
      
    $id=$_GET['Uid'];

   $sql="SELECT * FROM `info` WHERE id={$id}";

   $que=mysqli_query($connect, $sql);

   if (mysqli_num_rows($que)>0) {
      if ($row=mysqli_fetch_assoc($que)) {
         
        return $row[$part];
      }
   }
   }
}

 function newUpload()
{
  global $connect;
    if (isset($_POST['upload'])) {
        // print_r($_FILES);
        extract($_POST);
        // print_r($_POST);
        if (empty($username) || empty($email)) {
           echo('
           <p class="alert alert-danger"> All fields are required!</p>');
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            
        echo('>
        <p class="alert alert-danger">  Email is not Correct!</p>');
    
        }else {
      
        $profileId=$_SESSION['id'];
        $file=$_FILES['file'];
        $filename=$file['name'];
        $filetype=$file['type'];
        $filetmp_name=$file['tmp_name'];
        $fileerror=$file['error'];
        $filesize=$file['size'];
    
    
        $allowed=['png', 'jpg', 'jpeg',];
    
    
        $FileExt=explode('.', $filename);
        
        $actualFileExt=strtolower(end($FileExt));
    
        if (in_array($actualFileExt, $allowed)) {
            if ($fileerror==0) {
               if ($filesize <  500000) {
                  $fileNewName=uniqid('', true).'.'.$actualFileExt;
                  $FinalDestination='profileUploads/'.$fileNewName;
                move_uploaded_file($filetmp_name, $FinalDestination);
                $sql=mysqli_query($connect, "UPDATE `info_profile` SET `user_id`='$profileId',`User_Img`='$fileNewName' WHERE user_id='$profileId'");
                if ($sql) {
                    $update=mysqli_query($connect, "UPDATE `info` SET `email`='$email',`user`='$username' WHERE id='$profileId'");
                    if ($update) {
                        echo('<p class="alert alert-success d-flex align-items-center" role="alert">
                          Updated Succesfully
                      </p>');
                    } else {
                       echo('error');
                    }
                    
                }else {
                    echo('hmm');
                }
    
               } else {
                   echo('File size is too big');
               }
               
            } else {
              echo('There was an error uploading Your file');
            }
            
        }else {
            echo('File Type not Supported');
        }
        // print_r($profileId);
        }
}
}

function Contacts()
{
    global $connect;
    $outGoingId=$_SESSION['id'];

    $sql=mysqli_query($connect, "SELECT * FROM `info` WHERE NOT id={$outGoingId}");
    $outPut="";
    
    if (mysqli_num_rows($sql) <=0) {
        $outPut .='You have no friends to Chat With';
        
    }elseif (mysqli_num_rows($sql)>0) {
        // require '../data.php';

        while ($row = mysqli_fetch_assoc($sql)) {
      
        echo '
        
        <li>
        <div class="d-flex list align-items-center">
        <div class="flex-grow-1">
        <a href="index.php?Uid='.$row['id'].'"><h5 class="font-size-14 m-0">'.$row['user'].'</h5>
        </div>
        <div class="dropdown">
            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ri-more-2-fill"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="#">Share <i class="ri-share-line float-end text-muted"></i></a>
                <a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-end text-muted"></i></a>
                <a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-end text-muted"></i></a>
            </div>
            </div>
            </a>
            </div>
            </li>
        ';
        }
    }
        // echo $outPut;
    
    
}


function loggedPic($p)
{
    global $connect;
   
    if (isset($_SESSION['id'])) {
       
     $id=$_SESSION['id'];
 
    $sql="SELECT * FROM `info_profile` WHERE user_id={$id}";
 
    $que=mysqli_query($connect, $sql);
 
    if (mysqli_num_rows($que)>0) {
       if ($row=mysqli_fetch_assoc($que)) {
          
         return $row[$p];
       }
    }
    }
// $res=mysqli_query($connect, $Qu);

// if (mysqli_num_rows($res)>0) {
//   $row=mysqli_fetch_assoc($res);
//       echo $row[$p];
// }

}

function getPic($t)
{
    global $connect;
   
    if (isset($_GET['Uid'])) {
        $id=$_GET['Uid'];
 
    $sql="SELECT * FROM `info_profile` WHERE user_id={$id}";
 
    $que=mysqli_query($connect, $sql);
 
    if (mysqli_num_rows($que)>0) {
       if ($row=mysqli_fetch_assoc($que)) {
          
         return $row[$t];
       }
    }
}
}

function Recent()
{
    global $connect;
    $outGoingId=$_SESSION['id'];

    $sql=mysqli_query($connect, "SELECT * FROM `info` WHERE NOT id={$outGoingId}");
    $outPut="";
    
    if (mysqli_num_rows($sql) <=0) {
        $outPut .='You have no friends to Chat With';
        
    }elseif (mysqli_num_rows($sql)>0) {
        require '../data.php';
        }
    
        echo $outPut;
    
//    $sql="SELECT * FROM `info` ";

//    require '../data.php';

//    $query=mysqli_query($connect, $sql);

//    if (mysqli_num_rows($query)) {
//        # code...
//    }

// while ($row=mysqli_fetch_assoc($query)) {
//    $result=$row['user'];
//    echo'
//    <li>
//     <a href="#">
//         <div class="d-flex">                            
//             <div class="chat-user-img online align-self-center me-3 ms-0">
//                 <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
//                 <span class="user-status"></span>
//             </div>

//             <div class="flex-grow-1 overflow-hidden">
//             <a href="index.php?Uid='.$row['id'].'"><h5 class="font-size-14 m-0">'.$row['user'].'</h5>
//                 <p class="chat-user-message text-truncate mb-0">'.$msg.'</p>
//             </div>
//             <div class="font-size-11">05 min</div>
//         </div>
//     </a>
// </li>
//    ';
// }
}
?>