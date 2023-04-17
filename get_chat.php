<?php
   require './configuration.php';

if (isset($_SESSION['id'])) {
    $incommingId=mysqli_real_escape_string($connect, $_POST['incommingId']);
    $outGoingId=mysqli_real_escape_string($connect, $_POST['outGoingId']);
$time=date('H:i');
    $output="";
//     if (isset($_GET['Uid'])) {
//        $outUser=$_GET['Uid'];
//       print_r($outUser);
       
//        $s=mysqli_query($connect, " SELECT * FROM `info_profile` WHERE user_id='$outUser'");
// // print_r($sq);
// if (mysqli_num_rows($s)>0) {
//    while ($ro=mysqli_fetch_assoc($sq)) {
//       $userP=$ro['User_Img'];
//       print_r($outUser);
//    }
// }
//     }
$LoggedUser=$_SESSION['id'];
$sq=mysqli_query($connect, " SELECT * FROM `info_profile` WHERE user_id='$incommingId'");
// print_r($sq);
if (mysqli_num_rows($sq)>0) {
   while ($row=mysqli_fetch_assoc($sq)) {
      $userPic=$row['User_Img'];
    //   print_r($userPic);
   }
}
    $sql="SELECT * FROM `messages` WHERE (`Outgoing_Msg_Id`={$outGoingId} AND `Incoming_Msg_Id`={$incommingId})
     OR  (`Outgoing_Msg_Id`={$incommingId} AND `Incoming_Msg_Id`={$outGoingId}) ORDER BY id";

    $query=mysqli_query($connect, $sql);
    if (mysqli_num_rows($query )>0) {
      while ($row = mysqli_fetch_assoc($query)) {
         $id= $row['id'];
         $q=mysqli_query($connect, "SELECT * FROM `info` WHERE id={$outGoingId} AND {$incommingId}");
         while ($result=mysqli_fetch_assoc($q)) {
             $resultUser=$result['user'];
             $resultid=$result['id'];
             $p=mysqli_query($connect, "SELECT * FROM `info_profile` WHERE user_id= $outGoingId");
            //  print_r($p);

             if (mysqli_num_rows($p)) {
                while ($res=mysqli_fetch_assoc($p)) {
                    $resu=$res['User_Img'];
                }
             }
         }
          if ($row['Outgoing_Msg_Id']==$outGoingId) {//this is the sender
    //    print_r($outGoingId);
            $output .='
          

            <li class="right"> 
            <div class="conversation-list">
                <div class="chat-avatar">
                    <img src="profileUploads/'.@$userPic.'" alt="">
                </div>
  
                <div class="user-chat-content">
                    <div class="ctext-wrap">
                        <div class="ctext-wrap-content">
                            <p class="mb-0">
                            '.$row['Message'].'
                            </p>
                            <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i> <span class="align-middle">'.$time.'</span></p>
                        </div>
                        <div class="dropdown align-self-start">
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Copy <i class="ri-file-copy-line float-end text-muted"></i></a>
                                <a class="dropdown-item" href="#">Save <i class="ri-save-line float-end text-muted"></i></a>
                                <a class="dropdown-item" href="#">Forward <i class="ri-chat-forward-line float-end text-muted"></i></a>
                                <a class="dropdown-item" href="#">Delete <i class="ri-delete-bin-line float-end text-muted"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="conversation-name">Me</div>
                </div>
            </div>
        </li>
           ';
          }else {//This is the receiver
    //    print_r($incommingId);
            
              $output .=' 
              <li class="">
              <div class="conversation-list">
                  <div class="chat-avatar">
                      <img src="profileUploads/'.@$resu.'" alt="">
                  </div>
    
                  <div class="user-chat-content">
                      <div class="ctext-wrap">
                          <div class="ctext-wrap-content">
                              <p class="mb-0">
                                '.$row['Message'].'
                              </p>
                              <p class="chat-time mb-0"><span class="align-middle">'. $time.'</span></p>
                          </div>
                              
                          <div class="dropdown align-self-start">
                              <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="ri-more-2-fill"></i>
                              </a>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#">Copy <i class="ri-file-copy-line float-end text-muted"></i></a>
                                  <a class="dropdown-item" href="#">Save <i class="ri-save-line float-end text-muted"></i></a>
                                  <a class="dropdown-item" href="#">Forward <i class="ri-chat-forward-line float-end text-muted"></i></a>
                                  <a class="dropdown-item" href="#">Delete <i class="ri-delete-bin-line float-end text-muted"></i></a>
                              </div>
                          </div>
                      </div>
                      
                      <div class="conversation-name">'.$resultUser.'</div>
                  </div>
              </div>
          </li> 
';
          }

        


      }
      echo $output;
    }
}else {
    header('location:teamchatpete/auth-login.php');
    
}


?>