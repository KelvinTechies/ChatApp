<?php
// require './configuration.php';
// session_start();
$outGoingId=$_SESSION['id'];

while ($row =mysqli_fetch_assoc($sql)) {
    $outGoingId=$_SESSION['id'];
$incomingId=@$_GET['Uid'];
    $sql2="SELECT * FROM `messages` WHERE (Incoming_Msg_Id ={$row['id']}
    OR Outgoing_Msg_Id={$row['id']} AND (Outgoing_Msg_Id={$outGoingId} OR (Outgoing_Msg_Id={$outGoingId}))
    ) ORDER BY id DESC LIMIT 1";

$sql3=mysqli_query($connect, "SELECT * FROM `info_profile` WHERE User_id='{$row['id']}' ");
// print_r($sql3);
if (mysqli_num_rows($sql3)) {
    while ($res=mysqli_fetch_assoc($sql3)) {
        $r=$res['User_Img'];
       
    }
  }else {
      $result="No message Available";
  }
   
    
    $query2=mysqli_query($connect, $sql2);
    $row2=mysqli_fetch_assoc($query2);

    if (mysqli_num_rows($query2)>0) {
      $result=$row2['Message'];
    }else {
        $result="No message Available";
    }
// Triming Message if more than 28 wrds
    (strlen($result) > 28) ? $msg=substr($result, 0, 28) : $msg=$result;

    ($outGoingId==$row2['Outgoing_Msg_Id'])?$You='You':$You='';

    ($row['Status']=='Offline') ? $Offline='Offline':$Offline="";
    $outPut .='
    
    <li>
    <a href="index.php?Uid='.$row['id'].'">
        <div class="d-flex">                            
            <div class="chat-user-img online align-self-center me-3 ms-0">
                <img src="profileUploads/'.@$r.'" class="rounded-circle avatar-xs" alt="">
                <span class="user-status '.$Offline.'"></span>
            </div>

            <div class="flex-grow-1 overflow-hidden">
            <a href="index.php?Uid='.$row['id'].'"><h5 class="font-size-14 m-0">'.$row['user'].'</h5>
                <p class="chat-user-message text-truncate mb-0">'.$You .':' .$msg.'</p>
            </div>
            <div class="font-size-11">05 min</div>
        </div>
    </a>
</li>';
}

?>

 

                                        <!-- <li>
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
        </li> -->